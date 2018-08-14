<?php

namespace spec\PlanB\DS\TypedList;

use PhpSpec\Exception\Example\FailureException;
use PlanB\DS\TypedList\AbstractTypedList;
use PlanB\DS\TypedList\TypedList;
use PlanB\DS\TypedList\TypedListFactory;
use PhpSpec\ObjectBehavior;
use PlanB\Utils\Type\Type;
use PlanB\Utils\TypeName\TypeName;
use PlanB\ValueObject\Text\Text;
use Prophecy\Argument;

class TypedListFactorySpec extends ObjectBehavior
{
    private const INTEGER = 4687;

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

    public function it_is_initializable()
    {
        $this->shouldHaveType(TypedListFactory::class);
    }

    public function it_can_create_a_typed_list_from_a_type()
    {
        $list = $this->fromType(Type::STRING);
        $list->shouldHaveInnerType(Type::STRING);
    }

    public function it_can_create_a_typed_list_from_a_value()
    {
        $list = $this->fromValue(self::INTEGER);
        $list->shouldHaveInnerType(Type::INTEGER);
    }

    public function it_can_create_a_typed_list_from_a_typename(TypeName $typeName)
    {
        $typeName->isClassOf(Text::class)->willReturn(false);
        $typeName->stringify()->willReturn(Type::INTEGER);

        $list = $this->fromTypeName($typeName);
        $list->shouldHaveInnerType(Type::INTEGER);
    }

    public function it_can_create_a_text_list(TypeName $typeName)
    {
        $typeName->isClassOf(Text::class)->willReturn(true);

        $list = $this->fromTypeName($typeName);
        $list->shouldHaveInnerType(Text::class);
    }

}