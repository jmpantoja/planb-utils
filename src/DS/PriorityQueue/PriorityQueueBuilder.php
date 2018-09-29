<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace PlanB\DS\PriorityQueue;

use PlanB\DS\AbstractBuilder;
use PlanB\DS\Resolver\Resolver;

/**
 * Builder para PriorityQueue
 */
class PriorityQueueBuilder extends AbstractBuilder
{

    /**
     * Named constructor.
     *
     * @return \PlanB\DS\PriorityQueue\PriorityQueueBuilder
     */
    public static function make(): PriorityQueueBuilder
    {
        return new static(Resolver::make());
    }

    /**
     * Named constructor.
     *
     * @param string $type
     *
     * @return \PlanB\DS\PriorityQueue\PriorityQueueBuilder
     */
    public static function typed(string $type): PriorityQueueBuilder
    {
        return new static(Resolver::typed($type));
    }

    /**
     * Crea el objeto
     *
     * @return mixed
     */
    public function build()
    {
        return new PriorityQueue(
            $this->getInput(),
            $this->getResolver()
        );
    }
}
