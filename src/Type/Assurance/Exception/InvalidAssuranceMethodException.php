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

namespace PlanB\Type\Assurance\Exception;

/**
 * Se lanza cuando un objeto no cumple alguna de las condiciones especificadas
 */
class InvalidAssuranceMethodException extends \DomainException
{
    /**
     * InvalidAssuranceMethodException constructor.
     *
     * @param string                                         $message
     * @param null|\PlanB\Type\Assurance\Exception\Throwable $previous
     */
    protected function __construct(string $message, ?Throwable $previous = null)
    {
        parent::__construct($message, 100, $previous);
    }


    /**
     * Crea una nueva instancia
     *
     * @param object          $wrapped
     * @param string          $method
     * @param null|\Throwable $previous
     *
     * @return \PlanB\Type\Assurance\Exception\InvalidAssuranceMethodException
     */
    public static function make(object $wrapped, string $method, ?\Throwable $previous = null): self
    {
        $message = sprintf('Assurance object for class %s dont support method %s', get_class($wrapped), $method);

        return new static($message, $previous);
    }
}
