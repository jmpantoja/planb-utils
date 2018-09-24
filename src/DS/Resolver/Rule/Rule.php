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

namespace PlanB\DS\Resolver\Rule;

use PlanB\DS\Exception\InvalidArgumentException;
use PlanB\DS\Resolver\Input\FailedInput;
use PlanB\DS\Resolver\Input\InputInterface;
use PlanB\Type\DataType\DataType;

/**
 * Regla que tiene que cumplir un valor antes de ser añadido
 * a una colección
 */
abstract class Rule
{

    /**
     * @var callable
     */
    private $callback;

    /**
     * @var null|string
     */
    private $type;


    /**
     * @var null|\PlanB\Type\DataType\DataType
     */
    private $innerType;

    /**
     * Resolver named constructor.
     *
     * @param string   $type
     * @param callable $callback
     *
     * @return \PlanB\DS\Resolver\Rule\Rule
     */
    public static function typed(string $type, callable $callback): Rule
    {
        return new static($callback, $type);
    }

    /**
     * Resolver named constructor.
     *
     * @param callable $callback
     *
     * @return \PlanB\DS\Resolver\Rule\Rule
     */
    public static function make(callable $callback): Rule
    {
        return new static($callback);
    }


    /**
     * Resolver constructor.
     *
     * @param callable    $callback
     * @param null|string $type
     */
    protected function __construct(callable $callback, ?string $type = null)
    {
        $this->callback = $callback;
        $this->type = $type;
    }


    /**
     * Informa a la regla de cual es el tipo del resolver padre
     *
     * @param null|\PlanB\Type\DataType\DataType $type
     *
     * @return \PlanB\DS\Resolver\Rule\Rule
     */
    public function setInnerType(?DataType $type): self
    {
        $this->innerType = $type;

        return $this;
    }

    /**
     * Indica si un valor es del tipo interno de esta regla
     * El tipo interno es el tipo del resolver al que pertenece esta regla
     *
     * @param mixed $value
     *
     * @return bool
     */
    protected function isOfInnerType($value): bool
    {
        if (is_null($this->innerType)) {
            return true;
        }

        return $this->innerType->isTheTypeOf($value);
    }


    /**
     * Ejecuta la regla
     *
     * @param \PlanB\DS\Resolver\Input\Input $input
     *
     * @return \PlanB\DS\Resolver\Input\InputInterface
     */
    public function __invoke(InputInterface $input): InputInterface
    {
        if (!$input->isTypeOf($this->type)) {
            return $input;
        }

        $value = $input->getValue();
        $response = call_user_func($this->callback, $value);

        return $this->buildInput($response, $value);
    }

    /**
     * Ejecuta la regla
     *
     * @param \PlanB\DS\Resolver\Input\Input $input
     *
     * @return \PlanB\DS\Resolver\Input\InputInterface
     */
    public function resolve(InputInterface $input): InputInterface
    {
        try {
            return $this->__invoke($input);
        } catch (\Throwable $throwable) {
            $input = FailedInput::make($input->getValue());
            throw InvalidArgumentException::make($input, $throwable);
        }
    }


    /**
     * Convierte la respuesta obtenida en un objeto InputInterface
     *
     * @param mixed $response
     * @param mixed $value
     *
     * @return \PlanB\DS\Resolver\Input\InputInterface
     */
    abstract public function buildInput($response, $value): InputInterface;
}
