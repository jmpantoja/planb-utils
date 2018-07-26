<?php

namespace spec\PlanB\ValueObject\ClassName;

use PlanB\ValueObject\ClassName\ClassName;
use PlanB\ValueObject\ClassName\ClassNameAssurance;
use PhpSpec\ObjectBehavior;
use PlanB\ValueObject\ClassName\Exception\InvalidClassNameExpcetion;
use Prophecy\Argument;

class ClassNameAssuranceSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('fromString', [__CLASS__]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ClassNameAssurance::class);
    }

    public function it_can_determine_if_classname_is_child_of_another_class()
    {
        $this->isChildOf(ObjectBehavior::class)
            ->shouldReturn($this);
    }

    public function it_can_determine_if_classname_is_not_child_of_another_class()
    {
        $this->shouldThrow(InvalidClassNameExpcetion::class)
            ->duringIsChildOf(ClassName::class);
    }


    public function it_can_check_anything_and_return_the_classname()
    {
         $this->isChildOf(ObjectBehavior::class)
            ->end()
            ->stringify()
            ->shouldReturn(__CLASS__);
    }

    public function it_can_check_anything_and_return_the_classname_as_string()
    {
        $this->isChildOf(ObjectBehavior::class)
            ->stringify()
            ->shouldReturn(__CLASS__);
    }

    public function it_can_check_anything_and_return_the_classname_as_string_via_to_string()
    {
        $this->isChildOf(ObjectBehavior::class)
            ->__toString()
            ->shouldReturn(__CLASS__);
    }

}

