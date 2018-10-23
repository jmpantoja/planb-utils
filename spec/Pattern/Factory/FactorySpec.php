<?php

namespace spec\PlanB\Pattern\Factory;

use PlanB\Pattern\Factory\Exception\FactoryMethodException;
use PlanB\Pattern\Factory\Factory;
use PhpSpec\ObjectBehavior;
use PlanB\Type\Data\Data;
use PlanB\Type\Number\Number;
use PlanB\Type\Text\Text;
use Prophecy\Argument;

class FactorySpec extends ObjectBehavior
{

    public function build($value)
    {
        $this->beAnInstanceOf(FactoryMock::class);
        $this->beConstructedThrough('factory', [$value]);
    }


    public function it_retrieve_a_value_from_countable()
    {
        $value = [1, 2, 3, 4];
        $this->build($value);

        $this->shouldReturn('A');
    }

    public function it_retrieve_a_value_from_throwable()
    {
        $value = new \Exception();
        $this->build($value);

        $this->shouldReturn('B');
    }


    public function it_retrieve_a_value_from_stringifable()
    {
        $value = Text::make('hola');
        $this->build($value);

        $this->shouldReturn('C');
    }

    public function it_throw_a_type_error_if_request_an_uncovered_type()
    {
        $value = Number::make(84563);
        $this->build($value);

        $this->shouldThrow(\TypeError::class)->duringInstantiation();
    }

    public function it_throws_an_exception_when_register_an_invalid_method()
    {
        $value = "hola";

        $this->beAnInstanceOf(FactoryMock::class);
        $this->beConstructedThrough('factoryAndFail', [$value]);

        $this->shouldThrow(FactoryMethodException::class)->duringInstantiation();
    }
}
