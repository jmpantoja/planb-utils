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

namespace PlanB\Beautifier\Format;

/**
 * Interfaz para Formats
 */
interface FormatInterface
{
    /**
     * Devuelve el template
     *
     * @return string
     */
    public function getTemplate(): string;

    /**
     * Devuelve los replacements
     *
     * @return mixed[]
     */
    public function getReplacements(): array;

    /**
     * Devuelve el valor que se está formateando
     *
     * @return string
     */
    public function getValue(): string;
}
