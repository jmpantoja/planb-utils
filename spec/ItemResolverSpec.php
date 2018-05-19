<?php

namespace spec\PlanB\Type;

use PlanB\Type\ItemResolver;
use PhpSpec\ObjectBehavior;
use PlanB\Type\KeyValue;
use Prophecy\Argument;

class ItemResolverSpec extends ObjectBehavior
{

    public function let()
    {
        $this->beConstructedOfType(__CLASS__);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ItemResolver::class);
    }

    public function it_throw_an_exception_when_initialze_with_an_invalid_type()
    {
        $this->beConstructedOfType('invalid type');
        $this->shouldThrow(\DomainException::class)->duringInstantiation();
    }
    
}
