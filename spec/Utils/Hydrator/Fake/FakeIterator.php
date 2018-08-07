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

namespace spec\PlanB\Utils\Hydrator\Fake;


use Traversable;

class FakeIterator extends FakePerson implements \IteratorAggregate
{

    public function getIterator()
    {
        return new \ArrayIterator([
            'name' => $this->getName(),
            'last-name' => $this->getLastName()
        ]);
    }
}
