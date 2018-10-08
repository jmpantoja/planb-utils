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

namespace PlanB\DS\Stack;

use PlanB\DS\Resolver\ResolverInterface;
use PlanB\DS\Traits\TraitArray;
use PlanB\DS\Traits\TraitCollection;
use PlanB\DS\Traits\TraitResolver;

/**
 * A “last in, first out” or “LIFO” collection that only allows access to the
 * value at the top of the structure and iterates in that order, destructively.
 */
abstract class AbstractStack implements \IteratorAggregate, \ArrayAccess, StackInterface
{
    use TraitCollection;
    use TraitResolver;
    use TraitArray;


    /**
     * @var \Ds\Stack
     */
    protected $items;

    /**
     * AbstractStack constructor.
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
     * @param mixed $value
     *
     * @return \PlanB\DS\Stack\StackInterface
     */
    public function push($value): StackInterface
    {
        $this->resolver->value(function ($value): void {
            $this->items->push($value);
        }, $value);

        return $this;
    }


    /**
     * Pushes zero or more values onto the top of the stack.
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Stack\StackInterface
     */
    public function pushAll(iterable $input): StackInterface
    {
        foreach ($input as $value) {
            $this->push($value);
        }

        return $this;
    }
}
