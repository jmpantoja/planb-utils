<?php

namespace spec\PlanB\Type;

use PlanB\Type\KeyValue;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class KeyValueSpec extends ObjectBehavior
{


    function it_is_initializable_from_value()
    {
        $this->beConstructedFromValue('value');

        $this->shouldHaveType(KeyValue::class);
        $this->hasKey()->shouldReturn(false);
    }

    function it_is_initializable_from_pair()
    {
        $this->beConstructedFromPair('key', 'value');

        $this->shouldHaveType(KeyValue::class);
        $this->hasKey()->shouldReturn(true);
    }

    function it_can_retrive_value()
    {
        $this->beConstructedFromValue('value');
        $this->getValue()->shouldReturn('value');
    }

    function it_can_retrive_key()
    {
        $this->beConstructedFromPair('key', 'value');
        $this->getKey()->shouldReturn('key');
    }


    function it_retrive_null_if_has_not_key()
    {
        $this->beConstructedFromValue('value');
        $this->getKey()->shouldReturn(null);
    }
}
