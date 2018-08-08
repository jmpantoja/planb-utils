<?php

namespace spec\PlanB\DS\ItemList;

use PlanB\DS\ItemList\Exception\InvalidItemException;
use PlanB\DS\ItemList\InlineTypedList;
use PlanB\DS\ItemList\ListInterface;
use PlanB\DS\ItemList\TypableList;
use PlanB\DS\ItemList\TypedList;
use PhpSpec\ObjectBehavior;
use PlanB\Utils\Assurance\Exception\AssertException;
use Prophecy\Argument;

class TypedListSpec extends ObjectBehavior
{
    private const TYPE = 'string';

    private const INVALID_TYPE = 'invalid-type';

    private const INVALID_VALUE = 2342424;

    public function let()
    {
        $this->beConstructedThrough('ofType', [self::TYPE]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TypedList::class);
    }

    public function it_is_typable()
    {
        $this->shouldHaveType(TypableList::class);

    }

    public function it_is_list()
    {
        $this->shouldHaveType(ListInterface::class);
    }

    public function it_throw_an_exception_when_create_with_an_invalid_type()
    {
        $this->beConstructedThrough('ofType', [self::INVALID_TYPE]);
        $this->shouldThrow(AssertException::class)->duringInstantiation();
    }

    public function it_can_retrieve_the_inner_type()
    {
        $this->getInnerType()->shouldReturn(self::TYPE);
    }

    public function it_refuse_an_invalid_type_item()
    {
        $this->shouldThrow(InvalidItemException::class)->duringAdd(self::INVALID_VALUE);
    }

    public function it_normalize_before_add()
    {
        $this->addNormalizer(function ($value) {
            return (string)$value;
        });

        $this->shouldNotThrow(InvalidItemException::class)->duringAdd(self::INVALID_VALUE);
    }
}
