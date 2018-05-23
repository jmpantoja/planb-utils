<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\PlanB\Type\Collection;


use PhpSpec\ObjectBehavior;
use PlanB\Type\Collection;
use PlanB\Type\Exception\ItemNotFoundException;
use spec\PlanB\Type\Stub\LenghtCollection;


class MutatorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beAnInstanceOf(Collection::class);
        $this->beConstructedWith('string');
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
        $this->getType()->shouldReturn('string');
    }

    public function it_can_ignore_invalid_values()
    {
        $this->beAnInstanceOf(LenghtCollection::class);

        $this->itemAppend('cadena demasiado larga');
        $this->count()->shouldReturn(0);
    }

    public function it_can_accept_valid_values()
    {
        $this->beAnInstanceOf(LenghtCollection::class);

        $this->itemAppend('corta');
        $this->count()->shouldReturn(1);

        $this->itemGet('xxxxx')->shouldReturn(5);
    }

    public function it_can_normalize_the_value_and_the_key()
    {
        $this->beAnInstanceOf(LenghtCollection::class);

        $this->itemAppend('corta');
        $this->count()->shouldReturn(1);

        $this->itemGet('xxxxx')->shouldReturn(5);
    }


}