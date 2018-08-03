<?php

declare(strict_types=1);

namespace spec\PlanB\DS\ItemList;


use PhpSpec\ObjectBehavior;
use PlanB\DS\ItemList\ItemList;

class ItemListSpec extends ObjectBehavior
{

    public function let()
    {
        $this->beConstructedThrough('create');
    }

    public function it_is_countable()
    {
        $this->shouldHaveType(\Countable::class);
    }


    public function it_is_traversable()
    {
        $this->shouldHaveType(\Traversable::class);
    }

    public function it_is_json_serializable()
    {
        $this->shouldHaveType(\JsonSerializable::class);
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

        $this->beConstructedThrough('create', [$values]);
        $this->shouldHaveType(ItemList::class);
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


    public function it_use_like_an_iterator()
    {
        $this->beConstructedThrough('create', [[
            'a' => 1, 'b' => 2
        ]]);

        $this->getIterator()->shouldIterateAs([
            'a' => 1, 'b' => 2
        ]);
    }

    public function it_can_be_json_serialized()
    {

        $this->beConstructedThrough('create', [[
            'a' => 1, 'b' => 2
        ]]);

        $this->toJson()->shouldReturn('{"a":1,"b":2}');
    }
}
