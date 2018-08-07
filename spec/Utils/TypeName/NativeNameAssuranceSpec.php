<?php

namespace spec\PlanB\Utils\TypeName;

use PhpSpec\ObjectBehavior;
use PlanB\Utils\Assurance\Exception\AssertException;
use PlanB\Utils\TypeName\TypeNameAssurance;

class NativeNameAssuranceSpec extends ObjectBehavior
{

    public function let()
    {
        $this->beAnInstanceOf(TypeNameAssurance::class);
        $this->beConstructedThrough('create', ['string']);
    }


    public function it_can_show_if_typename_is_a_native()
    {
        $this->isNativeTypeName()
            ->shouldReturn($this);
    }

    public function it_can_show_if_typename_is_a_class_or_interfacename()
    {
        $this->shouldThrow(AssertException::class)->duringIsClassOrInterfaceName();
    }

    public function it_can_show_if_typename_is_valid()
    {
        $this->isValid()
            ->shouldReturn($this);
    }


    public function it_can_show_if_typename_is_not_valid()
    {
        $this->beConstructedThrough('create', ['xxxx']);

        $this->shouldThrow(AssertException::class)->duringIsValid();
    }


    public function it_can_convert_to_string()
    {
        $this->__toString()
            ->shouldReturn('string');
    }
}
