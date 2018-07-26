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

namespace PlanB\ValueObject\Text\Exception;

use PlanB\ValueObject\Text\Text;

/**
 * Se lanza cuando una ruta no cumple una determinada condición
 * (no existe, no es un fichero, no es un directorio, etc...)
 */
class InvalidTextException extends \DomainException
{

    /**
     * Es una cadena vacia
     *
     * @param null|\Throwable $previous
     *
     * @return \PlanB\ValueObject\Path\Exception\InvalidPathException
     */
    public static function isEmpty(?\Throwable $previous = null): self
    {
        $message = sprintf("Invalid string (a not empty string was expected)");

        return new static($message, 100, $previous);
    }

    /**
     * Es una cadena en blanco
     *
     * @param \PlanB\ValueObject\Text\Text $text
     * @param null|\Throwable              $previous
     *
     * @return \PlanB\ValueObject\Text\Exception\InvalidTextException
     */
    public static function isBlank(Text $text, ?\Throwable $previous = null): self
    {
        $message = sprintf("Invalid string '%s' (a not blank string was expected)", $text->stringify());

        return new static($message, 100, $previous);
    }
}
