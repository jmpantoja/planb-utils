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

namespace spec\PlanB\DS\ArrayList\Methods;


use PhpSpec\ObjectBehavior;
use PlanB\DS\ArrayList\ArrayList;
use PlanB\DS\ArrayList\Exception\ItemNotFoundException;
use spec\PlanB\DS\ArrayList\Stub\LenghtArrayList;


class MutatorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beAnInstanceOf(ArrayList::class);
    }

    public function it_can_append_one_item()
    {
        $this->add('value');

        $this->count()->shouldReturn(1);
        $this->isEmpty()->shouldReturn(false);
    }

    public function it_can_append_two_item()
    {
        $this->add('value 1');
        $this->add('value 2');

        $this->count()->shouldReturn(2);
        $this->isEmpty()->shouldReturn(false);
    }

    public function it_indicate_if_an_item_exists()
    {
        $this->add('value');

        $this->exists(0)->shouldReturn(true);
    }

    public function it_indicate_if_an_item_exists_by_has()
    {
        $this->set('key', 'value');

        $this->has('key')->shouldReturn(true);
    }


    public function it_indicate_if_an_item_dont_exists()
    {
        $this->add('value');
        $this->exists('missing-key')->shouldReturn(false);
    }

    public function it_can_retrive_an_item_by_index()
    {
        $this->add('value 1');
        $this->add('value 2');

        $this->get(0)->shouldReturn('value 1');
        $this->get(1)->shouldReturn('value 2');
    }

    public function it_can_append_some_items_at_time()
    {
        $this->addAll([
            'A' => 'value 1',
            'B' => 'value 2'
        ]);

        $this->get(0)->shouldReturn('value 1');
        $this->get(1)->shouldReturn('value 2');
    }


    public function it_throws_an_exception_accesing_a_missing_item()
    {
        $this->add('value');

        $this->shouldThrow(\OutOfRangeException::class)->duringGet('missing-key');
        $this->shouldThrow(ItemNotFoundException::class)->duringGet('missing-key');
    }

    public function it_can_set_one_item()
    {
        $this->set('key', 'value');

        $this->count()->shouldReturn(1);
        $this->isEmpty()->shouldReturn(false);
    }

    public function it_can_set_two_item()
    {
        $this->set('key A', 'value A');
        $this->set('key B', 'value B');

        $this->count()->shouldReturn(2);
        $this->isEmpty()->shouldReturn(false);
    }

    public function it_can_set_some_items_at_time()
    {
        $this->setAll([
            'A' => 'value 1',
            'B' => 'value 2'
        ]);

        $this->get('A')->shouldReturn('value 1');
        $this->get('B')->shouldReturn('value 2');
    }

    public function it_can_retrive_an_item_by_key()
    {
        $this->set('A', 'value 1');
        $this->set('B', 'value 2');

        $this->get('A')->shouldReturn('value 1');
        $this->get('B')->shouldReturn('value 2');
    }

    public function it_can_retrive_an_item_or_defaults()
    {
        $this->get('A', 'defaults')->shouldReturn('defaults');
    }

    public function it_can_remove_an_item_by_key()
    {
        $this->count()->shouldReturn(0);
        $this->set('A', 'value 1');
        $this->count()->shouldReturn(1);

        $this->remove('A');
        $this->count()->shouldReturn(0);
    }

    public function it_can_remove_an_item_by_index()
    {
        $this->count()->shouldReturn(0);
        $this->add('value');
        $this->count()->shouldReturn(1);

        $this->remove(0);
        $this->count()->shouldReturn(0);
    }


    public function it_can_ignore_invalid_values()
    {
        $this->beAnInstanceOf(LenghtArrayList::class);

        $this->add('cadena demasiado larga');
        $this->count()->shouldReturn(0);
    }

    public function it_can_accept_valid_values()
    {
        $this->beAnInstanceOf(LenghtArrayList::class);

        $this->add('corta');
        $this->count()->shouldReturn(1);

        $this->get('xxxxx')->shouldReturn(5);
    }

    public function it_can_normalize_the_value_and_the_key()
    {
        $this->beAnInstanceOf(LenghtArrayList::class);

        $this->add('corta');
        $this->count()->shouldReturn(1);

        $this->get('xxxxx')->shouldReturn(5);
    }


}
