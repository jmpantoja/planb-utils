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

namespace PlanB\DS\Queue;

use PlanB\DS\Resolver\Resolver;
use PlanB\DS\Traits\TraitFinal;

/**
 * A “first in, first out” or “FIFO” collection that only allows access to the
 * value at the front of the queue and iterates in that order, destructively.
 */
final class Queue extends AbstractQueue
{
    use TraitFinal;

    /**
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Queue\Queue
     */
    public static function make(iterable $input = []): Queue
    {
        return new static($input);
    }

    /**
     * Queue named constructor.
     *
     * @param string  $type
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Queue\Queue
     */
    public static function typed(string $type, iterable $input = []): Queue
    {
        $resolver = Resolver::typed($type);

        return new static($input, $resolver);
    }
}
