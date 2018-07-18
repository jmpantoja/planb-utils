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

namespace spec\PlanB\Utils\Hydrator;


class Dummy
{
    /**
     * @var string
     */
    private $name = '';

    /**
     * @var string
     */
    private $lastName = '';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Dummy
     */
    public function setName(string $name): Dummy
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Dummy
     */
    public function setLastName(string $lastName): Dummy
    {
        $this->lastName = $lastName;
        return $this;
    }


}
