<?php

namespace spec\PlanB\Utils\TypeName;

use PhpSpec\ObjectBehavior;
use PhpSpec\Wrapper\ObjectWrapper;
use PlanB\Utils\Assurance\Assurance;
use PlanB\Utils\Assurance\Exception\AssertException;
use PlanB\Utils\TypeName\Exception\InvalidTypeNameExpcetion;
use PlanB\Utils\TypeName\TypeNameAssurance;

class ClassNameAssuranceSpec extends ObjectBehavior
{
    const TARGETNAME = __CLASS__;

    public function let()
    {
        $this->beAnInstanceOf(TypeNameAssurance::class);
        $this->beConstructedThrough('create', [self::TARGETNAME]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TypeNameAssurance::class);
    }


    public function it_is_assurance()
    {
        $this->shouldHaveType(Assurance::class);
    }

    public function it_can_show_if_typename_is_the_same_class_of_itself()
    {
        $this->isSameOf(self::TARGETNAME)
            ->shouldReturn($this);
    }


    public function it_can_show_if_typename_is_not_the_same_class_of_another()
    {

        $this->shouldThrow(AssertException::class)->duringIsSameOf(ObjectBehavior::class);

    }

    public function it_can_show_if_typename_is_a_subclass_of_parent()
    {
        $this->isChildOf(ObjectBehavior::class)
            ->shouldReturn($this);
    }

    public function it_can_show_if_typename_is_not_a_subclass_of_itself()
    {
        $this->shouldThrow(AssertException::class)->duringIsChildOf(self::TARGETNAME);
    }

    public function it_can_show_if_typename_is_a_subclass_or_sameclass_of_parent()
    {
        $this->isClassOf(ObjectWrapper::class)
            ->shouldReturn($this);
    }

    public function it_can_show_if_typename_is_a_subclass_or_sameclass_of_itself()
    {
        $this->isClassOf(self::TARGETNAME)
            ->shouldReturn($this);
    }

    public function it_can_show_if_typename_is_a_classname()
    {
        $this->isClassName()
            ->shouldReturn($this);
    }

    public function it_can_show_if_typename_is_a_class_or_interfacename()
    {
        $this->isClassOrInterfaceName()
            ->shouldReturn($this);
    }

    public function it_can_show_if_typename_is_a_interfacename()
    {
        $this->shouldThrow(AssertException::class)->duringIsInterfaceName();
    }

    public function it_can_show_if_typename_is_a_traitname()
    {
        $this->shouldThrow(AssertException::class)->duringIsTraitName();
    }

    public function it_can_show_if_typename_is_a_native()
    {
        $this->shouldThrow(AssertException::class)->duringIsNativeTypeName();
    }

    public function it_can_show_if_typename_is_valid()
    {
        $this->isValid()
            ->shouldReturn($this);
    }

}
