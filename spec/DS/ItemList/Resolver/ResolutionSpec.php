<?php

namespace spec\PlanB\DS\ItemList\Resolver;

use PlanB\DS\ItemList\Exception\InvalidItemException;
use PlanB\DS\ItemList\Exception\ReconfigureFullyListException;
use PlanB\DS\ItemList\Item;
use PlanB\DS\ItemList\ListInterface;
use PlanB\DS\ItemList\Resolver\CustomKeyNormalizer;
use PlanB\DS\ItemList\Resolver\CustomNormalizer;
use PlanB\DS\ItemList\Resolver\Normalizer;
use PlanB\DS\ItemList\Resolver\Resolvable;
use PlanB\DS\ItemList\Resolver\Resolution;
use PhpSpec\ObjectBehavior;

use PlanB\DS\ItemList\Resolver\Validator;
use Prophecy\Argument as p;
use Prophecy\Argument;

class ResolutionSpec extends ObjectBehavior
{
    private const  VALUE = 'valor';
    private const  KEY = 'key';
    private const  NORMALIZED_VALUE = 'valor-normalizado';
    private const  NORMALIZED_KEY = 'key-normalizada';

    public function let(Item $item, ListInterface $context)
    {
        $item->getValue()->willReturn(self::VALUE);
        $item->getKey()->willReturn(self::KEY);
        $item->__toString()->willReturn('key: value');

        $this->beConstructedThrough('create', [$context]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Resolution::class);
    }

    public function it_accept_an_item_before_resolve_with_a_single_resolver(Resolvable $resolver, Item $item, ListInterface $context)
    {
        $resolver->__invoke($item, $context)->willReturn(true);

        $this->add($resolver);
        $this->resolve($item)->shouldReturn(true);
    }

    public function it_add_an_item_before_resolve_with_two_resolvers(Resolvable $resolverA, Resolvable $resolverB, Item $item, ListInterface $context)
    {
        $resolverA->__invoke($item, $context)->willReturn(true);
        $resolverB->__invoke($item, $context)->willReturn(true);

        $this->add($resolverA);
        $this->add($resolverB);

        $this->resolve($item)->shouldReturn(true);
    }


    public function it_reject_an_item_before_resolve_with_a_single_resolver(Resolvable $resolver, Item $item, ListInterface $context)
    {
        $resolver->__invoke($item, $context)->willReturn(false);
        $this->add($resolver);

        $this->shouldThrow(InvalidItemException::class)->duringResolve($item);
    }

    public function it_reject_an_item_if_the_first_resolver_fails(Resolvable $resolverA, Resolvable $resolverB, Item $item, ListInterface $context)
    {
        $resolverA->__invoke($item, $context)->willReturn(false);
        $resolverB->__invoke($item, $context)->shouldBeCalledTimes(0);

        $this->add($resolverA);
        $this->add($resolverB);

        $this->shouldThrow(InvalidItemException::class)->duringResolve($item);
    }

    public function it_reject_an_item_if_the_last_resolver_fails(Resolvable $resolverA, Resolvable $resolverB, Item $item, ListInterface $context)
    {
        $resolverA->__invoke($item, $context)->willReturn(true);
        $resolverB->__invoke($item, $context)->willReturn(false);

        $resolverB->__invoke($item, $context)->shouldBeCalledTimes(1);

        $this->add($resolverA);
        $this->add($resolverB);

        $this->shouldThrow(InvalidItemException::class)->duringResolve($item);
    }


    public function it_can_change_resolver_order(Resolvable $resolverA, Resolvable $resolverB, Item $item, ListInterface $context)
    {
        $resolverA->__invoke($item, $context)->willReturn(true);
        $resolverB->__invoke($item, $context)->willReturn(false);

        $resolverA->__invoke($item, $context)->shouldBeCalledTimes(0);
        $resolverB->__invoke($item, $context)->shouldBeCalledTimes(1);

        $this->add($resolverA, 2);
        $this->add($resolverB, 1);

        $this->shouldThrow(InvalidItemException::class)->duringResolve($item);
    }

    public function it_can_resolve_twice(Resolvable $resolver, Item $item, ListInterface $context)
    {
        $resolver->__invoke($item, $context)->willReturn(false, true);

        $this->add($resolver);

        $this->shouldThrow(InvalidItemException::class)->duringResolve($item);
        $this->resolve($item)->shouldReturn(true);
    }


    public function it_can_resolve_with_change_order_twice(Resolvable $resolverA, Resolvable $resolverB, Item $item, ListInterface $context)
    {
        $resolverA->__invoke($item, $context)->willReturn(false);
        $resolverB->__invoke($item, $context)->willReturn(false, true);

        $resolverA->__invoke($item, $context)->shouldBeCalledTimes(1);
        $resolverB->__invoke($item, $context)->shouldBeCalledTimes(2);

        $this->add($resolverA, 2);
        $this->add($resolverB, 1);

        $this->shouldThrow(InvalidItemException::class)->duringResolve($item);
        $this->shouldThrow(InvalidItemException::class)->duringResolve($item);

    }


    public function it_can_silent_the_invalid_item_exception(Resolvable $resolver, Item $item, ListInterface $context)
    {
        $resolver->__invoke($item)->willReturn(false);

        $this->silentExceptions();
        $this->add($resolver);

        $this->shouldNotThrow(InvalidItemException::class)->duringResolve($item);

    }

    public function it_can_count_resolvers(Resolvable $resolver)
    {

        $this->add($resolver);
        $this->add($resolver);
        $this->count()->shouldReturn(2);

        $this->add($resolver);
        $this->count()->shouldReturn(3);

    }

    public function it_can_validate_an_item(Validator $validator, Item $item, Item $validItem, ListInterface $context)
    {

        $validator->__invoke($item, $context)->willReturn(false);
        $validator->__invoke($validItem, $context)->willReturn(true);

        $this->add($validator);

        $this->shouldThrow(InvalidItemException::class)->duringResolve($item);
        $this->resolve($validItem)->shouldReturn(true);
    }

    public function it_can_normalize_an_item_value(Item $item, ListInterface $context)
    {

        $item->setValue(self::NORMALIZED_VALUE)->shouldBeCalled();

        $normalizer = CustomNormalizer::create(function () {
            return self::NORMALIZED_VALUE;
        });

        $this->add($normalizer);
        $this->resolve($item, $context)->shouldReturn(true);
    }

    public function it_can_normalize_an_item_key(Item $item, ListInterface $context)
    {

        $item->setKey(self::NORMALIZED_KEY)->shouldBeCalled();

        $normalizer = CustomKeyNormalizer::create(function () {
            return self::NORMALIZED_KEY;
        });

        $this->add($normalizer);
        $this->resolve($item, $context)->shouldReturn(true);
    }

    public function it_throw_an_exception_when_reconfigure_non_empty_list(Resolvable $resolver, Item $item, ListInterface $context)
    {
        $this->resolve($item, $context)->shouldReturn(true);

        $this->shouldThrow(ReconfigureFullyListException::class)->duringAdd($resolver);
    }
}
