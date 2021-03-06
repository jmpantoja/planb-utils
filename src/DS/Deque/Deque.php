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

namespace PlanB\DS\Deque;

use PlanB\DS\Resolver\Resolver;
use PlanB\DS\Traits\TraitFinal;

/**
 * A Deque (pronounced "deck") is a sequence of values in a contiguous buffer
 * that grows and shrinks automatically. The name is a common abbreviation of
 * "double-ended queue".
 *
 * While a Deque is very similar to a Vector, it offers constant time operations
 * at both ends of the buffer, ie. shift, unshift, push and pop are all O(1).
 */
final class Deque extends AbstractDeque
{
    use TraitFinal;

    /**
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Deque\Deque
     */
    public static function make(iterable $input = []): Deque
    {
        return new static($input);
    }

    /**
     * Deque named constructor.
     *
     * @param string  $type
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Deque\Deque
     */
    public static function typed(string $type, iterable $input = []): Deque
    {

        $resolver = Resolver::typed($type);

        return new static($input, $resolver);
    }
}
