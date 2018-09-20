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

namespace PlanB\DS1\Resolver\Rule;

use PlanB\DS1\Exception\InvalidArgumentException;
use PlanB\DS1\Resolver\Input\FailedInput;
use PlanB\DS1\Resolver\Input\InputInterface;

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
     * Resolver named constructor.
     *
     * @param string   $type
     * @param callable $callback
     *
     * @return \PlanB\DS1\Resolver\Rule\Rule
     */
    public static function typed(string $type, callable $callback): Rule
    {
        return new static($callback, $type);
    }

    /**
     * Ejecuta la regla
     *
     * @param \PlanB\DS1\Resolver\Input\Input $input
     *
     * @return \PlanB\DS1\Resolver\Input\InputInterface
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
     * @param \PlanB\DS1\Resolver\Input\Input $input
     *
     * @return \PlanB\DS1\Resolver\Input\InputInterface
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
     * @return \PlanB\DS1\Resolver\Input\InputInterface
     */
    abstract public function buildInput($response, $value): InputInterface;
}
