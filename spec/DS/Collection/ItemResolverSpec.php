<?php

namespace spec\PlanB\DS\Collection;

use PhpSpec\ObjectBehavior;
use PlanB\DS\ArrayList\KeyValue;
use PlanB\DS\Collection\Exception\InvalidTypeException;
use PlanB\DS\Collection\Exception\InvalidValueTypeException;
use PlanB\DS\Collection\ItemResolver;
use Prophecy\Argument as p;
use spec\PlanB\DS\ArrayList\Stub\ShortStringArrayList;

class ItemResolverSpec extends ObjectBehavior
{
    private const NORMALIZED_VALUE = 'cadena-transformada';
    private const SOME_DUMMY_TEXT = 'cadena-de-texto';

    public function let()
    {
        $this->beConstructedWithType(ItemResolver::class);
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
        $this->getType()->shouldReturn(ItemResolver::class);
    }


    public function it_can_configure_for_ignoring_an_invalid_value(ShortStringArrayList $collection)
    {

        $this->beConstructedWithType('string');
        $pair = KeyValue::fromValue(self::SOME_DUMMY_TEXT);
        $this->prepareForConfigure($collection);

        $collection->validate(p::any(), p::any())
            ->willReturn(false);

        $this->configure($collection);
        $this->resolve($pair)->shouldReturn(null);
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
