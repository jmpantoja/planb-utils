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

namespace PlanB\Console\Beautifier;

use PlanB\Console\Beautifier\Formatter\FormatterFactory;
use PlanB\Console\Beautifier\Formatter\ValueFormatter;

/**
 * Utilidad para formatear distintas salidas por consola
 */
class Beautifier
{

    /**
     * Named constructor
     *
     * @return \PlanB\Console\Beautifier\Beautifier
     */
    public static function make(): Beautifier
    {

        return new static();
    }

    /**
     * Beautifier constructor.
     */
    protected function __construct()
    {
    }

    /**
     * Devuelve una representación de la variable original, en formato largo
     *
     * @param mixed $value
     *
     * @return string
     */
    public function full($value): string
    {

        $formatter = FormatterFactory::factory($value);

        return $formatter->full();
    }

    /**
     * Devuelve una representación de la variable original, en formato simple
     *
     * @param mixed $value
     *
     * @return string
     */
    public function simple($value): string
    {
        $formatter = FormatterFactory::factory($value);

        return $formatter->simple();
    }

    /**
     * Devuelve una representación de la variable original, con el formato indicado
     *
     * @param mixed                            $value
     * @param \PlanB\Console\Beautifier\Format $format
     *
     * @return string
     */
    public function render($value, Format $format): string
    {

        if ($format->is(Format::SIMPLE)) {
            return Beautifier::make()
                ->simple($value);
        }

        return Beautifier::make()
            ->full($value);
    }

    /**
     * Devuelve el nombre de un tipo, formateado
     *
     * @param string $typeName
     *
     * @return string
     */
    public function type(string $typeName): string
    {
        return sprintf(ValueFormatter::CLASSNAME, $typeName);
    }
}
