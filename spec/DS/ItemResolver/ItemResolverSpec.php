<?php

namespace spec\PlanB\DS\ItemResolver;

use PhpSpec\ObjectBehavior;
use PlanB\DS\ArrayList\ArrayList;
use PlanB\DS\ItemResolver\Exception\InvalidTypeException;
use PlanB\DS\ItemResolver\Exception\InvalidValueTypeException;
use PlanB\DS\ItemResolver\Hook;
use PlanB\DS\ItemResolver\ItemResolver;
use PlanB\DS\KeyValue;
use Prophecy\Argument as p;
use spec\PlanB\DS\Stub\StubList;


class ItemResolverSpec extends ObjectBehavior
{

    private const NORMALIZED_DUMMY_TEXT = 'cadena-de-texto';
    private const DUMMY_TEXT = 'CAdeNA de TExTo';
    private const NORMALIZED_KEY = 'key-transformada';
//
//    private const LONG_DUMMY_TEXT = 'cadena-de-texto';
//
//    private const SHORT_DUMMY_TEXT = 'short';

    public function let()
    {
        $this->beConstructedCreate();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ItemResolver::class);
    }

    public function it_throw_an_exception_when_initialze_with_an_invalid_type()
    {
        $this->beConstructedWithType('invalid type');

        $this->shouldThrow(\DomainException::class)->duringInstantiation();
        $this->shouldThrow(InvalidTypeException::class)->duringInstantiation();
    }

    public function it_refuse_resolve_an_invalid_value()
    {
        $this->beConstructedWithType(ItemResolver::class);
        $pair = KeyValue::fromValue('invalid value, expects a ItemResolver::class');

        $this->shouldThrow(\DomainException::class)->duringResolve($pair);
        $this->shouldThrow(InvalidValueTypeException::class)->duringResolve($pair);
    }

    public function it_accept_resolve_an_valid_classname()
    {
        $pair = KeyValue::fromValue($this->getWrappedObject());

        $this->shouldNotThrow(\Exception::class)->duringResolve($pair);
    }

    public function it_accept_resolve_an_valid_native()
    {
        $this->beConstructedWithType('string');
        $pair = KeyValue::fromValue(self::DUMMY_TEXT);

        $this->shouldNotThrow(\Exception::class)->duringResolve($pair);
    }

    public function it_can_retrieve_resolver_target_type()
    {
        $this->beConstructedWithType(ItemResolver::class);
        $this->getType()->shouldReturn(ItemResolver::class);
    }


    //Configurar desde un collection

    public function it_can_configure_for_accept_a_valid_value()
    {
        $pair = KeyValue::fromValue(self::DUMMY_TEXT);

        $this->setValidator(function () {
            return true;
        });

        $this->resolve($pair)->shouldHaveType(KeyValue::class);
    }

    public function it_can_configure_for_ignoring_an_invalid_value()
    {
        $pair = KeyValue::fromValue(self::DUMMY_TEXT);

        $this->setValidator(function () {
            return false;
        });

        $this->resolve($pair)->shouldBeNull();
    }

    public function it_can_configure_for_refuse_an_invalid_value()
    {
        $pair = KeyValue::fromValue(self::DUMMY_TEXT);

        $this->setValidator(function () {
            throw new \InvalidArgumentException();
            return false;
        });

        $this->shouldThrow(\InvalidArgumentException::class)
            ->duringResolve($pair);
    }


    public function it_can_configure_for_trasnsform_the_value()
    {
        $pair = KeyValue::fromValue(self::DUMMY_TEXT);

        $this->setNormalizer(function (string $value) {
            return snakeCase(strtolower($value), '-');
        });

        $this->resolve($pair)->shouldHaveType(KeyValue::class);
        $this->resolve($pair)->getValue()->shouldReturn(self::NORMALIZED_DUMMY_TEXT);

    }

    public function it_can_configure_for_trasnsform_the_key()
    {
        $pair = KeyValue::fromValue(self::DUMMY_TEXT);

        $this->setKeyNormalizer(function (string $value) {
            return self::NORMALIZED_KEY;
        });

        $this->resolve($pair)->shouldHaveType(KeyValue::class);
        $this->resolve($pair)->getKey()->shouldReturn(self::NORMALIZED_KEY);

    }

//
//    public function it_can_configure_from_an_array_list()
//    {
//        $pair = KeyValue::fromValue(self::DUMMY_TEXT);
//
//        $list = ArrayList::blank()
//            ->setValidator(function () {
//                return true;
//            })
//            ->setNormalizer(function (string $value) {
//                return snakeCase(strtolower($value), '-');
//            })
//            ->setKeyNormalizer(function () {
//                return self::NORMALIZED_KEY;
//            });
//
//        $this->configure($list);
//
//        $this->resolve($pair)->shouldHaveType(KeyValue::class);
//
//
//        $this->resolve($pair)->getValue()->shouldReturn(self::NORMALIZED_DUMMY_TEXT);
//        $this->resolve($pair)->getKey()->shouldReturn(self::NORMALIZED_KEY);
//
//    }

}
