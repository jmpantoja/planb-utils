<?php

declare(strict_types=1);

namespace spec\PlanB\DS\ArrayList;


use PhpSpec\ObjectBehavior;
use PlanB\DS\ArrayList\ArrayList;
use spec\PlanB\DS\ArrayList\Stub\Word;

class ArrayListSpec extends ObjectBehavior
{

    public function it_is_countable()
    {
        $this->shouldHaveType(\Countable::class);
    }

    public function it_count_zero_when_intialize()
    {
        $this->count()->shouldReturn(0);
        $this->isEmpty()->shouldReturn(true);
    }

    public function it_is_initializable_from_array()
    {
        $values = [
            'cadena',
            123456
        ];

        $this->beConstructedThrough('fromArray', [$values]);
        $this->shouldHaveType(ArrayList::class);
    }


    public function it_can_be_returned_as_an_array()
    {
        $input = [
            'uno',
            'dos',
            'tres'
        ];

        $this->addAll($input);
        $this->toArray()->shouldReturn($input);
    }

    public function it_can_be_returned_as_a_mapped_array()
    {
        $input = [
            'uno',
            'dos',
            'tres'
        ];

        $upper = [
            'UNO',
            'DOS',
            'TRES',
        ];

        $this->addAll($input);

        $this->toArray(function (string $value) {
            return strtoupper($value);
        })->shouldReturn($upper);
    }
}
