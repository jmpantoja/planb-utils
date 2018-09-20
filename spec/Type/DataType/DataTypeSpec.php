<?php

namespace spec\PlanB\Type\DataType;

use PlanB\DS\ItemList\ItemList;
use PlanB\DS\ItemList\ListInterface;
use PlanB\DS\ItemList\Traits\Accessors;
use PlanB\DS\TypedList\TypedListInterface;
use PlanB\Type\DataType\DataType;
use PhpSpec\ObjectBehavior;
use PlanB\Type\DataType\Type;
use Prophecy\Argument;
use Symfony\Component\VarDumper\Cloner\Data;

class DataTypeSpec extends ObjectBehavior
{
    /**
     * Override this method to provide your own inline matchers
     *
     * @link http://phpspec.net/cookbook/matchers.html Matchers cookbook
     * @return array a list of inline matchers
     */
    public function getMatchers(): array
    {
        return [
            'verifyNative' => function (DataType $subject, $value) {

                $isClass = (false === $subject->isClass());
                $isClassOrInterface = (false === $subject->isClassOrInterface() || $value === Type::COUNTABLE);
                $isInterface = (false === $subject->isInterface() || $value === Type::COUNTABLE);
                $isNative = (true === $subject->isNative());
                $isTrait = (false === $subject->isTrait());
                $isValid = (true === $subject->isValid());
                $isChildOf = (false === $subject->isChildOf($value));
                $isTypeOf = (true === $subject->isTypeOf($value));


                return $isClass && $isClassOrInterface && $isInterface && $isNative && $isTrait && $isValid && $isChildOf && $isTypeOf;
            },
            'verifyInterface' => function (DataType $subject, $value) {

                $isClass = (false === $subject->isClass());
                $isClassOrInterface = (true === $subject->isClassOrInterface());
                $isInterface = (true === $subject->isInterface());
                $isNative = (false === $subject->isNative());
                $isTrait = (false === $subject->isTrait());
                $isValid = (true === $subject->isValid());
                $isChildOf = (true === $subject->isChildOf($value));
                $isTypeOf = (true === $subject->isTypeOf($value));

                return $isClass && $isClassOrInterface && $isInterface && $isNative && $isTrait && $isValid && $isChildOf && $isTypeOf;
            },
            'verifyClass' => function (DataType $subject, $value) {

                $isClass = (true === $subject->isClass());
                $isClassOrInterface = (true === $subject->isClassOrInterface());
                $isInterface = (false === $subject->isInterface());
                $isNative = (false === $subject->isNative());
                $isTrait = (false === $subject->isTrait());
                $isValid = (true === $subject->isValid());
                $isChildOf = (true === $subject->isChildOf($value));
                $isTypeOf = (true === $subject->isTypeOf($value));

                return $isClass && $isClassOrInterface && $isInterface && $isNative && $isTrait && $isValid && $isChildOf && $isTypeOf;
            },
            'verifyTrait' => function (DataType $subject, $value) {

                $isClass = (false === $subject->isClass());
                $isClassOrInterface = (false === $subject->isClassOrInterface());
                $isInterface = (false === $subject->isInterface());
                $isNative = (false === $subject->isNative());
                $isTrait = (true === $subject->isTrait());
                $isValid = (true === $subject->isValid());
                $isChildOf = (false === $subject->isChildOf($value));
                $isTypeOf = (true === $subject->isTypeOf($value));

                return $isClass  && $isClassOrInterface && $isInterface && $isNative && $isTrait && $isValid && $isChildOf && $isTypeOf;
            }
        ];
    }


    public function it_is_initializable()
    {
        $this->shouldHaveType(DataType::class);
    }

    public function it_can_detect_array()
    {
        $this->beConstructedThrough('create', ['array']);

        $this->shouldVerifyNative(Type::ARRAY);
        $this->__toString()->shouldReturn(Type::ARRAY);
    }

    public function it_can_detect_boolean()
    {
        $this->beConstructedThrough('create', ['boolean']);

        $this->shouldVerifyNative(Type::BOOLEAN);
        $this->__toString()->shouldReturn(Type::BOOLEAN);
    }

