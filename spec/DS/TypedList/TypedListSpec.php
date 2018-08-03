<?php

namespace spec\PlanB\DS\TypedList;

use PhpSpec\ObjectBehavior;
use PlanB\DS\TypedList\TypedList;
use PlanB\Utils\Assurance\Exception\FailAssuranceException;

class TypedListSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('create', ['string']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TypedList::class);
    }

    public function it_is_not_initializable_with_invalid_type()
    {
        $this->beConstructedThrough('create', ['xxxx']);
        $this->shouldThrow(FailAssuranceException::class)->duringInstantiation();

    }

    public function it_can_retrieve_the_inner_type()
    {
        $this->getInnerType()->shouldReturn('string');
    }

    public function it_can_add_valid_type_item()
    {
        $this->add('cadena de texto');

        $this->count()->shouldReturn(1);
    }

    public function it_cannt_add_valid_type_item()
    {
        $this->shouldThrow(\Exception::class)->duringAdd(123);
    }

}
