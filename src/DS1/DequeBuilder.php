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

namespace PlanB\DS1;

/**
 * Builder para Deque
 */
class DequeBuilder extends AbstractBuilder
{

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
