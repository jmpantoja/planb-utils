<?php

namespace spec\PlanB\DS;

use PlanB\DS\KeyValue;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class KeyValueSpec extends ObjectBehavior
{

    public function let()
    {
        $this->beConstructedFromValue('value');
    }

    public function it_is_initializable_from_value()
    {
        $this->shouldHaveType(KeyValue::class);
        $this->hasKey()->shouldReturn(false);
    }

    public function it_is_initializable_from_pair()
    {
        $this->beConstructedFromPair('key', 'value');
        $this->shouldHaveType(KeyValue::class);
        $this->hasKey()->shouldReturn(true);
    }

    public function it_can_retrive_value()
    {
        $this->getValue()->shouldReturn('value');
    }


    public function it_can_retrive_the_value_primitive_type()
    {
        $this->getType()->shouldReturn('string');
    }

    public function it_can_retrive_the_value_classname()
    {
        $this->beConstructedFromPair('key', new \stdClass());

        $this->getType()->shouldReturn(\stdClass::class);
    }


    public function it_can_retrive_key()
    {
        $this->beConstructedFromPair('key', 'value');
        $this->getKey()->shouldReturn('key');
    }


    public function it_retrive_null_if_has_not_key()
    {
        $this->getKey()->shouldReturn(null);
    }

    public function it_can_create_a_new_instance_changing_the_value()
    {
        $response = $this->changeValue('new value');

        $response->shouldHaveType(KeyValue::class);
        $response->getValue()->shouldReturn('new value');
        $response->getKey()->shouldReturn($this->getKey());
    }

    public function it_can_create_a_new_instance_changing_the_value_from_a_pair()
    {
        $this->beConstructedFromPair('key', 'value');
        $response = $this->changeValue('new value');

        $response->shouldHaveType(KeyValue::class);
        $response->getValue()->shouldReturn('new value');
        $response->getKey()->shouldReturn($this->getKey());
    }


    public function it_can_create_a_new_instance_changing_the_key()
    {
        $response = $this->changeKey('new key');

        $response->shouldHaveType(KeyValue::class);
        $response->getValue()->shouldReturn($this->getValue());
        $response->getKey()->shouldReturn('new key');
    }


    public function it_can_create_a_new_instance_removing_the_key_from_a_pair()
    {
        $this->beConstructedFromPair('key', 'value');
        $response = $this->changeKey(null);

        $response->shouldHaveType(KeyValue::class);
        $response->getValue()->shouldReturn($this->getValue());
        $response->hasKey()->shouldReturn(false);
    }
}
