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

use PlanB\DS\Resolver\Input\Input;
use PlanB\DS\Resolver\Input\InputInterface;
use PlanB\DS\Resolver\Rule\Rule;
use PlanB\Type\DataType\DataType;

/**
 * Cola con prioridad que almacena un conjunto de reglas del mismo tipo que tiene que cumplir un input en cada fase
 */
class RuleQueue
{
    /**
     * @var \Ds\PriorityQueue
     */
    private $queue;

    /**
     * @var \Ds\PriorityQueue
     */
    private $copy;

    /**
     * @var null|\PlanB\Type\DataType\DataType
     */
    private $innerType;

    /**
     * Resolver constructor.
     */
    protected function __construct()
    {
        $this->queue = new \DS\PriorityQueue();
        $this->copy = new \DS\PriorityQueue();
        $this->innerType = null;
    }

    /**
     * Resolver named constructor.
     *
     * @return  \PlanB\DS\Resolver\RuleQueue
     */
    public static function make(): RuleQueue
    {
        return new static();
    }

    /**
    * Informa a la cola de cual es el tipo del resolver padre
     *
     * @param null|\PlanB\Type\DataType\DataType $type
     *
     * @return \PlanB\DS\Resolver\RuleQueue
     */
    public function setInnerType(?DataType $type): self
    {
        $this->innerType = $type;

        return $this;
    }

    /**
     * Añade una nueva regla a la cola
     *
     * @param \PlanB\DS\Resolver\Rule\Rule $rule
     * @param int                          $priority
     *
     * @return \PlanB\DS\Resolver\RuleQueue
     */
    public function push(Rule $rule, int $priority): self
    {
        $this->queue->push($rule, $priority);

        return $this;
    }

    /**
     * Resuelve un valor
     *
     * @param \PlanB\DS\Resolver\Input\InputInterface $input
     *
     * @return \PlanB\DS\Resolver\Input\InputInterface
     */
    public function resolve(InputInterface $input): InputInterface
    {
        $this->reset();

        while ($rule = $this->current($input)) {
            $input = $rule->resolve($input);
        }

        return $input;
    }

    /**
     * Devuelve el cursor al inicio
     */
    private function reset(): void
    {
        $this->copy = $this->queue->copy();
    }

    /**
     * Devuelve la siguiente regla (o false si procede)
     *
     * @param \PlanB\DS\Resolver\Input\InputInterface $input
     *
     * @return bool|mixed
     */
    private function current(InputInterface $input)
    {
        if (!($input instanceof Input)) {
            return false;
        }

        if ($this->copy->isEmpty()) {
            return false;
        }

        $rule = $this->copy->pop();

        $rule->setInnerType($this->innerType);

        return $rule;
    }
}
