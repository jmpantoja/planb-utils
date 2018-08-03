<?php

namespace spec\PlanB\Utils\Type;

use PhpSpec\ObjectBehavior;
use PhpSpec\Wrapper\ObjectWrapper;
use PlanB\Utils\Type\Type;

class TypeSpec extends ObjectBehavior
{
    public function let()
    {
        $this->build();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Type::class);
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

        fclose($resource);
    }


    public function it_can_determine_if_is_null()
    {
        $this->build(null);

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
    }

    public function it_can_determine_if_is_integer()
    {
        $this->build(1232);

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

    }


    public function it_can_determine_if_is_float()
    {
        $this->build(1232.234);

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

    }

    public function it_can_determine_if_is_countable_array()
    {
        $this->build(['a' => 1, 'b' => 2]);

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

    }

    public function it_can_determine_if_is_boolean()
    {
        $this->build(true);

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

    }


    public function it_can_determine_if_is_array()
    {
        $this->build(['a' => 1, 'b' => 2]);

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

    }


    public function it_can_determine_if_is_string()
    {
        $this->build('string');

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

    }

    public function it_can_determine_if_is_an_type_of_native()
    {
        $this->build('cadena-de-texto');

        $this->isTypeOf('string')
            ->shouldReturn(true);

    }

    public function it_can_return_the_typename_on_scalar()
    {
        $this->build('cadena-de-texto');

        $this->getTypeName()
            ->shouldReturn('string');

    }

    public function it_can_return_the_typename_on_not_scalar()
    {
        $this->build(new \stdClass());

        $this->getTypeName()
            ->shouldReturn(\stdClass::class);

    }


    private function build($variable = 'cadena-de-texto'): void
    {
        $this->beConstructedThrough('create', [$variable]);
    }

}
