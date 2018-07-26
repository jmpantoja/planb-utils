<?php

declare(strict_types=1);

namespace spec\PlanB\DS\ArrayList;


use PhpSpec\ObjectBehavior;
use PlanB\DS\ArrayList\ArrayList;
use PlanB\DS\ItemResolver\Exception\InvalidValueTypeException;
use PlanB\DS\ItemResolver\ItemResolver;
use spec\PlanB\DS\ArrayList\Stub\Word;

class ArrayListSpec extends ObjectBehavior
{

    public function let()
    {
        $this->beConstructedThrough('blank');
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

        $this->beConstructedThrough('fromArray', [$values]);
        $this->shouldHaveType(ArrayList::class);
    }

    public function it_is_initializable_from_a_resolver()
    {
        $resolver = ItemResolver::create();
        $resolver->setValidator(function () {
            return false;
        });


        $this->beConstructedThrough('bind', [$resolver]);
        $this->shouldHaveType(ArrayList::class);

        $this->add('valor');

        $this->count()->shouldReturn(0);
    }

    public function it_is_initializable_from_a_typed_resolver()
    {
        $resolver = ItemResolver::withType('string');

        $this->beConstructedThrough('bind', [$resolver]);

        $this->shouldThrow(InvalidValueTypeException::class)->duringAdd(new \stdClass());

        $this->count()->shouldReturn(0);
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
        $this->beConstructedThrough('fromArray', [[
            'a' => 1, 'b' => 2
        ]]);

        $this->getIterator()->shouldIterateAs([
            'a' => 1, 'b' => 2
        ]);
    }

    public function it_can_be_json_serialized()
    {

        $this->beConstructedThrough('fromArray', [[
            'a' => 1, 'b' => 2
        ]]);

        $this->toJson()->shouldReturn('{"a":1,"b":2}');
    }
}
