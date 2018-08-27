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

namespace PlanB\Utils\Traits;

/**
 * Para usar en los casos donde el método __toString es un alias de stringify
 */
trait Stringify
{
    /**
     * __toString alias
     *
     * @return string
     */
    abstract public function stringify(): string;

    /**
     * Devuelve la cadena de texto
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->stringify();
    }
}
