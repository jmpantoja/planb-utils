<?php

namespace spec\PlanB\Type;

use PlanB\Type\Exception\InvalidTypeException;
use PlanB\Type\Exception\InvalidValueTypeException;
use PlanB\Type\ItemResolver;
use PhpSpec\ObjectBehavior;
use PlanB\Type\KeyValue;
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

        $this->shouldThrow(\DomainException::class)->duringResolve($pair);
        $this->shouldThrow(InvalidValueTypeException::class)->duringResolve($pair);
    }

    public function it_accept_resolve_an_valid_classname(KeyValue $pair)
    {
        $pair->getValue()->willReturn($this);
        $this->shouldNotThrow(\Exception::class)->duringResolve($pair);
    }

    public function it_accept_resolve_an_valid_native(KeyValue $pair)
    {
        $this->beConstructedOfType('string');

        $pair->getValue()->willReturn('cadena-de-texto');

        $this->shouldNotThrow(\Exception::class)->duringResolve($pair);
    }

    public function it_can_retrieve_resolver_target_type()
    {
        $this->getType()->shouldReturn(ItemResolver::class);
    }
}
