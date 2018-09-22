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

use PlanB\DS\Collection;

/**
 * Interfaz para PriorityQueue
 */
interface PriorityQueueInterface extends Collection
{

    /**
     * Creates a shallow copy of the collection.
     *
     * @return \PlanB\DS\Collection a shallow copy of the collection.
     */
    public function copy(): Collection;


    /**
     * Returns the value with the highest priority in the priority queue.
     *
     * @return mixed
     *
     * @throw UnderflowException
     */
    public function peek();

    /**
     * Returns and removes the value with the highest priority in the queue.
     *
     * @return mixed
     */
    public function pop();

    /**
     * Pushes a value into the queue, with a specified priority.
     *
     * @param mixed $value
     * @param int   $priority
     *
     * @return \PlanB\DS\PriorityQueue
     */
    public function push($value, int $priority = 0): PriorityQueueInterface;

    /**
     * Pushes zero or more values onto the top of the queue.
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\PriorityQueue
     */
    public function pushAll(iterable $input): PriorityQueueInterface;
}
