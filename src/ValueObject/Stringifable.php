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

namespace PlanB\ValueObject;

/**
 * Representa a los objetos que se pueden convertir en una cadena de texto
 */
interface Stringifable
{
    /**
     * __toString alias
     *
     * @return string
     */
    public function stringify(): string;

    /**
     * Devuelve la cadena de texto
     *
     * @return string
     */
    public function __toString(): string;
}
