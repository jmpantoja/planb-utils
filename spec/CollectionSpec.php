<?php

namespace spec\PlanB\Type;

use PlanB\Type\Collection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Collection::class);
    }

    function it_is_countable()
    {
        $this->shouldHaveType(\Countable::class);
    }

    function it_count_zero_when_intialize()
    {
        $this->count()->shouldReturn(0);
        $this->isEmpty()->shouldReturn(true);
    }

    function it_can_append_one_item()
    {
        $this->itemAppend('value');

        $this->count()->shouldReturn(1);
        $this->isEmpty()->shouldReturn(false);
    }


    function it_can_append_two_item()
    {
        $this->itemAppend('value 1');
        $this->itemAppend('value 2');

        $this->count()->shouldReturn(2);
        $this->isEmpty()->shouldReturn(false);
    }

    function it_can_retrive_an_item_by_index(){
        $this->itemAppend('value 1');
        $this->itemAppend('value 2');

        $this->itemGet(0)->shouldReturn('value 1');
        $this->itemGet(1)->shouldReturn('value 2');
    }
}
