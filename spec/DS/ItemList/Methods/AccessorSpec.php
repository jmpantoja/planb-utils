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

namespace spec\PlanB\DS\ItemList\Methods;


use PhpSpec\ObjectBehavior;
use PlanB\DS\ItemList\ItemList;
use PlanB\DS\ItemList\Exception\ItemNotFoundException;


class AccessorSpec extends ObjectBehavior
{
    private const VALUE_A = 'value A';
    private const VALUE_B = 'value B';
    private const VALUE_C = 'value C';

    private const KEY_A = 'key-A';
    private const KEY_B = 'key-B';
    private const KEY_C = 'key-C';

    private const MISSING_KEY = 'missing-key';
    private const DEFAULT_VALUE = 'defaults';

    public function let()
    {
        $this->beAnInstanceOf(ItemList::class);
        $this->beConstructedThrough('create');

    }

    public function it_can_append_one_item()
    {
        $this->add(self::VALUE_A);

        $this->count()->shouldReturn(1);
        $this->isEmpty()->shouldReturn(false);
    }

    public function it_can_append_two_item()
    {
        $this->add(self::VALUE_A);
        $this->add(self::VALUE_B);

        $this->count()->shouldReturn(2);
        $this->isEmpty()->shouldReturn(false);
    }

    public function it_indicate_if_an_item_exists()
    {
        $this->add(self::VALUE_A);
        $this->exists(0)->shouldReturn(true);
    }

    public function it_indicate_if_an_item_exists_by_has()
    {
        $this->set(self::KEY_A, self::VALUE_A);
        $this->has(self::KEY_A)->shouldReturn(true);
    }


    public function it_indicate_if_an_item_dont_exists()
    {
        $this->add(self::VALUE_A);
        $this->exists(self::MISSING_KEY)->shouldReturn(false);
    }

    public function it_can_retrive_an_item_by_index()
    {
        $this->add(self::VALUE_A);
        $this->add(self::VALUE_B);

        $this->get(0)->shouldReturn(self::VALUE_A);
        $this->get(1)->shouldReturn(self::VALUE_B);
    }

    public function it_can_append_some_items_at_time()
    {
        $this->addAll([
            self::KEY_A => self::VALUE_A,
            self::KEY_B => self::VALUE_B
        ]);

        $this->get(0)->shouldReturn(self::VALUE_A);
        $this->get(1)->shouldReturn(self::VALUE_B);
    }


    public function it_throws_an_exception_accesing_a_missing_item()
    {
        $this->add(self::VALUE_A);

        $this->shouldThrow(\OutOfRangeException::class)->duringGet(self::MISSING_KEY);
        $this->shouldThrow(ItemNotFoundException::class)->duringGet(self::MISSING_KEY);
    }

    public function it_can_set_one_item()
    {
        $this->set(self::KEY_A, self::VALUE_A);

        $this->count()->shouldReturn(1);
        $this->isEmpty()->shouldReturn(false);
    }

    public function it_can_set_two_item()
    {
        $this->set(self::KEY_A, self::VALUE_A);
        $this->set(self::KEY_B, self::VALUE_B);

        $this->count()->shouldReturn(2);
        $this->isEmpty()->shouldReturn(false);
    }

    public function it_can_set_some_items_at_time()
    {
        $this->setAll([
            self::KEY_A => self::VALUE_A,
            self::KEY_B => self::VALUE_B
        ]);

        $this->get(self::KEY_A)->shouldReturn(self::VALUE_A);
        $this->get(self::KEY_B)->shouldReturn(self::VALUE_B);
    }

    public function it_can_retrive_an_item_by_key()
    {
        $this->set(self::KEY_A, self::VALUE_A);
        $this->set(self::KEY_B, self::VALUE_B);

        $this->get(self::KEY_A)->shouldReturn(self::VALUE_A);
        $this->get(self::KEY_B)->shouldReturn(self::VALUE_B);
    }

    public function it_can_retrive_an_item_or_defaults()
    {
        $this->get(self::KEY_A, self::DEFAULT_VALUE)->shouldReturn(self::DEFAULT_VALUE);
    }

    public function it_can_remove_an_item_by_key()
    {
        $this->count()->shouldReturn(0);
        $this->set(self::KEY_A, self::VALUE_A);
        $this->count()->shouldReturn(1);

        $this->remove(self::KEY_A);
        $this->count()->shouldReturn(0);
    }

    public function it_can_remove_an_item_by_index()
    {
        $this->count()->shouldReturn(0);
        $this->add(self::VALUE_A);
        $this->count()->shouldReturn(1);

        $this->remove(0);
        $this->count()->shouldReturn(0);
    }

    public function it_can_clear_the_list()
    {
        $this->addAll([
            self::VALUE_A,
            self::VALUE_B
        ]);
        $this->count()->shouldReturn(2);

        $this->clear()->shouldReturn($this);
        $this->count()->shouldReturn(0);
    }


    public function it_can_clear_the_list_and_add()
    {
        $this->set(self::KEY_A, self::VALUE_A);

        $this->clearAndAdd([
            self::VALUE_B,
            self::VALUE_C,
        ])->shouldReturn($this);

        $this->toArray()->shouldReturn([
            self::VALUE_B,
            self::VALUE_C,
        ]);
    }


    public function it_can_clear_the_list_and_set()
    {
        $this->set(self::KEY_A, self::VALUE_A);

        $this->clearAndSet([
            self::KEY_B => self::VALUE_B,
            self::KEY_C => self::VALUE_C
        ])->shouldReturn($this);

        $this->toArray()->shouldReturn([
            self::KEY_B => self::VALUE_B,
            self::KEY_C => self::VALUE_C
        ]);

    }
}
