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

namespace PlanB\DS\Set;

use PlanB\DS\Collection;
use PlanB\DS\Resolver\Resolver;

/**
 * A sequence of unique values.
 */
final class Set extends AbstractSet
{
    /**
     * @param mixed[]                          $input
     *
     * @param null|\PlanB\DS\Resolver\Resolver $resolver
     *
     * @return \PlanB\DS\Set\Set
     */
    public static function make(iterable $input = [], ?Resolver $resolver = null): Collection
    {
        return (new static($resolver))
            ->addAll($input);
    }


    /**
     * Set named constructor.
     *
     * @param string  $type
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Set\Set
     */
    public static function typed(string $type, iterable $input = []): Set
    {
        return SetBuilder::typed($type)
            ->values($input)
            ->build();
    }
}
