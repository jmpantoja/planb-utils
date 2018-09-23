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

namespace PlanB\DS\PriorityQueue;

use PlanB\DS\Resolver\Resolver;

/**
 * A PriorityQueue is very similar to a Queue. Values are pushed into the queue
 * with an assigned priority, and the value with the highest priority will
 * always be at the front of the queue.
 */
final class PriorityQueue extends AbstractPriorityQueue
{

    /**
     * @param mixed[]                          $input
     *
     * @param null|\PlanB\DS\Resolver\Resolver $resolver
     *
     * @return \PlanB\DS\PriorityQueue
     */
    public static function make(iterable $input = [], ?Resolver $resolver = null): PriorityQueue
    {
        return (new static($resolver))
            ->pushAll($input);
    }

    /**
     * PriorityQueue named constructor.
     *
     * @param string  $type
     * @param mixed[] $input
     *
     * @return \PlanB\DS\PriorityQueue\PriorityQueue
     */
    public static function typed(string $type, iterable $input = []): PriorityQueue
    {
        return PriorityQueueBuilder::typed($type)
            ->values($input)
            ->build();
    }
}