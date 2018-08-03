<?php

namespace spec\PlanB\DS\ItemList;

use PlanB\DS\ItemList\KeyValue;
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

    public function it_can_sets_a_value_ignoring_nulls()
    {
        $this->setValueIfNotNull('nuevo-valor')
            ->getValue()->shouldReturn('nuevo-valor');

        $this->setValueIfNotNull(null)
            ->getValue()->shouldReturn('nuevo-valor');
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

    public function it_can_sets_a_new_value()
    {
        $this->setValue('new value')
            ->shouldHaveType(KeyValue::class);

        $this->getValue()->shouldReturn('new value');

    }

    public function it_can_sets_a_new_key()
    {
        $this->setKey('new key')
            ->shouldHaveType(KeyValue::class);

        $this->getKey()->shouldReturn('new key');
    }


    public function it_can_remove_the_key()
    {
        $this->beConstructedFromPair('key', 'value');

        $this->hasKey()->shouldReturn(true);

        $this->removeKey()
            ->shouldHaveType(KeyValue::class);

        $this->hasKey()->shouldReturn(false);

        $this->setKey(0);
        $this->hasKey()->shouldReturn(true);
    }

    public function it_can_mark_a_pair_as_ignored()
    {
        $this->isInvalid()->shouldReturn(false);

        $this->markAsInvalid()->shouldReturn($this);
        $this->isInvalid()->shouldReturn(true);
    }

    public function it_can_convert_to_string()
    {
        $this->beConstructedFromPair('key', 'value');

        $this->__toString()
            ->shouldReturn('key => value');

        $this->setValue(234242);

        $this->__toString()
            ->shouldReturn('key => 234242');

        $this->setValue([]);

        $this->__toString()
            ->shouldReturn('key => array');
    }


}