    public function it_can_detect_bool()
    {
        $this->beConstructedThrough('create', ['bool']);

        $this->shouldVerifyNative(Type::BOOLEAN);
        $this->__toString()->shouldReturn(Type::BOOLEAN);
    }

    public function it_can_detect_callable()
    {
        $this->beConstructedThrough('create', ['callable']);

        $this->shouldVerifyNative(Type::CALLABLE);
        $this->__toString()->shouldReturn(Type::CALLABLE);
    }

    public function it_can_detect_countable()
    {
        $this->beConstructedThrough('create', ['countable']);

        $this->shouldVerifyNative(Type::COUNTABLE);
        $this->__toString()->shouldReturn(Type::COUNTABLE);
    }

    public function it_can_detect_double()
    {
        $this->beConstructedThrough('create', ['double']);

        $this->shouldVerifyNative(Type::DOUBLE);
        $this->__toString()->shouldReturn(Type::DOUBLE);
    }


    public function it_can_detect_integer()
    {
        $this->beConstructedThrough('create', ['integer']);

        $this->shouldVerifyNative(Type::INTEGER);
        $this->__toString()->shouldReturn(Type::INTEGER);
    }

    public function it_can_detect_int()
    {
        $this->beConstructedThrough('create', ['int']);

        $this->shouldVerifyNative(Type::INTEGER);
        $this->__toString()->shouldReturn(Type::INTEGER);
    }


    public function it_can_detect_long()
    {
        $this->beConstructedThrough('create', ['long']);

        $this->shouldVerifyNative(Type::INTEGER);
        $this->__toString()->shouldReturn(Type::INTEGER);
    }

    public function it_can_detect_iterable()
    {
        $this->beConstructedThrough('create', ['iterable']);

        $this->shouldVerifyNative(Type::ITERABLE);
        $this->__toString()->shouldReturn(Type::ITERABLE);
    }


    public function it_can_detect_null()
    {
        $this->beConstructedThrough('create', ['null']);

        $this->shouldVerifyNative(Type::NULL);
        $this->__toString()->shouldReturn(Type::NULL);
    }

    public function it_can_detect_numeric()
    {
        $this->beConstructedThrough('create', ['numeric']);

        $this->shouldVerifyNative(Type::NUMERIC);
        $this->__toString()->shouldReturn(Type::NUMERIC);
    }


    public function it_can_detect_object()
    {
        $this->beConstructedThrough('create', ['object']);

        $this->shouldVerifyNative(Type::OBJECT);
        $this->__toString()->shouldReturn(Type::OBJECT);
    }

    public function it_can_detect_resource()
    {
        $this->beConstructedThrough('create', ['resource']);

        $this->shouldVerifyNative(Type::RESOURCE);
        $this->__toString()->shouldReturn(Type::RESOURCE);
    }


    public function it_can_detect_scalar()
    {
        $this->beConstructedThrough('create', ['scalar']);

        $this->shouldVerifyNative(Type::SCALAR);
        $this->__toString()->shouldReturn(Type::SCALAR);
    }

    public function it_can_detect_string()
    {
        $this->beConstructedThrough('create', ['string']);

        $this->shouldVerifyNative(Type::STRING);
        $this->__toString()->shouldReturn(Type::STRING);
    }


    public function it_can_detect_interface()
    {
        $this->beConstructedThrough('create', [TypedListInterface::class]);

        $this->shouldVerifyInterface(ListInterface::class);
        $this->__toString()->shouldReturn(TypedListInterface::class);
    }

    public function it_can_detect_class()
    {
        $this->beConstructedThrough('create', [ItemList::class]);

        $this->shouldVerifyClass(ListInterface::class);
        $this->__toString()->shouldReturn(ItemList::class);
    }

    public function it_can_detect_trait()
    {
        $this->beConstructedThrough('create', [Accessors::class]);

        $this->shouldVerifyTrait(Accessors::class);
        $this->__toString()->shouldReturn(Accessors::class);
    }

    public function it_can_determine_if_is_the_type_of_a_value()
    {
        $this->beConstructedThrough('create', [Type::STRING]);

        $this->isTheTypeOf('cadena de texto')->shouldReturn(true);
        $this->isTheTypeOf(154564)->shouldReturn(false);
    }
}
