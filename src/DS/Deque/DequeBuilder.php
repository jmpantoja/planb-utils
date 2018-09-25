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

namespace PlanB\DS\Deque;

use PlanB\DS\AbstractBuilder;
use PlanB\DS\Resolver\Resolver;

/**
 * Builder para Deque
 */
class DequeBuilder extends AbstractBuilder
{

    /**
     * Named constructor.
     *
     * @return \PlanB\DS\Deque\DequeBuilder
     */
    public static function make(): DequeBuilder
    {
        return new static(Resolver::make());
    }

    /**
     * Named constructor.
     *
     * @param string $type
     *
     * @return \PlanB\DS\Deque\DequeBuilder
     */
    public static function typed(string $type): DequeBuilder
    {
        return new static(Resolver::make($type));
    }


    /**
     * Crea el objeto
     *
     * @return mixed
     */
    public function build(): Deque
    {
        return Deque::make(
            $this->getInput(),
            $this->getResolver()
        );
    }
}
