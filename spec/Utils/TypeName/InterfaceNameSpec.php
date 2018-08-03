<?php

namespace spec\PlanB\Utils\TypeName;

use PhpSpec\Wrapper\ObjectWrapper;
use PlanB\Utils\TypeName\TypeName;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InterfaceNameSpec extends ObjectBehavior
{
    const TARGETNAME = \ArrayAccess::class;

    public function let()
    {
        $this->beAnInstanceOf(TypeName::class);
        $this->beConstructedThrough('create', [self::TARGETNAME]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TypeName::class);
    }

    public function it_can_show_if_typename_is_the_same_class_of_itself()
    {
        $this->isSameOf(self::TARGETNAME)
            ->shouldReturn(true);
    }


    public function it_can_show_if_typename_is_not_the_same_class_of_another()
    {
        $this->isSameOf(ObjectBehavior::class)
            ->shouldReturn(false);
    }

    public function it_can_show_if_typename_is_a_subclass_of_parent()
    {
        $this->isChildOf(ObjectBehavior::class)
            ->shouldReturn(false);
    }

    public function it_can_show_if_typename_is_a_subclass_or_sameclass_of_parent()
    {
        $this->isClassOf(self::class)
            ->shouldReturn(false);
    }

    public function it_can_show_if_typename_is_a_subclass_or_sameclass_of_itself()
    {
        $this->isClassOf(self::TARGETNAME)
            ->shouldReturn(true);
    }

    public function it_can_show_if_typename_is_a_classname()
    {
        $this->isClassName()
            ->shouldReturn(false);
    }

    public function it_can_show_if_typename_is_a_class_or_interfacename()
    {
        $this->isClassOrInterfaceName()
            ->shouldReturn(true);
    }

    public function it_can_show_if_typename_is_a_interfacename()
    {
        $this->isInterfaceName()
            ->shouldReturn(true);
    }

    public function it_can_show_if_typename_is_a_traitname()
    {
        $this->isTraitName()
            ->shouldReturn(false);
    }

    public function it_can_show_if_typename_is_a_native()
    {
        $this->isNativeTypeName()
            ->shouldReturn(false);
    }

    public function it_can_show_if_typename_is_valid()
    {
        $this->isValid()
            ->shouldReturn(true);
    }
}
