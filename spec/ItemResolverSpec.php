<?php

namespace spec\PlanB\Type;

use PlanB\Type\Collection;
use PlanB\Type\ShortStringCollection;
use PlanB\Type\Exception\InvalidTypeException;
use PlanB\Type\Exception\InvalidValueTypeException;
use PlanB\Type\ItemResolver;
use PhpSpec\ObjectBehavior;
use PlanB\Type\KeyValue;
use PlanB\Type\Validable;
use Prophecy\Argument;

class ItemResolverSpec extends ObjectBehavior
{

    public function let()
    {
        $this->beConstructedOfType(ItemResolver::class);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ItemResolver::class);
    }

    public function it_throw_an_exception_when_initialze_with_an_invalid_type()
    {
        $this->beConstructedOfType('invalid type');
        $this->shouldThrow(\DomainException::class)->duringInstantiation();
        $this->shouldThrow(InvalidTypeException::class)->duringInstantiation();
    }

    public function it_refuse_resolve_an_invalid_value(KeyValue $pair)
    {

        $pair->getValue()->willReturn('invalid-value');
        $pair->getKey()->willReturn(null);

        $this->shouldThrow(\DomainException::class)->duringResolve($pair);
        $this->shouldThrow(InvalidValueTypeException::class)->duringResolve($pair);
    }

    public function it_accept_resolve_an_valid_classname(KeyValue $pair)
    {

        $pair->getValue()->willReturn($this);
        $pair->getKey()->willReturn(null);

        $this->shouldNotThrow(\Exception::class)->duringResolve($pair);
    }

    public function it_accept_resolve_an_valid_native(KeyValue $pair)
    {
        $this->beConstructedOfType('string');

        $pair->getValue()->willReturn('cadena-de-texto');
        $pair->getKey()->willReturn(null);

        $this->shouldNotThrow(\Exception::class)->duringResolve($pair);
    }

    public function it_can_retrieve_resolver_target_type()
    {
        $this->getType()->shouldReturn(ItemResolver::class);
    }


    public function it_can_configure_for_accept_a_valid_value(ShortStringCollection $collection)
    {
        $pair = KeyValue::fromValue('este valor no se llega a evaluar');
        $this->beConstructedOfType('string');

        $collection->validate(Argument::any(), Argument::any())
            ->willReturn(true);

        $collection->normalize(Argument::any(), Argument::any())
            ->willReturn('este valor no se llega a evaluar');

        $collection->normalizeKey(Argument::any(), Argument::any())
            ->willReturn(null);

        $this->configure($collection);
        $this->shouldNotThrow(\DomainException::class)
            ->duringResolve($pair);

        $this->resolve($pair)->shouldHaveType(KeyValue::class);
    }

    public function it_can_configure_for_ignoring_an_invalid_value(ShortStringCollection $collection)
    {
        $pair = KeyValue::fromValue('este valor no se llega a evaluar');
        $this->beConstructedOfType('string');

        $collection->validate(Argument::any(), Argument::any())
            ->willReturn(false);

        $collection->normalize(Argument::any(), Argument::any())
            ->willReturn('este valor no se llega a evaluar');


        $collection->normalizeKey(Argument::any(), Argument::any())
            ->willReturn(null);


        $this->configure($collection);
        $this->shouldNotThrow(\DomainException::class)
            ->duringResolve($pair);

        $this->resolve($pair)->shouldReturn(null);
    }


    public function it_can_configure_for_refuse_an_invalid_value(ShortStringCollection $collection)
    {
        $pair = KeyValue::fromValue('este valor no se llega a evaluar');
        $this->beConstructedOfType('string');

        $collection->validate(Argument::any(), Argument::any())
            ->willThrow(\DomainException::class);

        $collection->normalize(Argument::any(), Argument::any())
            ->willReturn('este valor no se llega a evaluar');


        $collection->normalizeKey(Argument::any(), Argument::any())
            ->willReturn(null);

        $this->shouldNotThrow(\Exception::class)
            ->duringResolve($pair);


        $this->configure($collection);
        $this->shouldThrow(\DomainException::class)
            ->duringResolve($pair);

    }


    public function it_can_configure_for_trasnsform_a_value_before_append(ShortStringCollection $collection)
    {
        $pair = KeyValue::fromValue(10);
        $this->beConstructedOfType('string');

        $collection->validate(Argument::any(), Argument::any())
            ->willReturn(true);

        $collection->normalize(Argument::any(), Argument::any())
            ->willReturn('cadena transformada');

        $collection->normalizeKey(Argument::any(), Argument::any())
            ->willReturn(null);


        $this->configure($collection);
        $this->resolve($pair)->shouldHaveType(KeyValue::class);
        $this->resolve($pair)->getValue()->shouldReturn('cadena transformada');

    }

    public function it_can_configure_for_trasnsform_a_value_key_before_append(ShortStringCollection $collection)
    {
        $pair = KeyValue::fromPair('key', 10);
        $this->beConstructedOfType('string');

        $collection->validate(Argument::any(), Argument::any())
            ->willReturn(true);

        $collection->normalize(Argument::any(), Argument::any())
            ->willReturn('cadena transformada');

        $collection->normalizeKey(Argument::any(), Argument::any())
            ->willReturn('key');


        $this->configure($collection);
        $this->resolve($pair)->shouldHaveType(KeyValue::class);
        $this->resolve($pair)->getValue()->shouldReturn('cadena transformada');
        $this->resolve($pair)->getKey()->shouldReturn('key');

    }

    public function it_can_configure_for_trasnsform_a_key_before_append(ShortStringCollection $collection)
    {
        $pair = KeyValue::fromPair('key', 'value');
        $this->beConstructedOfType('string');

        $collection->validate(Argument::any(), Argument::any())
            ->willReturn(true);

        $collection->normalize(Argument::any(), Argument::any())
            ->willReturn('value');

        $collection->normalizeKey(Argument::any(), Argument::any())
            ->willReturn('key transformada');


        $this->configure($collection);
        $this->resolve($pair)->shouldHaveType(KeyValue::class);
        $this->resolve($pair)->getValue()->shouldReturn('value');
        $this->resolve($pair)->getKey()->shouldReturn('key transformada');

    }
}
