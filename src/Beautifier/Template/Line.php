<?php

/**
 * This file is part of the planb project.
 *
 * (c) jmpantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace PlanB\Beautifier\Template;

use Ds\Map;
use PlanB\DS\Resolver\ResolverInterface;
use PlanB\DS\Vector\AbstractVector;
use PlanB\Type\DataType\Type;

/**
 * Representa una linea como conjunto de tokens
 */
class Line extends AbstractVector
{
    private const WORD_DELIMITER = "/(\s+)/";

    private const TOKEN_DELIMITER = "/(<.*>)/U";


    /**
     * @var \Ds\Map
     */
    private $replacements;

    /**
     * Line constructor.
     *
     * @param string  $template
     *
     * @param \Ds\Map $replacements
     *
     * @return \PlanB\Beautifier\Template\Line
     */
    public static function make(string $template, Map $replacements): self
    {
        return new static($template, $replacements);
    }

    /**
     * Line constructor.
     *
     * @param string  $template
     * @param \Ds\Map $replacements
     */
    protected function __construct(string $template, Map $replacements)
    {
        $this->replacements = $replacements;

        $words = $this->getWords(trim($template));

        $tokens = [];

        foreach ($words as $word) {
            $temp = $this->getTokens($word);
            $tokens = array_merge($tokens, $temp);
        }
        parent::__construct($tokens);
    }


    /**
     * Devuelve una lista con las palabras que componen la linea
     *
     * @param string $template
     *
     * @return string[]
     */
    private function getWords(string $template): array
    {
        $flags = PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY;

        return preg_split(self::WORD_DELIMITER, $template, -1, $flags);
    }

    /**
     * Devuelve los tokens que componen una palabra
     *
     * @param string $word
     *
     * @return string[]
     */
    private function getTokens(string $word): array
    {
        $flags = PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY;

        return (array) preg_split(self::TOKEN_DELIMITER, $word, -1, $flags);
    }


    /**
     * @inheritdoc
     */
    public function configure(ResolverInterface $resolver): void
    {
        $resolver->type(Token::class)
            ->converter(function (string $token) {
                return Token::make($token, $this->replacements);
            }, Type::STRING);
    }

    /**
     * Devuelve esta linea en forma de string, usando un callback para resolver cada token
     *
     * @param callable $callback
     * @param int      $width
     *
     * @return string
     */
    public function parse(callable $callback, int $width): string
    {
        $tokens = [];
        foreach ($this as $token) {
            $token->setLineWidth($width);
            $tokens[] = call_user_func($callback, $token);
        }

        return implode('', $tokens);
    }


    /**
     * Devuelve el ancho del linea
     *
     * @return int
     */
    public function getWidth(): int
    {
        $total = 0;
        foreach ($this as $token) {
            $total += $token->width();
        }

        return $total;
    }
}
