<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PlanB\DS\ItemResolver\Exception;

/**
 * Se lanza cuando se trata agregar un item de un tipo incorrecto
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class InvalidValueTypeException extends \DomainException
{

    /**
     * Crea una nueva instancia
     *
     * @param mixed           $value
     * @param string          $expected
     * @param null|\Throwable $previous
     *
     * @return \PlanB\DS\ArrayList\Exception\InvalidValueTypeException
     */
    public static function forValue($value, string $expected, ?\Throwable $previous = null): self
    {

        $valueType = is_object($value) ? get_class($value) : gettype($value);

        $message = sprintf("Value type '%s' is invalid (expects %s)", $valueType, $expected);

        return new static($message, 100, $previous);
    }
}
