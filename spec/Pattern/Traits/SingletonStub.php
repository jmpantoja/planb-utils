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

namespace spec\PlanB\Pattern\Traits;


use PlanB\Pattern\Traits\Singleton;

class SingletonStub
{
    use Singleton;


    public function callClone()
    {
        return clone $this;
    }

    public function callWakeup()
    {
        return $this->__wakeup();
    }
}
