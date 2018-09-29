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

use Opis\Closure\SerializableClosure;
use PlanB\DS\Resolver\Input;

/**
 * Clase base para reglas
 */
abstract class AbstractRule implements RuleInterface
{
    /**
     * @var \Opis\Closure\SerializableClosure
     */
    private $callback;

    /**
     * @var string[]
     */
    private $types;

    /**
     * Rule named constructor.
     *
     * @param callable $callback
     * @param string   ...$types
     *
     * @return \PlanB\DS\Resolver\Rule\RuleInterface
     */
    public static function make(callable $callback, string ...$types): RuleInterface
    {
        return new static($callback, ...$types);
    }

    /**
     * Rule constructor.
     *
     * @param callable $callback
     * @param string   ...$types
     */
    protected function __construct(callable $callback, string ...$types)
    {
        $this->callback = new SerializableClosure($callback);
        $this->types = $types;
    }

    /**
     * Manipula un input
     *
     * @param \PlanB\DS\Resolver\Input $input
     *
     * @return \PlanB\DS\Resolver\Input
     *
     * @throws \Throwable
     */
    public function execute(Input $input): Input
    {

        if (!$input->isEvaluableForTypes(...$this->types)) {
            return $input;
        }

        return $this->resolve($input);
    }

    /**
     * Ejecuta el callback
     *
     * @param mixed ...$arguments
     *
     * @return mixed
     */
    protected function call(...$arguments)
    {
        return call_user_func($this->callback, ...$arguments);
    }

    /**
     * Resuelve un input
     *
     * @param \PlanB\DS\Resolver\Input $input
     *
     * @return \PlanB\DS\Resolver\Input
     *
     * @throws \Throwable
     */
    abstract protected function resolve(Input $input): Input;
}
