<?php

namespace spec\PlanB\Type;

use PlanB\Type\Collection;
use PhpSpec\ObjectBehavior;
use PlanB\Type\ItemNotFoundException;
use Prophecy\Argument;

class CollectionSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(__CLASS__);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Collection::class);
    }

    public function it_is_countable()
    {
        $this->shouldHaveType(\Countable::class);
    }

    public function it_count_zero_when_intialize()
    {
        $this->count()->shouldReturn(0);
        $this->isEmpty()->shouldReturn(true);
    }

    public function it_can_append_one_item()
    {
        $this->itemAppend('value');

        $this->count()->shouldReturn(1);
        $this->isEmpty()->shouldReturn(false);
    }


    public function it_can_append_two_item()
    {
        $this->itemAppend('value 1');
        $this->itemAppend('value 2');

        $this->count()->shouldReturn(2);
        $this->isEmpty()->shouldReturn(false);
    }

    public function it_indicate_if_an_item_exists()
    {
        $this->itemAppend('value');

        $this->itemExists(0)->shouldReturn(true);
    }

    public function it_indicate_if_an_item_dont_exists()
    {
        $this->itemAppend('value');
        $this->itemExists('missing-key')->shouldReturn(false);
    }

    public function it_can_retrive_an_item_by_index()
    {
        $this->itemAppend('value 1');
        $this->itemAppend('value 2');

        $this->itemGet(0)->shouldReturn('value 1');
        $this->itemGet(1)->shouldReturn('value 2');
    }


    public function it_can_append_some_items_at_time()
    {
        $this->itemAppendAll([
            'A' => 'value 1',
            'B' => 'value 2'
        ]);

        $this->itemGet(0)->shouldReturn('value 1');
        $this->itemGet(1)->shouldReturn('value 2');
    }


    public function it_throws_an_exception_accesing_a_missing_item()
    {
        $this->itemAppend('value');

        $this->shouldThrow(\OutOfRangeException::class)->duringItemGet('missing-key');
        $this->shouldThrow(ItemNotFoundException::class)->duringItemGet('missing-key');
    }

    public function it_can_set_one_item()
    {
        $this->itemSet('key', 'value');

        $this->count()->shouldReturn(1);
        $this->isEmpty()->shouldReturn(false);
    }

    public function it_can_set_two_item()
    {
        $this->itemSet('key A', 'value A');
        $this->itemSet('key B', 'value B');

        $this->count()->shouldReturn(2);
        $this->isEmpty()->shouldReturn(false);
    }

    public function it_can_set_some_items_at_time()
    {
        $this->itemSetAll([
            'A' => 'value 1',
            'B' => 'value 2'
        ]);

        $this->itemGet('A')->shouldReturn('value 1');
        $this->itemGet('B')->shouldReturn('value 2');
    }

    public function it_can_retrive_an_item_by_key()
    {
        $this->itemSet('A', 'value 1');
        $this->itemSet('B', 'value 2');

        $this->itemGet('A')->shouldReturn('value 1');
        $this->itemGet('B')->shouldReturn('value 2');
    }


    public function it_can_retrive_an_item_or_defaults()
    {
        $this->itemGet('A', 'defaults')->shouldReturn('defaults');
    }

    public function it_can_unset_an_item_by_key()
    {
        $this->count()->shouldReturn(0);
        $this->itemSet('A', 'value 1');
        $this->count()->shouldReturn(1);

        $this->itemUnset('A');
        $this->count()->shouldReturn(0);
    }


    public function it_can_unset_an_item_by_index()
    {
        $this->count()->shouldReturn(0);
        $this->itemAppend('value');
        $this->count()->shouldReturn(1);

        $this->itemUnset(0);
        $this->count()->shouldReturn(0);
    }


    public function it_can_instantiate_with_a_type()
    {
        $this->getType()->shouldReturn(__CLASS__);
    }


}
