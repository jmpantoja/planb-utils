<?php

namespace spec\PlanB\DS\ArrayList;

use PlanB\DS\ArrayList\KeyValue;
use PlanB\DS\ArrayList\Hook;
use PhpSpec\ObjectBehavior;

use Prophecy\Argument;
use spec\PlanB\DS\ArrayList\Stub\ShortStringArrayList;

class HookSpec extends ObjectBehavior
{
    private const RETURNED_VALUE = 'valor devuelto';

    public function it_is_initializable()
    {
        $this->beConstructedThrough('blank');
        $this->shouldHaveType(Hook::class);
    }

    public function it_is_initializable_from_empty()
    {
        $this->beConstructedThrough('blank');

        $pair = KeyValue::fromValue('dummy');

        $this->execute($pair, 'default-value')
            ->shouldReturn('default-value');
    }

    public function it_is_initializable_from_callable()
    {

        $pair = KeyValue::fromValue('dummy');
        $this->beConstructedFromCallable(function () {
            return self::RETURNED_VALUE;
        });

        $this->execute($pair)
            ->shouldReturn(self::RETURNED_VALUE);
    }

    public function it_is_initializable_from_array(ShortStringArrayList $collection)
    {
        $collection->validate(Argument::any(), Argument::any())->willReturn(self::RETURNED_VALUE);

        $pair = KeyValue::fromValue('dummy');
        $this->beConstructedFromArray([$collection, 'validate']);

        $this->execute($pair)
            ->shouldReturn(self::RETURNED_VALUE);
    }

    public function it_is_not_initializable_from_an_invalid_array()
    {

        $pair = KeyValue::fromValue('dummy');
        $this->beConstructedFromArray(['A', 'B']);

        $this->execute($pair)
            ->shouldReturn(null);
    }


}
