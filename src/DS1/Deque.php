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
 * A Deque (pronounced "deck") is a sequence of values in a contiguous buffer
 * that grows and shrinks automatically. The name is a common abbreviation of
 * "double-ended queue".
 *
 * While a Deque is very similar to a Vector, it offers constant time operations
 * at both ends of the buffer, ie. shift, unshift, push and pop are all O(1).
 */
class Deque implements \IteratorAggregate, \ArrayAccess, Sequence
{
    use Traits\TraitCollection;
    use Traits\TraitResolver;
    use Traits\TraitSequence;
    use Traits\TraitArray;


    /**
     * @param mixed[]                           $input
     *
     * @param null|\PlanB\DS1\Resolver\Resolver $resolver
     *
     * @return \PlanB\DS1\Deque
     */
    public static function make(iterable $input = [], ?Resolver $resolver = null): Deque
    {
        return (new static($resolver))
            ->pushAll($input);
    }

    /**
     * @inheritdoc
     */
    protected function makeInternal(): \DS\Collection
    {
        return new \DS\Deque();
    }
}
