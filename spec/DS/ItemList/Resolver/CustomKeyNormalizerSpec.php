<?php

namespace spec\PlanB\DS\ItemList\Resolver;

use PlanB\DS\ItemList\Item;
use PlanB\DS\ItemList\ListInterface;
use PlanB\DS\ItemList\Resolver\CustomKeyNormalizer;
use PhpSpec\ObjectBehavior;
use PlanB\DS\ItemList\Resolver\KeyNormalizer;
use PlanB\DS\ItemList\Resolver\Resolvable;
use Prophecy\Argument;
use spec\PlanB\DS\ItemList\Resolver\Fake\FakeInvoke;

class CustomKeyNormalizerSpec extends ObjectBehavior
{

    private const  VALUE = 'valor';
    private const  KEY = 'key';
    private const  NORMALIZED_KEY = 'key-normalizada';

    public function let(FakeInvoke $normalizer, Item $item, ListInterface $context)
    {
        $item->getValue()->willReturn(self::VALUE);
        $item->getKey()->willReturn(self::KEY);

        $normalizer->__invoke(self::KEY, self::VALUE, $context)->willReturn(self::NORMALIZED_KEY);
        $this->beConstructedThrough('create', [$normalizer]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CustomKeyNormalizer::class);
    }


    public function it_is_resolvable()
    {
        $this->shouldHaveType(Resolvable::class);
    }

    public function it_is_key_normalizer()
    {
        $this->shouldHaveType(KeyNormalizer::class);
    }

    public function it_can_normalize_the_value_of_an_item(Item $item, ListInterface $context)
    {
        $item->setKey(self::NORMALIZED_KEY)->shouldBeCalled();
        $this->__invoke($item, $context)->shouldReturn(true);
    }
}
