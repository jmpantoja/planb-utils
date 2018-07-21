<?php

namespace spec\PlanB\DS\ItemResolver;

use PhpSpec\ObjectBehavior;
use PlanB\DS\ArrayList\ArrayList;
use PlanB\DS\ItemResolver\Exception\InvalidTypeException;
use PlanB\DS\ItemResolver\Exception\InvalidValueTypeException;
use PlanB\DS\ItemResolver\ItemResolver;
use PlanB\DS\KeyValue;
use Prophecy\Argument as p;
use spec\PlanB\DS\ItemResolver\Stub\ShortStringArrayList;


class ItemResolverSpec extends ObjectBehavior
{

    private const NORMALIZED_VALUE = 'cadena-transformada';

    private const NORMALIZED_KEY = 'key-transformada';

    private const SOME_DUMMY_TEXT = 'cadena-de-texto';

    public function let()
    {
        $this->beConstructedCreate();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ItemResolver::class);
    }

    public function it_can_configure_for_default_behaviour()
    {
        $collection = new ArrayList('string');

        $pair = KeyValue::fromValue(self::SOME_DUMMY_TEXT);

        $this->configure($collection);
        $this->resolve($pair)->getValue()->shouldReturn(self::SOME_DUMMY_TEXT);
    }


    public function it_can_configure_for_accept_a_valid_value(ShortStringArrayList $collection)
    {

        $pair = KeyValue::fromValue(self::SOME_DUMMY_TEXT);
        $this->prepareForConfigure($collection);

        $collection->validate(p::any(), p::any())
            ->willReturn(true);

        $this->configure($collection);
        $this->resolve($pair)->shouldHaveType(KeyValue::class);
    }

    public function it_can_configure_for_ignoring_an_invalid_value(ShortStringArrayList $collection)
    {

        $pair = KeyValue::fromValue(self::SOME_DUMMY_TEXT);
        $this->prepareForConfigure($collection);

        $collection->validate(p::any(), p::any())
            ->willReturn(false);

        $this->configure($collection);
        $this->resolve($pair)->shouldReturn(null);
    }


    public function it_can_configure_for_refuse_an_invalid_value(ShortStringArrayList $collection)
    {
        $pair = KeyValue::fromValue(self::SOME_DUMMY_TEXT);
        $this->prepareForConfigure($collection);

        $collection->validate(p::any(), p::any())
            ->willThrow(\DomainException::class);

        $this->configure($collection);
        $this->shouldThrow(\DomainException::class)
            ->duringResolve($pair);

    }


    public function it_can_configure_for_trasnsform_the_value(ShortStringArrayList $collection)
    {
        $pair = KeyValue::fromValue(10);
        $this->prepareForConfigure($collection);

        $this->configure($collection);
        $this->resolve($pair)->shouldHaveType(KeyValue::class);
        $this->resolve($pair)->getValue()->shouldReturn(self::NORMALIZED_VALUE);

    }

    public function it_can_configure_for_trasnsform_the_key(ShortStringArrayList $collection)
    {
        $pair = KeyValue::fromPair('key', 10);
        $this->prepareForConfigure($collection);

        $collection->normalizeKey(p::any(), p::any())
            ->willReturn(self::NORMALIZED_KEY);

        $this->configure($collection);
        $this->resolve($pair)->shouldHaveType(KeyValue::class);
        $this->resolve($pair)->getKey()->shouldReturn(self::NORMALIZED_KEY);

    }

    public function it_can_configure_custom_hooks()
    {
        $pair = KeyValue::fromPair('key', 10);

        $this->setValidator(function () {
            return true;
        });

        $this->setNormalizer(function () {
            return self::NORMALIZED_VALUE;
        });

        $this->setKeyNormalizer(function () {
            return self::NORMALIZED_KEY;
        });

        $this->resolve($pair)->shouldHaveType(KeyValue::class);
        $this->resolve($pair)->getValue()->shouldReturn(self::NORMALIZED_VALUE);
        $this->resolve($pair)->getKey()->shouldReturn(self::NORMALIZED_KEY);
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
        $pair = KeyValue::fromValue(self::SOME_DUMMY_TEXT);

        $this->shouldNotThrow(\Exception::class)->duringResolve($pair);
    }

    public function it_can_retrieve_resolver_target_type()
    {
        $this->beConstructedWithType(ItemResolver::class);
        $this->getType()->shouldReturn(ItemResolver::class);
    }

    /**
     * @param ShortStringArrayList $collection
     */
    private function prepareForConfigure(ShortStringArrayList $collection): void
    {

        $collection->validate(p::any(), p::any())
            ->willReturn(true);

        $collection->normalize(p::any(), p::any())
            ->willReturn(self::NORMALIZED_VALUE);

        $collection->normalizeKey(p::any(), p::any())
            ->willReturn(null);
    }

}
