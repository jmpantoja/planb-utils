<?php

namespace spec\PlanB\DS\TypedList;

use PlanB\DS\ItemList\Exception\InvalidItemException;
use PlanB\DS\ItemList\ListInterface;
use PlanB\DS\TypedList\AbstractTypedList;
use PlanB\DS\TypedList\LazyList;
use PhpSpec\ObjectBehavior;
use PlanB\DS\TypedList\TypedListInterface;
use PlanB\Type\DataType\Type;
use PlanB\Type\Value\Value;
use Prophecy\Argument;

class LazyListSpec extends ObjectBehavior
{

    private const STRING_A = 'cadena de texto A';
    private const STRING_B = 'cadena de texto B';
    private const NUMBER = 454325;


    public function getMatchers(): array
    {
        return [
            'haveInnerType' => function ($subject, $value) {

                if (!($subject instanceof AbstractTypedList)) {

                    return false;
                }

                return ($value === $subject->getInnerType());
            }
        ];
    }

    public function let(TypedListInterface $list)
    {
        $this->beConstructedThrough('create', [$list]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(LazyList::class);
    }

    public function it_can_auto_configure_inner_type()
    {
        $list = $this->add(self::STRING_A)
            ->getInnerList();

        $list->shouldHaveInnerType(Type::STRING);

        $list->count()->shouldReturn(1);
        $list->shouldThrow(InvalidItemException::class)->duringAdd(self::NUMBER);
    }


    public function it_can_create_from_iterable()
    {
        $list = $this->addAll([
            self::STRING_A,
            self::STRING_B
        ])->getInnerList();


        $list->shouldHaveInnerType(Type::STRING);
        $list->count()->shouldReturn(2);

    }

    public function it_throws_an_exception_when_create_with_mixed_types()
    {
        $this->shouldThrow(InvalidItemException::class)->duringAddAll([
            self::STRING_A,
            self::NUMBER,
            self::STRING_B
        ]);
    }
}
