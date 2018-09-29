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

namespace PlanB\DS\Stack;

use PlanB\DS\Resolver\Resolver;

/**
 * A “last in, first out” or “LIFO” collection that only allows access to the
 * value at the top of the structure and iterates in that order, destructively.
 */
final class Stack extends AbstractStack
{

    /**
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Stack\Stack
     */
    public static function make(iterable $input = []): Stack
    {
        return new static($input);
    }


    /**
     * Stack named constructor.
     *
     * @param string  $type
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Stack\Stack
     */
    public static function typed(string $type, iterable $input = []): Stack
    {
        $resolver = Resolver::typed($type);

        return new static($input, $resolver);
    }
}
