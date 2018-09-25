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

/**
 * A “first in, first out” or “FIFO” collection that only allows access to the
 * value at the front of the queue and iterates in that order, destructively.
 */
final class Queue extends AbstractQueue
{
    /**
     * @param mixed[]                          $input
     *
     * @param null|\PlanB\DS\Resolver\Resolver $resolver
     *
     * @return \PlanB\DS\Queue\Queue
     */
    public static function make(iterable $input = [], ?Resolver $resolver = null): Queue
    {
        return (new static($resolver))
            ->pushAll($input);
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
        return QueueBuilder::typed($type)
            ->values($input)
            ->build();
    }
}
