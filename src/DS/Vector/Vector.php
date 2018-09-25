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

namespace PlanB\DS\Vector;

use PlanB\DS\Resolver\Resolver;

/**
 * A Vector is a sequence of values in a contiguous buffer that grows and
 * shrinks automatically. It’s the most efficient sequential structure because
 * a value’s index is a direct mapping to its index in the buffer, and the
 * growth factor isn't bound to a specific multiple or exponent.
 */
final class Vector extends AbstractVector
{
    /**
     * Vector named constructor.
     *
     * @param mixed[]                          $input
     * @param null|\PlanB\DS\Resolver\Resolver $resolver
     *
     * @return \PlanB\DS\Vector\Vector
     */
    public static function make(iterable $input = [], ?Resolver $resolver = null): Vector
    {
        return (new static($resolver))
            ->pushAll($input);
    }

    /**
     * Vector named constructor.
     *
     * @param string  $type
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Vector\Vector
     */
    public static function typed(string $type, iterable $input = []): Vector
    {
        return VectorBuilder::typed($type)
            ->values($input)
            ->build();
    }
}
