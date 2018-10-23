<?php

namespace spec\PlanB\Type\Data;

use PlanB\Type\Data\Data;
use PlanB\Type\DataType\Type;
use PlanB\Type\Assurance\Exception\AssertException;
use PlanB\Type\Assurance\Exception\InvalidAssuranceMethodException;
use PlanB\Type\Data\DataAssurance;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DataAssuranceSpec extends ObjectBehavior
{
    private const NUMBER = 123.745;

    private const NUMBER_AS_STRING = '[double: 123.745]';

    public function let()
    {
        $this->beConstructedThrough('make', ['cadena-de-texto']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DataAssurance::class);
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
        $this->beConstructedThrough('make', [self::NUMBER]);

        $this->shouldThrow(AssertException::class)->duringIsString();
    }

    public function it_can_be_make_with_a_data_as_argument()
    {
        $data = Data::make(new \Exception());
        $this->beConstructedThrough('make', [$data]);

        $this->isThrowable()
            ->shouldReturn($this);

        $this->shouldThrow(AssertException::class)->duringIsTypeOf(Data::class);
        $this->shouldNotThrow()->duringIsTypeOf(\Exception::class);
    }
}
