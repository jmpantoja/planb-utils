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
 * A “last in, first out” or “LIFO” collection that only allows access to the
 * value at the top of the structure and iterates in that order, destructively.
 */
class Stack implements \IteratorAggregate, \ArrayAccess, Collection
{
    use Traits\TraitCollection;
    use Traits\TraitResolver;
    use Traits\TraitArray;

    /**
     * @inheritdoc
     */
    protected function makeInternal(iterable $input): \DS\Collection
    {
        return new \DS\Stack($input);
    }

    /**
     * Returns the value at the top of the stack without removing it.
     *
     * @return mixed
     *
     * @throws \UnderflowException if the stack is empty.
     */
    public function peek()
    {
        return $this->items->peek();
    }

    /**
     * Returns and removes the value at the top of the stack.
     *
     * @return mixed
     *
     * @throws \UnderflowException if the stack is empty.
     */
    public function pop()
    {
        return $this->items->pop();
    }

    /**
     * Pushes zero or more values onto the top of the stack.
     *
     * @param mixed ...$values
     *
     * @return \PlanB\DS1\Stack
     */
    public function push(...$values): Stack
    {
        $this->items->push(...$values);

        return $this;
    }
}
