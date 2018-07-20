<?php

namespace spec\PlanB\DS\Collection;

use PlanB\DS\Collection\Collection;
use PhpSpec\ObjectBehavior;
use PlanB\DS\Collection\Exception\InvalidValueTypeException;
use Prophecy\Argument;

class AgnosticCollectionSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beAnInstanceOf(Collection::class);
        $this->beConstructedWith('string');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Collection::class);
    }

    public function it_is_initializable_from_array()
    {
        $values = [
            'cadena 1',
            'cadena 2',
        ];

        $this->beConstructedThrough('fromArray', [$values]);
        $this->shouldHaveType(Collection::class);
    }

    public function it_throw_an_exception_when_add_different_value_types()
    {
        $values = [
            'cadena 1',
            12123,
        ];

        $this->beConstructedThrough('fromArray', [$values]);
        $this->shouldThrow(\Exception::class)->duringInstantiation();
    }

    public function it_obtanin_type_from_first_element()
    {
        $values = [
            'cadena 1',
            'cadena 2',
            'cadena 3'
        ];

        $this->beConstructedThrough('fromArray', [$values]);
        $this->getType()->shouldReturn('string');
    }
}
