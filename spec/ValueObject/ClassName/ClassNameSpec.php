<?php

namespace spec\PlanB\ValueObject\ClassName;

use PhpSpec\Wrapper\ObjectWrapper;
use PlanB\ValueObject\ClassName\ClassName;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClassNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('fromString', [__CLASS__]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ClassName::class);
    }

    public function it_can_determine_if_is_the_same_class_of()
    {

        $this->isSameOf(__CLASS__)
            ->shouldReturn(true);
    }

    public function it_can_determine_if_is_a_sub_class_of_another_class()
    {

        $this->isChildOf(ObjectBehavior::class)
            ->shouldReturn(true);
    }

    public function it_can_determine_if_is_a_sub_class_of_a_interface()
    {

        $this->isChildOf(ObjectWrapper::class)
            ->shouldReturn(true);
    }
}
