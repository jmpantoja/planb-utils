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

namespace PlanB\Utils\Collection\Exception;

/**
 * Se lanza cuando se trata de crear una colleción a partir de un array vacio
 *
 * Cuando creamos colecciones a partir de arrays, se espera que contenga al menos un elemento
 * del que poder deducir el tipo
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class EmptyArgumentException extends \InvalidArgumentException
{

    /**
     * Crea una nueva instancia
     *
     * @param null|\Throwable $previous
     *
     * @return \PlanB\Utils\Collection\Exception\EmptyArgumentException
     */
    public static function emptyInput(?\Throwable $previous = null): self
    {
        $message = "Can\'t collect an empty array";

        return new static($message, 100, $previous);
    }
}
