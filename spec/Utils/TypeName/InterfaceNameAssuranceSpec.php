<?php

namespace spec\PlanB\Utils\TypeName;

use PhpSpec\ObjectBehavior;
use PlanB\Utils\Assurance\Exception\FailAssuranceException;
use PlanB\Utils\TypeName\TypeNameAssurance;

class InterfaceNameAssuranceSpec extends ObjectBehavior
{
    const TARGETNAME = \ArrayAccess::class;

    public function let()
    {
        $this->beAnInstanceOf(TypeNameAssurance::class);
        $this->beConstructedThrough('create', [self::TARGETNAME]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TypeNameAssurance::class);
    }

    public function it_can_show_if_typename_is_the_same_class_of_itself()
    {
        $this->isSameOf(self::TARGETNAME)
            ->shouldReturn($this);
    }


    public function it_can_show_if_typename_is_not_the_same_class_of_another()
    {
        $this->shouldThrow(FailAssuranceException::class)->duringIsSameOf(ObjectBehavior::class);
    }

    public function it_can_show_if_typename_is_a_subclass_of_parent()
    {
        $this->shouldThrow(FailAssuranceException::class)->duringIsChildOf(ObjectBehavior::class);
    }

    public function it_can_show_if_typename_is_a_subclass_or_sameclass_of_parent()
    {
        $this->shouldThrow(FailAssuranceException::class)->duringIsClassOf(ObjectBehavior::class);
    }

    public function it_can_show_if_typename_is_a_subclass_or_sameclass_of_itself()
    {
        $this->isClassOf(self::TARGETNAME)
            ->shouldReturn($this);
    }

    public function it_can_show_if_typename_is_a_classname()
    {
        $this->shouldThrow(FailAssuranceException::class)->duringIsClassName();
    }

    public function it_can_show_if_typename_is_a_class_or_interfacename()
    {
        $this->isClassOrInterfaceName()
            ->shouldReturn($this);
    }

    public function it_can_show_if_typename_is_a_interfacename()
    {
        $this->isInterfaceName()
            ->shouldReturn($this);
    }

    public function it_can_show_if_typename_is_a_traitname()
    {
        $this->shouldThrow(FailAssuranceException::class)->duringIsTraitName();
    }

    public function it_can_show_if_typename_is_a_native()
    {
        $this->shouldThrow(FailAssuranceException::class)->duringIsNativeTypeName();
    }

    public function it_can_show_if_typename_is_valid()
    {
        $this->isValid()
            ->shouldReturn($this);
    }
}
