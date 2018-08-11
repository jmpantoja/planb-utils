<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace PlanB\Utils\Cli;

/**
 * Representa a una palabra con un estilo determinado
 */
class Word extends Output
{
    /**
     * @var string
     */
    private $text;

    /**
     * Word constructor.
     *
     * @param string $text
     */
    protected function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * Crea una nueva instancia
     *
     * @param string $format
     * @param string ...$arguments
     *
     * @return \PlanB\Utils\Cli\Word
     */
    public static function create(string $format, string ...$arguments): self
    {
        if (0 < count($arguments)) {
            $text = sprintf($format, ...$arguments);

            return new static($text);
        }

        return new static($format);
    }

    /**
     * @inheritdoc
     */
    public function stringify(?string $format = null): string
    {
        return $this->text;
    }

    /**
     * Asigna un objeto Line como padre de este elemento
     *
     * @param \PlanB\Utils\Cli\Line $line
     *
     * @return \PlanB\Utils\Cli\Word
     */
    public function parent(Line $line): self
    {
        return $this->setParent($line);
    }
}
