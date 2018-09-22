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

use PlanB\DS\Collection;

/**
 * Interfaz para Queue
 */
interface QueueInterface extends Collection
{

    /**
     * Returns the value at the front of the queue without removing it.
     *
     * @return mixed
     */
    public function peek();

    /**
     * Returns and removes the value at the front of the Queue.
     *
     * @return mixed
     */
    public function pop();

    /**
     * Pushes one value onto the top of the queue.
     *
     * @param mixed $input
     *
     * @return \PlanB\DS\Queue
     */
    public function push($input): QueueInterface;


    /**
     * Pushes zero or more values onto the top of the queue.
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Stack
     */
    public function pushAll(iterable $input): QueueInterface;
}
