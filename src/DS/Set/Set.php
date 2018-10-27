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
use PlanB\DS\Traits\TraitFinal;

/**
 * A sequence of unique values.
 */
final class Set extends AbstractSet
{
    use TraitFinal;

    /**
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Set\Set
     */
    public static function make(iterable $input = []): Collection
    {
        return new static($input);
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
        $resolver = Resolver::typed($type);

        return new static($input, $resolver);
    }
}
