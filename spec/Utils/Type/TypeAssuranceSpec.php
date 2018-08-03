<?php

namespace spec\PlanB\Utils\Type;

use PlanB\Utils\Assurance\Exception\FailAssuranceException;
use PlanB\Utils\Assurance\Exception\InvalidAssuranceMethodException;
use PlanB\Utils\Type\TypeAssurance;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TypeAssuranceSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('create', ['cadena-de-texto']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TypeAssurance::class);
    }

    public function it_can_reject_invalid_methods()
    {
        $this->shouldThrow(InvalidAssuranceMethodException::class)->duringIsXXXX();
    }

    public function it_can_ensure_that_a_variable_is_of_correct_type()
    {
        $this->isString()
            ->shouldReturn($this);
    }

    public function it_throw_an_exception_when_a_variable_is_not_of_correct_type()
    {
        $this->beConstructedThrough('create', [123.745]);

        $message = '123.745 fails when check if is string';
        $this->shouldThrow(new FailAssuranceException($message))->duringIsString();
    }

    public function it_convert_to_string()
    {
        $this->beConstructedThrough('create', [123.745]);

        $this->__toString()
            ->shouldReturn('123.745');
    }
}
