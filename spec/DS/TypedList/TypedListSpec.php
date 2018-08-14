<?php

namespace spec\PlanB\DS\TypedList;

use PlanB\DS\ItemList\Exception\InvalidItemException;
use PlanB\DS\TypedList\TypedList;
use PhpSpec\ObjectBehavior;
use PlanB\Utils\Type\Type;
use Prophecy\Argument;
use spec\PlanB\DS\ItemList\Fake\Word;

class TypedListSpec extends ObjectBehavior
{
    private const STRING_A = 'primer elemento';
    private const STRING_B = 'segundo elemento';

    private const NUMBER_A = 4746545;

    public function let()
    {
        $this->beConstructedThrough('create', [Type::STRING]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TypedList::class);
    }


    public function it_can_add_same_type_elements()
    {
        $this->add(self::STRING_A);
        $this->add(self::STRING_B);
        $this->count()->shouldReturn(2);
    }

    public function it_can_be_created_from_type()
    {
        $this->getInnerType()->shouldReturn(Type::STRING);
    }

    public function it_refuse_add_different_type_elements_case_1()
    {
        $this->add(self::STRING_A);

        $this->shouldThrow(InvalidItemException::class)->duringAdd(self::NUMBER_A);
    }

    public function it_refuse_add_different_type_elements_case_2()
    {
        $this->beConstructedThrough('create', [Type::STRING]);
        $this->shouldThrow(InvalidItemException::class)->duringAdd(self::NUMBER_A);
    }

}
