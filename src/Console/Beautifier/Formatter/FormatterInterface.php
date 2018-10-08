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

namespace PlanB\Console\Beautifier\Formatter;

/**
 * Interfaz para Formatters
 */
interface FormatterInterface
{
    /**
     * Devuelve una representación de la variable original en formato completo
     *
     * @return string
     */
    public function full(): string;

    /**
     * Devuelve una representación de la variable original en formato simple
     *
     * @return string
     */
    public function simple(): string;
}
