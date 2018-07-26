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

namespace spec\PlanB\DS\ArrayList\Methods;


use PhpSpec\ObjectBehavior;
use spec\PlanB\DS\Stub\StubList;


class ResolverSpec extends ObjectBehavior
{

    public function it_can_ignore_invalid_values()
    {
        $this->beAnInstanceOf(StubList::class);

        $this->add('cadena demasiado larga');
        $this->count()->shouldReturn(0);
    }

    public function it_can_accept_valid_values()
    {
        $this->beAnInstanceOf(StubList::class);

        $this->add('corta');
        $this->count()->shouldReturn(1);

        $this->get(5)->shouldReturn('-----corta');
    }

//    public function it_can_set_a_custom_validator()
//    {
//        $this->beAnInstanceOf(StubList::class);
//
//        $this->setValidator(function (string $value) {
//            return strlen(trim($value)) < 5;
//        });
//
//        $this->add('corta');
//        $this->count()->shouldReturn(0);
//
//    }


}
