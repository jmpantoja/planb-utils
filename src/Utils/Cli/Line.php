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
 * Representa a una linea con un estilo determinado
 */
class Line extends OutputAggregate
{

    /**
     * Crea una nueva instancia
     *
     * @param null|string $format
     * @param string      ...$arguments
     *
     * @return \PlanB\Utils\Cli\Line
     */
    public static function create(?string $format = null, string ...$arguments): self
    {
        $line = new static();

        if (!is_null($format)) {
            $line->word($format, ...$arguments);
        }

        return $line;
    }

    /**
     * Asigna un objeto Message como padre de este elemento
     *
     * @param \PlanB\Utils\Cli\Message $message
     *
     * @return \PlanB\Utils\Cli\Output
     */
    public function parent(Message $message): Output
    {
        return $this->setParent($message);
    }

    /**
     * Agrega un objeto Word a la lista
     *
     * @param string $format
     * @param string ...$arguments
     *
     * @return \PlanB\Utils\Cli\Word
     */
    public function word(string $format, string ...$arguments): Word
    {
        $word = Word::create($format, ...$arguments);

        return $this->add($word);
    }

    /**
     * Devuelve el caracter separador
     *
     * @return string
     */
    protected function getSeparator(): string
    {
        return ' ';
    }
}
