<?php

namespace spec\PlanB\Type\Value;

use PlanB\Type\DataType\Type;
use PlanB\Type\Assurance\Exception\AssertException;
use PlanB\Type\Assurance\Exception\InvalidAssuranceMethodException;
use PlanB\Type\Value\ValueAssurance;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ValueAssuranceSpec extends ObjectBehavior
{
    private const NUMBER = 123.745;

    private const NUMBER_AS_STRING = '[double: 123.745]';

    public function let()
    {
        $this->beConstructedThrough('create', ['cadena-de-texto']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ValueAssurance::class);
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

        $this->shouldThrow(AssertException::class)->duringIsString();
    }

    public function it_convert_to_a_decorated_string()
    {
        $this->beConstructedThrough('create', [self::NUMBER]);

        $this->decorate()
            ->shouldReturn(self::NUMBER_AS_STRING);
    }

    public function it_convert_to_string()
    {
        $this->beConstructedThrough('create', [self::NUMBER]);

        $this->__toString()
            ->shouldReturn(Type::DOUBLE);
    }
}
