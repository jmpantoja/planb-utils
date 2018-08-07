<?php

namespace spec\PlanB\DS\ItemList\Resolver;

use PlanB\DS\ItemList\Item;
use PlanB\DS\ItemList\ListInterface;
use PlanB\DS\ItemList\Resolver\CustomNormalizer;
use PhpSpec\ObjectBehavior;
use PlanB\DS\ItemList\Resolver\Normalizer;
use PlanB\DS\ItemList\Resolver\Resolvable;
use Prophecy\Argument as p;
use spec\PlanB\DS\ItemList\Resolver\Fake\FakeInvoke;

class CustomNormalizerSpec extends ObjectBehavior
{
    private const  VALUE = 'valor';
    private const  KEY = 'key';
    private const  NORMALIZED_VALUE = 'valor-normalizado';

    public function let(FakeInvoke $normalizer, Item $item, ListInterface $context)
    {
        $item->getValue()->willReturn(self::VALUE);
        $item->getKey()->willReturn(self::KEY);

        $normalizer->__invoke(self::VALUE, self::KEY, $context)->willReturn(self::NORMALIZED_VALUE);
        $this->beConstructedThrough('create', [$normalizer]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CustomNormalizer::class);
    }

    public function it_is_resolvable()
    {
        $this->shouldHaveType(Resolvable::class);
    }

    public function it_is_normalizer()
    {
        $this->shouldHaveType(Normalizer::class);
    }

    public function it_can_normalize_the_value_of_an_item(Item $item, ListInterface $context)
    {
        $item->setValue(self::NORMALIZED_VALUE)->shouldBeCalled();

        $this->__invoke($item, $context)->shouldReturn(true);
    }
}
