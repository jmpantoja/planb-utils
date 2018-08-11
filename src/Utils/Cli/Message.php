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
 * Un mensaje de texto, formateado para mostrarlo por consola
 */
class Message extends OutputAggregate
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
        $message = new static();

        if (!is_null($format)) {
            $message->line($format, ...$arguments);
        }

        return $message;
    }

    /**
     * Añade una nueva linea
     *
     * @param null|string $format
     * @param string      ...$arguments
     *
     * @return \PlanB\Utils\Cli\Line
     */
    public function line(?string $format = null, string ...$arguments): Line
    {
        $line = Line::create($format, ...$arguments);

        return $this->add($line);
    }

    /**
     * Devuelve el caracter separador
     *
     * @return string
     */
    protected function getSeparator(): string
    {
        return "\n";
    }
}
