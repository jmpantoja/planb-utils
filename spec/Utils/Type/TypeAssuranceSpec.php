<?php

namespace spec\PlanB\Utils\Type;

use PlanB\Utils\Assurance\Exception\AssertException;
use PlanB\Utils\Assurance\Exception\InvalidAssuranceMethodException;
use PlanB\Utils\Type\TypeAssurance;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TypeAssuranceSpec extends ObjectBehavior
{
    private const NUMBER = 123.745;

    private const NUMBER_AS_STRING = '123.745';

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
        $this->shouldThrow(InvalidAssuranceMethodException::class)->during('isXXXX');
    }

    public function it_can_ensure_that_a_variable_is_of_correct_type()
    {
        $this->isString()
            ->shouldReturn($this);
    }

    public function it_throw_an_exception_when_a_variable_is_not_of_correct_type()
    {
        $this->beConstructedThrough('create', [self::NUMBER]);

        $message = sprintf('%s fails when check if is string', self::NUMBER);
        $this->shouldThrow(new AssertException($message))->duringIsString();
    }

    public function it_convert_to_string()
    {
        $this->beConstructedThrough('create', [self::NUMBER]);

        $this->__toString()
            ->shouldReturn(self::NUMBER_AS_STRING);
    }
}
