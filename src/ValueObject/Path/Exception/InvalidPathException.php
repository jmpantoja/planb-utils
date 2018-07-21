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

namespace PlanB\ValueObject\Path\Exception;

use PlanB\ValueObject\Path\Path;

/**
 * Se lanza cuando una ruta no cumple una determinada condición
 * (no existe, no es un fichero, no es un directorio, etc...)
 */
class InvalidPathException extends \DomainException
{

    /**
     * No es un directorio
     *
     * @param \PlanB\ValueObject\Path\Path $path
     * @param null|\Throwable              $previous
     *
     * @return \PlanB\ValueObject\Path\Exception\InvalidPathException
     */
    public static function isNotADirectory(Path $path, ?\Throwable $previous = null): self
    {

        $message = sprintf("path '%s' isn't a directory", (string) $path);

        return new static($message, 100, $previous);
    }

    /**
     * No es un archivo
     *
     * @param \PlanB\ValueObject\Path\Path $path
     * @param null|\Throwable              $previous
     *
     * @return \PlanB\ValueObject\Path\Exception\InvalidPathException
     */
    public static function isNotAFile(Path $path, ?\Throwable $previous = null): self
    {

        $message = sprintf("path '%s' isn't a file", (string) $path);

        return new static($message, 100, $previous);
    }

    /**
     * No es un enlace simbólico
     *
     * @param \PlanB\ValueObject\Path\Path $path
     * @param null|\Throwable              $previous
     *
     * @return \PlanB\ValueObject\Path\Exception\InvalidPathException
     */
    public static function isNotALink(Path $path, ?\Throwable $previous = null): self
    {

        $message = sprintf("path '%s' isn't a link", (string) $path);

        return new static($message, 100, $previous);
    }

    /**
     * No tiene niguna extensión
     *
     * @param \PlanB\ValueObject\Path\Path $path
     * @param null|\Throwable              $previous
     *
     * @return \PlanB\ValueObject\Path\Exception\InvalidPathException
     */
    public static function hasNotExtension(Path $path, ?\Throwable $previous = null): self
    {
        $message = sprintf("path '%s' has not extension", (string) $path);

        return new static($message, 100, $previous);
    }


    /**
     * No tiene la extensión que se esperaba
     *
     * @param \PlanB\ValueObject\Path\Path $path
     * @param string[]                     $availables
     * @param null|\Throwable              $previous
     *
     * @return \PlanB\ValueObject\Path\Exception\InvalidPathException
     */
    public static function hasNotExpectedExtension(Path $path, array $availables, ?\Throwable $previous = null): self
    {

        $expected = implode('|', $availables);
        $message = sprintf("path '%s' has not valid extension (expected: '%s')", (string) $path, $expected);

        return new static($message, 100, $previous);
    }
}
