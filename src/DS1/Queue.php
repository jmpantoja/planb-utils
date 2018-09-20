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

namespace PlanB\DS1;

use PlanB\DS1\Resolver\Resolver;

/**
 * A “first in, first out” or “FIFO” collection that only allows access to the
 * value at the front of the queue and iterates in that order, destructively.
 */
class Queue implements \IteratorAggregate, \ArrayAccess, Collection
{
    use Traits\TraitCollection;
    use Traits\TraitResolver;
    use Traits\TraitArray;



    /**
     * @param mixed[]                           $input
     *
     * @param null|\PlanB\DS1\Resolver\Resolver $resolver
     *
     * @return \PlanB\DS1\Queue
     */
    public static function make(iterable $input = [], ?Resolver $resolver = null): Queue
    {
        return (new static($resolver))
            ->pushAll($input);
    }
    /**
     * @inheritdoc
     */
    protected function makeInternal(): \DS\Collection
    {
        return new \DS\Queue();
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
     * Returns and removes the value at the front of the Queue.
     *
     * @return mixed
     */
    public function pop()
    {
        return $this->items->pop();
    }

    /**
     * Pushes one value onto the top of the queue.
     *
     * @param mixed $input
     *
     * @return \PlanB\DS1\Queue
     */
    public function push($input): Queue
    {
        $this->hook(function ($input): void {
            $this->items->push($input);
        }, $input);

        return $this;
    }


    /**
     * Pushes zero or more values onto the top of the queue.
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS1\Stack
     */
    public function pushAll(iterable $input): Queue
    {
        foreach ($input as $value) {
            $this->push($value);
        }

        return $this;
    }
}
