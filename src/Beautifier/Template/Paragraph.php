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
 * Representa a un párrafo como conjunto de lineas
 */
class Paragraph extends AbstractVector
{
    /**
     * @var \Ds\Map
     */
    private $replacements;

    /**
     * Paragraph constructor.
     *
     * @param string   $template
     * @param string[] $replacements
     *
     * @return \PlanB\Beautifier\Template\Paragraph
     */
    public static function make(string $template, array $replacements): self
    {
        return new static($template, new Map($replacements));
    }

    /**
     * Paragraph constructor.
     *
     * @param string  $template
     * @param \Ds\Map $replacements
     */
    protected function __construct(string $template, Map $replacements)
    {
        $this->replacements = $replacements;
        $lines = explode("\n", $template);

        parent::__construct($lines);
    }

    /**
     * @inheritdoc
     */
    public function configure(ResolverInterface $resolver): void
    {
        $resolver->type(Line::class)
            ->converter(function (string $line) {
                return Line::make($line, $this->replacements);
            }, Type::STRING);
    }

    /**
     * Devuelve este párrafo en forma de string, usando un callback para resolver cada token
     *
     * @param callable $callback
     *
     * @return string
     */
    public function parse(callable $callback): string
    {
        $lines = [];
        $width = $this->getWidth();

        foreach ($this as $line) {
            $lines[] = $line->parse($callback, $width);
        }

        return implode("\n", $lines);
    }


    /**
     * Devuelve el ancho del párrafo
     *
     * @return int
     */
    public function getWidth(): int
    {
        $lines = [];
        foreach ($this as $line) {
            $lines[] = $line->getWidth();
        }

        return max($lines);
    }
}
