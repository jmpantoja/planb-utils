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
 * A “last in, first out” or “LIFO” collection that only allows access to the
 * value at the top of the structure and iterates in that order, destructively.
 */
class Stack implements \IteratorAggregate, \ArrayAccess, Collection
{
    use Traits\TraitCollection;
    use Traits\TraitResolver;
    use Traits\TraitArray;

    /**
     * @param mixed[]                           $input
     *
     * @param null|\PlanB\DS1\Resolver\Resolver $resolver
     *
     * @return \PlanB\DS1\Stack
     */
    public static function make(iterable $input = [], ?Resolver $resolver = null): Stack
    {
        return (new static($resolver))
            ->pushAll($input);
    }

    /**
     * @inheritdoc
     */
    protected function makeInternal(): \DS\Collection
    {
        return new \DS\Stack();
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
     * Pushes one value onto the top of the stack.
     *
     * @param mixed $input
     *
     * @return \PlanB\DS1\Stack
     */
    public function push($input): Stack
    {
        $this->hook(function ($input): void {
            $this->items->push($input);
        }, $input);

        return $this;
    }


    /**
     * Pushes zero or more values onto the top of the stack.
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS1\Stack
     */
    public function pushAll(iterable $input): Stack
    {
        foreach ($input as $value) {
            $this->push($value);
        }

        return $this;
    }
}
