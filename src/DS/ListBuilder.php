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

namespace PlanB\DS;

use PlanB\DS\Deque\Deque;
use PlanB\DS\Map\Map;
use PlanB\DS\PriorityQueue\PriorityQueue;
use PlanB\DS\Queue\Queue;
use PlanB\DS\Resolver\Resolver;
use PlanB\DS\Set\Set;
use PlanB\DS\Stack\Stack;
use PlanB\DS\Vector\Vector;

/**
 * Builder para crear objetos Collection
 */
class ListBuilder extends AbstractBuilder
{

    /**
     * Named constructor.
     *
     * @return \PlanB\DS\ListBuilder
     */
    public static function make(): self
    {
        return new static(Resolver::make());
    }

    /**
     * Named constructor.
     *
     * @param string $type
     *
     * @return \PlanB\DS\ListBuilder
     */
    public static function typed(string $type): self
    {
        return new static(Resolver::typed($type));
    }

    /**
     * Named constructor.
     *
     * @param \PlanB\DS\Resolver\Resolver $resolver
     *
     * @return \PlanB\DS\ListBuilder
     */
    public static function bind(Resolver $resolver): self
    {
        return new static($resolver);
    }


    /**
     * Crea un vector
     *
     * @return \PlanB\DS\Vector\Vector
     */
    public function vector(): Vector
    {
        return new Vector(
            $this->getInput(),
            $this->getResolver()
        );
    }

    /**
     * Crea un deque
     *
     * @return \PlanB\DS\Deque\Deque
     */
    public function deque(): Deque
    {
        return new Deque(
            $this->getInput(),
            $this->getResolver()
        );
    }

    /**
     * Crea un stack
     *
     * @return \PlanB\DS\Stack\Stack
     */
    public function stack(): Stack
    {
        return new Stack(
            $this->getInput(),
            $this->getResolver()
        );
    }

    /**
     * Crea un queue
     *
     * @return \PlanB\DS\Queue\Queue
     */
    public function queue(): Queue
    {
        return new Queue(
            $this->getInput(),
            $this->getResolver()
        );
    }

    /**
     * Crea un prioriy queue
     *
     * @return \PlanB\DS\PriorityQueue\PriorityQueue
     */
    public function priorityQueue(): PriorityQueue
    {
        return new PriorityQueue(
            $this->getInput(),
            $this->getResolver()
        );
    }

    /**
     * Crea un map
     *
     * @return \PlanB\DS\Map\Map
     */
    public function map(): Map
    {
        return new Map(
            $this->getInput(),
            $this->getResolver()
        );
    }

    /**
     * Crea un set
     *
     * @return \PlanB\DS\Set\Set
     */
    public function set(): Set
    {
        return new Set(
            $this->getInput(),
            $this->getResolver()
        );
    }
}
