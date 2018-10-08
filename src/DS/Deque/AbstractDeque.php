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

namespace PlanB\DS\Deque;

use PlanB\DS\Resolver\Resolver;
use PlanB\DS\Traits\TraitArray;
use PlanB\DS\Traits\TraitCollection;
use PlanB\DS\Traits\TraitResolver;
use PlanB\DS\Traits\TraitSequence;

/**
 * A Deque (pronounced "deck") is a sequence of values in a contiguous buffer
 * that grows and shrinks automatically. The name is a common abbreviation of
 * "double-ended queue".
 *
 * While a Deque is very similar to a Vector, it offers constant time operations
 * at both ends of the buffer, ie. shift, unshift, push and pop are all O(1).
 */
abstract class AbstractDeque implements \IteratorAggregate, \ArrayAccess, DequeInterface
{
    use TraitCollection;
    use TraitResolver ;
    use TraitSequence;
    use TraitArray;


    /**
     * @var \Ds\Deque
     */
    protected $items;

    /**
     * AbstractDeque constructor.
     *
     * @param mixed[]                          $input
     * @param null|\PlanB\DS\Resolver\Resolver $resolver
     */
    public function __construct(iterable $input, ?Resolver $resolver = null)
    {
        $this->bind($resolver);
        $this->pushAll($input);
    }

    /**
     * @inheritdoc
     */
    protected function makeInternal(): \DS\Deque
    {
        return new \DS\Deque();
    }

    /**
     * Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Deque\DequeInterface
     */
    protected function duplicate(iterable $input = []): DequeInterface
    {
        return new static($input, $this->resolver);
    }
}
