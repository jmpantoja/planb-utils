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

namespace PlanB\DS\Queue;

use PlanB\DS\AbstractBuilder;
use PlanB\DS\Resolver\Resolver;

/**
 * Builder para Queue
 */
class QueueBuilder extends AbstractBuilder
{

    /**
     * Named constructor.
     *
     * @return \PlanB\DS\Queue\QueueBuilder
     */
    public static function make(): QueueBuilder
    {
        return new static(Resolver::make());
    }

    /**
     * Named constructor.
     *
     * @param string $type
     *
     * @return \PlanB\DS\Queue\QueueBuilder
     */
    public static function typed(string $type): QueueBuilder
    {
        return new static(Resolver::typed($type));
    }

    /**
     * Crea el objeto
     *
     * @return mixed
     */
    public function build(): Queue
    {
        return new Queue(
            $this->getInput(),
            $this->getResolver()
        );
    }
}
