<?php

namespace spec\PlanB\DS\ItemResolver;

use PlanB\DS\ItemResolver\Hook;
use PlanB\DS\ItemResolver\Exception\InvalidTypeException;

use PhpSpec\ObjectBehavior;
use PlanB\DS\ItemResolver\TypeAssertionFactory;
use Prophecy\Argument;

class TypeAssertionFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(TypeAssertionFactory::class);
    }

    public function it_can_create_a_validator_by_classname()
    {
        $this->factory(__CLASS__)->shouldHaveType(Hook::class);
    }

    public function it_can_create_a_validator_by_interface()
    {
        $this->factory(\Throwable::class)->shouldHaveType(Hook::class);
    }


    public function it_can_create_a_validator_by_native()
    {
        $this->factory('string')->shouldHaveType(Hook::class);
    }


    public function it_throws_an_exception_if_recieve_an_invalid_type()
    {
        $this->shouldThrow(InvalidTypeException::class)->duringFactory('invalid-type');
    }
}
