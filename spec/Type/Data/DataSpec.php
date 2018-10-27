<?php

namespace spec\PlanB\Type\Data;

use PhpSpec\ObjectBehavior;
use PhpSpec\Wrapper\ObjectWrapper;
use PlanB\Type\DataType\Type;
use PlanB\Type\Data\Data;
use PlanB\Type\DataType\DataType;
use PlanB\Type\Number\Number;
use PlanB\Type\Text\Text;

class DataSpec extends ObjectBehavior
{
    private const NULL = null;

    private const INTEGER = 1232;

    private const FLOAT = 1232.234;

    private const ARRAY = ['a' => 1, 'b' => 2];

    private const BOOL = true;

    private const STRING = Type::STRING;

    private const TEXT = 'cadena-de-texto';

    private const FAKE_TYPE = 'fake-type';

    private const INTEGER_TO_TEXT = '[integer: 1232]';

    private const STRING_TO_TEXT = '[string: "cadena-de-texto"]';

    public function let()
    {
        $this->build();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Data::class);
    }

    public function it_can_determine_if_is_resource()
    {
        $resource = fopen(__FILE__, 'ro');
        $this->build($resource);

        $this->isArray()
            ->shouldReturn(false);

        $this->isBoolean()
            ->shouldReturn(false);

        $this->isCallable()
            ->shouldReturn(false);

        $this->isCountable()
            ->shouldReturn(false);

        $this->isFloat()
            ->shouldReturn(false);

        $this->isInteger()
            ->shouldReturn(false);

        $this->isIterable()
            ->shouldReturn(false);

        $this->isNull()
            ->shouldReturn(false);

        $this->isNumeric()
            ->shouldReturn(false);

        $this->isObject()
            ->shouldReturn(false);

        $this->isResource()
            ->shouldReturn(true);

        $this->isScalar()
            ->shouldReturn(false);

        $this->isString()
            ->shouldReturn(false);


        $this->isInstanceOf(\Exception::class)
            ->shouldReturn(false);

        $this->isThrowable()
            ->shouldReturn(false);

        fclose($resource);
    }


    public function it_can_determine_if_is_null()
    {
        $this->build(self::NULL);

        $this->isArray()
            ->shouldReturn(false);

        $this->isBoolean()
            ->shouldReturn(false);

        $this->isCallable()
            ->shouldReturn(false);

        $this->isCountable()
            ->shouldReturn(false);

        $this->isFloat()
            ->shouldReturn(false);

        $this->isInteger()
            ->shouldReturn(false);

        $this->isIterable()
            ->shouldReturn(false);

        $this->isNull()
            ->shouldReturn(true);

        $this->isNumeric()
            ->shouldReturn(false);

        $this->isObject()
            ->shouldReturn(false);

        $this->isResource()
            ->shouldReturn(false);

        $this->isScalar()
            ->shouldReturn(false);

        $this->isString()
            ->shouldReturn(false);


        $this->isInstanceOf(\Exception::class)
            ->shouldReturn(false);

        $this->isThrowable()
            ->shouldReturn(false);
    }

    public function it_can_determine_if_is_integer()
    {
        $this->build(self::INTEGER);

        $this->isArray()
            ->shouldReturn(false);

        $this->isBoolean()
            ->shouldReturn(false);

        $this->isCallable()
            ->shouldReturn(false);

        $this->isCountable()
            ->shouldReturn(false);

        $this->isFloat()
            ->shouldReturn(false);

        $this->isInteger()
            ->shouldReturn(true);

        $this->isIterable()
            ->shouldReturn(false);

        $this->isNull()
            ->shouldReturn(false);

        $this->isNumeric()
            ->shouldReturn(true);

        $this->isObject()
            ->shouldReturn(false);

        $this->isResource()
            ->shouldReturn(false);

        $this->isScalar()
            ->shouldReturn(true);

        $this->isString()
            ->shouldReturn(false);


        $this->isInstanceOf(\Exception::class)
            ->shouldReturn(false);

        $this->isThrowable()
            ->shouldReturn(false);
    }


    public function it_can_determine_if_is_float()
    {
        $this->build(self::FLOAT);

        $this->isArray()
            ->shouldReturn(false);

        $this->isBoolean()
            ->shouldReturn(false);

        $this->isCallable()
            ->shouldReturn(false);

        $this->isCountable()
            ->shouldReturn(false);

        $this->isFloat()
            ->shouldReturn(true);

        $this->isInteger()
            ->shouldReturn(false);

        $this->isIterable()
            ->shouldReturn(false);

        $this->isNull()
            ->shouldReturn(false);

        $this->isNumeric()
            ->shouldReturn(true);

        $this->isObject()
            ->shouldReturn(false);

        $this->isResource()
            ->shouldReturn(false);

        $this->isScalar()
            ->shouldReturn(true);

        $this->isString()
            ->shouldReturn(false);


        $this->isInstanceOf(\Exception::class)
            ->shouldReturn(false);

        $this->isThrowable()
            ->shouldReturn(false);

    }


    public function it_can_determine_if_is_countable_object()
    {
        $this->build(new class implements \Countable
        {
            public function count()
            {
                return 0;
            }
        });

        $this->isArray()
            ->shouldReturn(false);

        $this->isBoolean()
            ->shouldReturn(false);

        $this->isCallable()
            ->shouldReturn(false);

        $this->isCountable()
            ->shouldReturn(true);

        $this->isFloat()
            ->shouldReturn(false);

        $this->isInteger()
            ->shouldReturn(false);

        $this->isIterable()
            ->shouldReturn(false);

        $this->isNull()
            ->shouldReturn(false);

        $this->isNumeric()
            ->shouldReturn(false);

        $this->isObject()
            ->shouldReturn(true);

        $this->isResource()
            ->shouldReturn(false);

        $this->isScalar()
            ->shouldReturn(false);

        $this->isString()
            ->shouldReturn(false);


        $this->isInstanceOf(\Exception::class)
            ->shouldReturn(false);


        $this->isThrowable()
            ->shouldReturn(false);
    }

    public function it_can_determine_if_is_countable_array()
    {
        $this->build(self::ARRAY);

        $this->isArray()
            ->shouldReturn(true);

        $this->isBoolean()
            ->shouldReturn(false);

        $this->isCallable()
            ->shouldReturn(false);

        $this->isCountable()
            ->shouldReturn(true);

        $this->isFloat()
            ->shouldReturn(false);

        $this->isInteger()
            ->shouldReturn(false);

        $this->isIterable()
            ->shouldReturn(true);

        $this->isNull()
            ->shouldReturn(false);

        $this->isNumeric()
            ->shouldReturn(false);

        $this->isObject()
            ->shouldReturn(false);

        $this->isResource()
            ->shouldReturn(false);

        $this->isScalar()
            ->shouldReturn(false);

        $this->isString()
            ->shouldReturn(false);


        $this->isInstanceOf(\Exception::class)
            ->shouldReturn(false);

        $this->isThrowable()
            ->shouldReturn(false);
    }


    public function it_can_determine_if_is_callable()
    {
        $this->build(function () {

        });

        $this->isArray()
            ->shouldReturn(false);

        $this->isBoolean()
            ->shouldReturn(false);

        $this->isCallable()
            ->shouldReturn(true);

        $this->isCountable()
            ->shouldReturn(false);

        $this->isFloat()
            ->shouldReturn(false);

        $this->isInteger()
            ->shouldReturn(false);

        $this->isIterable()
            ->shouldReturn(false);

        $this->isNull()
            ->shouldReturn(false);

        $this->isNumeric()
            ->shouldReturn(false);

        $this->isObject()
            ->shouldReturn(true);

        $this->isResource()
            ->shouldReturn(false);

        $this->isScalar()
            ->shouldReturn(false);

        $this->isString()
            ->shouldReturn(false);

        $this->isInstanceOf(\Exception::class)
            ->shouldReturn(false);

        $this->isThrowable()
            ->shouldReturn(false);
    }

    public function it_can_determine_if_is_boolean()
    {
        $this->build(self::BOOL);

        $this->isArray()
            ->shouldReturn(false);

        $this->isBoolean()
            ->shouldReturn(true);

        $this->isCallable()
            ->shouldReturn(false);

        $this->isCountable()
            ->shouldReturn(false);

        $this->isFloat()
            ->shouldReturn(false);

        $this->isInteger()
            ->shouldReturn(false);

        $this->isIterable()
            ->shouldReturn(false);

        $this->isNull()
            ->shouldReturn(false);

        $this->isNumeric()
            ->shouldReturn(false);

        $this->isObject()
            ->shouldReturn(false);

        $this->isResource()
            ->shouldReturn(false);

        $this->isScalar()
            ->shouldReturn(true);

        $this->isString()
            ->shouldReturn(false);


        $this->isInstanceOf(\Exception::class)
            ->shouldReturn(false);

        $this->isThrowable()
            ->shouldReturn(false);

    }


    public function it_can_determine_if_is_array()
    {
        $this->build(self::ARRAY);

        $this->isArray()
            ->shouldReturn(true);

        $this->isBoolean()
            ->shouldReturn(false);

        $this->isCallable()
            ->shouldReturn(false);

        $this->isCountable()
            ->shouldReturn(true);

        $this->isFloat()
            ->shouldReturn(false);

        $this->isInteger()
            ->shouldReturn(false);

        $this->isIterable()
            ->shouldReturn(true);

        $this->isNull()
            ->shouldReturn(false);

        $this->isNumeric()
            ->shouldReturn(false);

        $this->isObject()
            ->shouldReturn(false);

        $this->isResource()
            ->shouldReturn(false);

        $this->isScalar()
            ->shouldReturn(false);

        $this->isString()
            ->shouldReturn(false);


        $this->isInstanceOf(\Exception::class)
            ->shouldReturn(false);

        $this->isThrowable()
            ->shouldReturn(false);
    }


    public function it_can_determine_if_is_string()
    {
        $this->build(self::STRING);

        $this->isArray()
            ->shouldReturn(false);

        $this->isBoolean()
            ->shouldReturn(false);

        $this->isCallable()
            ->shouldReturn(false);

        $this->isCountable()
            ->shouldReturn(false);

        $this->isFloat()
            ->shouldReturn(false);

        $this->isInteger()
            ->shouldReturn(false);

        $this->isIterable()
            ->shouldReturn(false);

        $this->isNull()
            ->shouldReturn(false);

        $this->isNumeric()
            ->shouldReturn(false);

        $this->isObject()
            ->shouldReturn(false);

        $this->isResource()
            ->shouldReturn(false);

        $this->isScalar()
            ->shouldReturn(true);

        $this->isString()
            ->shouldReturn(true);


        $this->isInstanceOf(\Exception::class)
            ->shouldReturn(false);

        $this->isThrowable()
            ->shouldReturn(false);
    }

    public function it_can_determine_if_is_an_instance_of_another_class_or_interface()
    {
        $this->build(new \RuntimeException());

        $this->isInstanceOf(\Exception::class)
            ->shouldReturn(true);
    }

    public function it_can_determine_if_is_an_type_of_a_class()
    {
        $this->build(new \RuntimeException());

        $this->isTypeOf(\Exception::class, ObjectWrapper::class)
            ->shouldReturn(true);

        $this->isTypeOf(Type::SCALAR)
            ->shouldReturn(false);

        $this->isTypeOf(Type::CALLABLE)
            ->shouldReturn(false);


    }

    public function it_can_determine_if_is_an_type_of_native()
    {
        $this->build(self::TEXT);

        $this->isTypeOf(Type::STRING)
            ->shouldReturn(true);

        $this->isTypeOf(Type::SCALAR)
            ->shouldReturn(true);


    }

    public function it_can_determine_if_is_throwable(\Throwable $object)
    {

        $this->build($object);

        $this->isThrowable()
            ->shouldReturn(true);

        $this->isTypeOf(Type::STRING, Type::THROWABLE, Type::INTEGER)
            ->shouldReturn(true);
    }

    public function it_can_determine_if_is_countable(\Countable $object)
    {

        $this->build($object);

        $this->isTypeOf(Type::STRING, Type::COUNTABLE, Type::INTEGER)
            ->shouldReturn(true);
    }


    public function it_can_determine_if_is_iterable(\ArrayIterator $object)
    {

        $this->build($object);

        $this->isTypeOf(Type::COUNTABLE)
            ->shouldReturn(true);

        $this->isTypeOf(Type::ITERABLE)
            ->shouldReturn(true);

        $this->isTypeOf(Type::SCALAR)
            ->shouldReturn(false);


        $this->isTypeOf(Type::CALLABLE)
            ->shouldReturn(false);

        $this->isTypeOf(self::FAKE_TYPE)
            ->shouldReturn(false);
    }

    public function it_can_determine_if_is_typeof_callable()
    {

        $this->build(function () {
        });

        $this->isTypeOf(Type::COUNTABLE)
            ->shouldReturn(false);

        $this->isTypeOf(Type::ITERABLE)
            ->shouldReturn(false);

        $this->isTypeOf(Type::SCALAR)
            ->shouldReturn(false);

        $this->isTypeOf(Type::CALLABLE)
            ->shouldReturn(true);
    }


    public function it_can_return_the_typename_on_scalar()
    {
        $this->build(self::TEXT);

        $this->getType()
            ->shouldHaveType(DataType::class);

        $this->getType()
            ->stringify()
            ->shouldReturn(Type::STRING);

    }

    public function it_can_return_the_typename_on_not_scalar()
    {
        $this->build(new \stdClass());

        $this->getType()
            ->shouldHaveType(DataType::class);

        $this->getType()
            ->stringify()
            ->shouldReturn(\stdClass::class);

    }

    public function it_can_determine_if_value_is_convertible_to_string()
    {
        $this->build();

        $this->isConvertibleToString()
            ->shouldReturn(true);

    }

    public function it_can_determine_if_value_is_not_convertible_to_string()
    {
        $this->build(new \stdClass());

        $this->isConvertibleToString()
            ->shouldReturn(false);

    }

    public function it_can_determine_that_a_null_value_is_convertible_to_string()
    {
        $this->build(null);

        $this->isConvertibleToString()
            ->shouldReturn(true);

    }


    public function it_can_determine_that_a_number_is_convertible_to_string()
    {
        $this->build(self::INTEGER);

        $this->isConvertibleToString()
            ->shouldReturn(true);

    }


    public function it_retrieve_the_type_of_the_data()
    {

        $this->build(new \Exception());

        $this->getType()->shouldBeLike(DataType::make(\Exception::class));
        $this->getTypeName()->shouldBeLike(\Exception::class);
    }

    public function it_retrieve_a_stringifable_data_as_string()
    {

        $this->build(Text::make('hola'));

        $this->stringify()->shouldReturn('hola');
    }

    public function it_retrieve_a_hashable_data_as_string()
    {
        $this->build(Number::make(15674));
        $this->stringify()->shouldReturn("15674");
    }


    public function it_retrieve_a_object_data_as_string()
    {
        $this->build(new \stdClass());
        $this->stringify()->shouldReturn(\stdClass::class);
    }


    private function build($variable = self::TEXT): void
    {
        $this->beConstructedThrough('make', [$variable]);
    }

}
