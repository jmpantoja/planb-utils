<?php

declare(strict_types=1);

namespace spec\PlanB\DS\ItemList;


use PhpSpec\ObjectBehavior;
use PlanB\DS\ItemList\ItemList;

class ItemListSpec extends ObjectBehavior
{

    private const MIXED_VALUES = [
        'cadena',
        123456
    ];

    private const VALUES = [
        'uno',
        'dos',
        'tres'
    ];

    private const UPPER_VALUES = [
        'UNO',
        'DOS',
        'TRES',
    ];

    private const VALUES_WITH_KEY = [
        'a' => 1, 'b' => 2
    ];

    private const VALUES_WITH_KEY_JSON = '{"a":1,"b":2}';

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
        $this->beConstructedThrough('create', [self::MIXED_VALUES]);
        $this->shouldHaveType(ItemList::class);
    }

    public function it_can_be_returned_as_an_array()
    {
        $input = self::VALUES;

        $this->addAll($input);
        $this->toArray()->shouldReturn($input);
    }

    public function it_can_be_returned_as_a_mapped_array()
    {
        $this->addAll(self::VALUES);

        $this->toArray(function (string $value) {
            return strtoupper($value);
        })->shouldReturn(self::UPPER_VALUES);
    }


    public function it_use_like_an_iterator()
    {
        $this->beConstructedThrough('create', [self::VALUES_WITH_KEY]);

        $this->getIterator()->shouldIterateAs(self::VALUES_WITH_KEY);
    }

    public function it_can_be_json_serialized()
    {

        $this->beConstructedThrough('create', [self::VALUES_WITH_KEY]);

        $this->toJson()->shouldReturn(self::VALUES_WITH_KEY_JSON);
    }
}
