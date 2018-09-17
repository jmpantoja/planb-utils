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
     * @inheritdoc
     */
    protected function makeInternal(iterable $input): \DS\Collection
    {
        return new \DS\Queue($input);
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
     * Pushes zero or more values into the front of the queue.
     *
     * @param mixed ...$values
     *
     * @return \PlanB\DS1\Queue
     */
    public function push(...$values): Queue
    {
        $this->items->push(...$values);

        return $this;
    }
}
