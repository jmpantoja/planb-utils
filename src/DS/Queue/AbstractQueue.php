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

namespace PlanB\DS\Queue;

use PlanB\DS\Resolver\ResolverInterface;
use PlanB\DS\Traits\TraitArray;
use PlanB\DS\Traits\TraitCollection;
use PlanB\DS\Traits\TraitResolver;

/**
 * A “first in, first out” or “FIFO” collection that only allows access to the
 * value at the front of the queue and iterates in that order, destructively.
 */
abstract class AbstractQueue implements \IteratorAggregate, \ArrayAccess, QueueInterface
{
    use TraitCollection;
    use TraitResolver;
    use TraitArray;


    /**
     * @var \Ds\Queue
     */
    protected $items;

    /**
     * AbstractQueue constructor.
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
     * @inheritdoc
     */
    protected function makeInternal(): \DS\Collection
    {
        return new \DS\Queue();
    }

    /**
     * Returns and removes the value at the front of the Queue.
     *
     * @return mixed
     */
    public function pop()
    {
        return $this->items->pop();
    }

    /**
     * Returns the value at the front of the queue without removing it.
     *
     * @return mixed
     */
    public function peek()
    {
        return $this->items->peek();
    }

    /**
     * Pushes one value onto the top of the queue.
     *
     * @param mixed $value
     *
     * @return \PlanB\DS\Queue\QueueInterface
     */
    public function push($value): QueueInterface
    {

        $this->resolver->value(function ($value): void {
            $this->items->push($value);
        }, $value);

        return $this;
    }


    /**
     * Pushes zero or more values onto the top of the queue.
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Queue\QueueInterface
     */
    public function pushAll(iterable $input): QueueInterface
    {
        foreach ($input as $value) {
            $this->push($value);
        }

        return $this;
    }
}
