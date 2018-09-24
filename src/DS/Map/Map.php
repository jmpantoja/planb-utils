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

namespace PlanB\DS\Map;

use PlanB\DS\Resolver\Resolver;

/**
 * A Map is a sequential collection of key-value pairs, almost identical to an
 * array used in a similar context. Keys can be any type, but must be unique.
 */
final class Map extends AbstractMap
{
    /**
     * @param mixed[]                          $input
     *
     * @param null|\PlanB\DS\Resolver\Resolver $resolver
     *
     * @return \PlanB\DS\Map\Map
     */
    public static function make(iterable $input = [], ?Resolver $resolver = null): Map
    {
        return (new static($resolver))
            ->putAll($input);
    }

    /**
     * Map named constructor.
     *
     * @param string  $type
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Map\Map
     */
    public static function typed(string $type, iterable $input = []): Map
    {
        return MapBuilder::typed($type)
            ->values($input)
            ->build();
    }
}
