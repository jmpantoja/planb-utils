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

namespace PlanB\DS1\Resolver;

use Ds;
use phpDocumentor\Reflection\Types\Boolean;
use PlanB\DS1\Resolver\Input\IgnoredInput;
use PlanB\DS1\Resolver\Input\Input;
use PlanB\DS1\Resolver\Input\InputInterface;
use PlanB\DS1\Resolver\Rule\Rule;
use PlanB\Type\Value\Value;

class RuleQueue implements Resolvable
{
    /**
     * @var Ds\PriorityQueue
     */
    private $queue;

    /**
     * @var Ds\PriorityQueue
     */
    private $copy;

    /**
     * Resolver constructor.
     */
    protected function __construct()
    {
        $this->queue = new DS\PriorityQueue();
        $this->copy = new DS\PriorityQueue();
    }

    /**
     * Resolver named constructor.
     *
     * @return Resolver
     */
    public static function make()
    {
        return new static();
    }

    /**
     * Añade una nueva regla a la cola
     *
     * @param Rule $rule
     * @param int $priority
     * @return RuleQueue
     */
    public function push(Rule $rule, int $priority): self
    {
        $this->queue->push($rule, $priority);
        return $this;
    }

    /**
     * Resuelve un valor
     *
     * @param InputInterface $input
     * @return InputInterface
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
    private function reset()
    {
        $this->copy = $this->queue->copy();
    }

    /**
     * Devuelve la siguiente regla (o false si procede)
     *
     * @param InputInterface $input
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

        return $this->copy->pop();
    }
}
