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

namespace PlanB\Utils\Assurance\Exception;

use Throwable;

/**
 * Se lanza cuando un objeto no cumple alguna de las condiciones especificadas
 */
class AssertException extends \AssertionError
{
    /**
     * FailAssuranceException constructor.
     *
     * @param string          $message
     * @param \Throwable|null $previous
     */
    public function __construct(string $message, ?Throwable $previous = null)
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
     * @return \PlanB\Utils\Assurance\Exception\AssertException
     */
    public static function create(object $wrapped, string $method, ?\Throwable $previous = null): self
    {

        $wrapped = force_to_string($wrapped);
        $method = to_snake_case($method, ' ');

        $message = sprintf('%s fails when check if %s', $wrapped, $method);

        return new self($message, $previous);
    }
}
