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

namespace spec\PlanB;


use PhpSpec\Exception\Example\FailureException;
use PlanB\DS\Resolver\Input\Input;
use PlanB\Type\Data\Data;

class Matchers
{
    /**
     * @var array
     */
    private $matchers;

    public static function make()
    {
        return new static();
    }

    protected function __construct()
    {
        $this->matchers = [
            
        ];
    }

    public function toArray()
    {
        return $this->matchers;
    }

}
