<?php

namespace spec\PlanB\DS\Collection;

use PlanB\DS\Collection\Collection;
use PhpSpec\ObjectBehavior;
use PlanB\DS\Collection\Exception\InvalidValueTypeException;
use Prophecy\Argument;

class CollectionSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('fromType', ['string']);
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


    public function it_can_instantiate_with_a_type()
    {
        $this->getType()->shouldReturn('string');
    }

    public function it_allow_a_value_of_a_valid_type()
    {
        $this->shouldNotThrow()->duringSet('key', 'cadena-de-texto');
    }


    public function it_disallow_a_value_of_a_valid_type()
    {
        $this->shouldThrow(InvalidValueTypeException::class)->duringSet('key', 1234);
    }

}
