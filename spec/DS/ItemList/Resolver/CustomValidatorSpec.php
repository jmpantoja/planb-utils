<?php

namespace spec\PlanB\DS\ItemList\Resolver;

use PlanB\DS\ItemList\Item;
use PlanB\DS\ItemList\ListInterface;
use PlanB\DS\ItemList\Resolver\Resolvable;
use PlanB\DS\ItemList\Resolver\CustomValidator;
use PhpSpec\ObjectBehavior;
use PlanB\DS\ItemList\Resolver\Validator;
use Prophecy\Argument as p;
use spec\PlanB\DS\ItemList\Resolver\Fake\FakeInvoke;


class CustomValidatorSpec extends ObjectBehavior
{
    private const  VALUE = 'valor';
    private const  KEY = 'key';

    public function let(FakeInvoke $validator, Item $item, ListInterface $context)
    {
        $item->getValue()->willReturn(self::VALUE);
        $item->getKey()->willReturn(self::KEY);

        $validator->__invoke(self::VALUE, self::KEY, $context)->willReturn(true);
        $this->beConstructedThrough('create', [$validator]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CustomValidator::class);
    }

    public function it_is_resolvable()
    {
        $this->shouldHaveType(Resolvable::class);
    }

    public function it_is_validator()
    {
        $this->shouldHaveType(Validator::class);
    }

    public function it_can_validate_an_item(FakeInvoke $validator, Item $item, ListInterface $context)
    {
        $validator->__invoke(self::VALUE, self::KEY, $context)
            ->shouldBeCalledTimes(1)
            ->willReturn(true);

        $this->__invoke($item, $context)->shouldReturn(true);
    }

    public function it_can_refuse_an_item(FakeInvoke $validator, Item $item, ListInterface $context)
    {
        $validator->__invoke(self::VALUE, self::KEY, $context)
            ->shouldBeCalledTimes(1)
            ->willReturn(false);

        $this->__invoke($item, $context)->shouldReturn(false);
    }

}
