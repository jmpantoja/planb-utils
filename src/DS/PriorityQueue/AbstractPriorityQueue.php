<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace PlanB\DS\PriorityQueue;

use PlanB\DS\Collection;
use PlanB\DS\Resolver\ResolverInterface;
use PlanB\DS\Traits\TraitCollection;
use PlanB\DS\Traits\TraitResolver;

/**
 * A PriorityQueue is very similar to a Queue. Values are pushed into the queue
 * with an assigned priority, and the value with the highest priority will
 * always be at the front of the queue.
 */
abstract class AbstractPriorityQueue implements \IteratorAggregate, PriorityQueueInterface
{
    use TraitCollection;
    use TraitResolver;


    /**
     * @var \Ds\PriorityQueue
     */
    protected $items;

    /**
     * AbstractPriorityQueue constructor.
     *
     * @param mixed[]                                   $input
     * @param null|\PlanB\DS\Resolver\ResolverInterface $resolver
     */
    public function __construct(iterable $input, ?ResolverInterface $resolver = null)
    {
        $this->bind($resolver);
        $this->pushAll($input);
    }

    /**
     * Crea la estructura de datos interna
     *
     * @return \DS\PriorityQueue
     */
    protected function makeInternal(): \DS\PriorityQueue
    {
        return new \DS\PriorityQueue();
    }

    /**
     * Creates a shallow copy of the collection.
     *
     * @return \PlanB\DS\Collection a shallow copy of the collection.
     */
    public function copy(): Collection
    {
        return clone $this;
    }

    /**
     * Returns the value with the highest priority in the priority queue.
     *
     * @return mixed
     *
     * @throw UnderflowException
     */
    public function peek()
    {
        return $this->items->peek();
    }

    /**
     * Returns and removes the value with the highest priority in the queue.
     *
     * @return mixed
     */
    public function pop()
    {
        return $this->items->pop();
    }

    /**
     * Pushes a value into the queue, with a specified priority.
     *
     * @param mixed $value
     * @param int   $priority
     *
     * @return \PlanB\DS\PriorityQueue\PriorityQueueInterface
     */
    public function push($value, int $priority = 0): PriorityQueueInterface
    {
        $this->resolver->value(function ($value) use ($priority): void {
            $this->items->push($value, $priority);
        }, $value);

        return $this;
    }

    /**
     * Pushes zero or more values onto the top of the queue.
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\PriorityQueue\PriorityQueueInterface
     */
    public function pushAll(iterable $input): PriorityQueueInterface
    {
        foreach ($input as $value) {
            $this->push($value);
        }

        return $this;
    }
}
