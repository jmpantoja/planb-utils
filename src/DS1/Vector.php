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

namespace PlanB\DS1;

use PlanB\DS1\Resolver\Resolver;

/**
 * A Vector is a sequence of values in a contiguous buffer that grows and
 * shrinks automatically. It’s the most efficient sequential structure because
 * a value’s index is a direct mapping to its index in the buffer, and the
 * growth factor isn't bound to a specific multiple or exponent.
 */
class Vector implements \IteratorAggregate, \ArrayAccess, Sequence
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
     * @return \PlanB\DS1\Vector
     */
    public static function make(iterable $input = [], ?Resolver $resolver = null): Vector
    {
        return (new static($resolver))
            ->pushAll($input);
    }

    /**
     * @inheritdoc
     */
    protected function makeInternal(): \DS\Collection
    {
        return new \DS\Vector();
    }
}
