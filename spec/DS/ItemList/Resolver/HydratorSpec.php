<?php

namespace spec\PlanB\DS\ItemList\Resolver;

use PlanB\DS\ItemList\Item;
use PlanB\DS\ItemList\ListInterface;
use PlanB\DS\ItemList\Resolver\Hydrator;
use PhpSpec\ObjectBehavior;
use PlanB\Utils\Assurance\Exception\AssertException;
use Prophecy\Argument as p;
use spec\PlanB\DS\ItemList\Resolver\Fake\FakeInvoke;

class HydratorSpec extends ObjectBehavior
{
    private const VALUE = 'value';
    private const KEY = 'key';
    private const TYPE = 'string';

    private const INVALID_TYPE = '';

    public function let(Item $item, FakeInvoke $callback)
    {
        $item->getValue()->willReturn(self::VALUE);
        $item->getKey()->willReturn(self::KEY);
        $item->setValue(p::any());

        $this->beConstructedThrough('create', [self::TYPE, $callback]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Hydrator::class);
    }

    public function it_refuse_an_invalid_type(FakeInvoke $callback)
    {
        $this->beConstructedThrough('create', [self::INVALID_TYPE, $callback]);
        
        $this->shouldThrow(AssertException::class)->duringInstantiation();
    }

    public function it_normalize_a_value_if_type_of(Item $item, FakeInvoke $callback)
    {
        $callback->__invoke(self::VALUE, self::KEY, p::any())->shouldBeCalledTimes(1);
        $item->isTypeOf(self::TYPE)->willReturn(true);

        $this->__invoke($item);
    }

    public function it_not_normalize_a_value_if_not_type_of(Item $item, FakeInvoke $callback)
    {
        $callback->__invoke(self::VALUE, self::KEY, p::any())->shouldNotBeCalled();
        $item->isTypeOf(self::TYPE)->willReturn(false);

        $this->__invoke($item);
    }
}
