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

namespace PlanB\DS\Resolver;

use PlanB\DS\Exception\InvalidArgumentException;
use PlanB\Type\Data\Data;

/**
 * Representa a un valor que se está evaluando antes de ser añadido
 */
class Input
{

    /**
     * @var mixed
     */
    private $value;

    /**
     * @var bool
     */
    private $locked;

    /**
     * @var null|\Throwable
     */
    private $exception;

    /**
     * @var bool
     */
    private $valid;

    /**
     * Input named constructor.
     *
     * @param mixed $value
     *
     * @return \PlanB\DS\Resolver\Input
     */
    public static function make($value): self
    {
        return new static($value);
    }

    /**
     * Input constructor.
     *
     * @param mixed $value
     */
    protected function __construct($value)
    {
        $this->valid = true;
        $this->value = $value;
        $this->locked = false;
        $this->exception = null;
    }

    /**
     * Devuelve el valor en su estado actual
     *
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * Indica si el input está bloqueado
     *
     * @return bool
     */
    private function isLocked(): bool
    {
        return $this->locked;
    }

    /**
     * Indica si el input sigue siendo válido
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->valid;
    }

    /**
     * Indica si este input se debe evaluar para alguno de los tipos dados
     *
     * @param string ...$types
     *
     * @return bool
     */
    public function isEvaluableForTypes(string ...$types): bool
    {
        if (!$this->isValid()) {
            return false;
        }

        if (is_empty($types)) {
            return true;
        }

        return Data::make($this->value)->isTypeOf(...$types);
    }

    /**
     * Aplica un nuevo valor al input, para que sea recogido por la siguiente regla
     *
     * @param mixed $value
     *
     * @return \PlanB\DS\Resolver\Input
     */
    public function next($value): self
    {
        $this->ensureIsNotLocked();

        $this->value = $value;
        $this->locked = true;

        return $this;
    }


    /**
     * Lanza una excepción si se trata de cambiar el estado de un inpt bloqueado
     */
    private function ensureIsNotLocked(): void
    {
        if (!$this->isValid() || $this->isLocked()) {
            throw new \LogicException("Cann't change the status of an locked input");
        }
    }

    /**
     * Ignora este input
     *
     * @return \PlanB\DS\Resolver\Input
     */
    public function ignore(): self
    {
        $this->ensureIsNotLocked();
        $this->invalidate();

        return $this;
    }

    /**
     * Marca el input como invalido
     */
    private function invalidate(): void
    {
        $this->valid = false;
        $this->locked = true;
    }


    /**
     * Rechaza este input
     *
     * @param string $format
     * @param mixed  ...$arguments
     *
     * @return $this
     */
    public function reject(string $format = '', ...$arguments): self
    {
        $this->ensureIsNotLocked();

        $exception = $this->makeException($format, ...$arguments);
        $this->throws($exception);

        return $this;
    }

    /**
     * Devuelve un objeto excepcion generico
     *
     * @param string $format
     * @param mixed  ...$arguments
     *
     * @return \PlanB\DS\Exception\InvalidArgumentException
     */
    private function makeException(string $format, ...$arguments): InvalidArgumentException
    {
        $reason = sprintf($format, ...$arguments);
        $exception = InvalidArgumentException::make($this->value, $reason);

        return $exception;
    }

    /**
     * Rechaza este input
     *
     * @param \Throwable $exception
     *
     * @return \PlanB\DS\Resolver\Input
     */
    public function throws(\Throwable $exception): self
    {
        $this->exception = $exception;
        $this->invalidate();

        return $this;
    }

    /**
     * Resuelve este input, aplicando la respuesta de un callback
     *
     * @param mixed $response
     *
     * @return \PlanB\DS\Resolver\Input
     *
     * @throws \Throwable
     */
    public function resolve($response = null): self
    {
        if ($this->exception instanceof \Throwable) {
            throw $this->exception;
        }

        if ($this->mustBeResolved($response)) {
            $this->value = $response;
        }

        $this->locked = false;

        return $this;
    }

    /**
     * Indica si se dan las condiciones para que cambie el valor del input
     *
     * @param mixed $response
     *
     * @return bool
     */
    private function mustBeResolved($response): bool
    {
        return $this->isValid() && !$this->isLocked() && !is_null($response);
    }
}
