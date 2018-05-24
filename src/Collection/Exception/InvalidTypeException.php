<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace PlanB\Utils\Collection\Exception;

/**
 * Se lanza cuando se trata de crear un ItemResolver con algo que no es un tipo válido
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class InvalidTypeException extends \DomainException
{

    /**
     * Crea una nueva instancia
     *
     * @param string          $type
     * @param null|\Throwable $previous
     *
     * @return \PlanB\Utils\Collection\Exception\InvalidTypeException
     */
    public static function forType(string $type, ?\Throwable $previous = null): self
    {

        $message = sprintf("'%s' is invalid, expects a className, interfaceName or a native type name", $type);

        return new static($message, 100, $previous);
    }
}
