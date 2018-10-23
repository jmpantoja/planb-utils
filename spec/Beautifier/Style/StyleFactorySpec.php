<?php

namespace spec\PlanB\Beautifier\Style;

use PhpSpec\ObjectBehavior;
use PlanB\Beautifier\Style\Color;
use PlanB\Beautifier\Style\Exception\InvalidStyleNameException;
use PlanB\Beautifier\Style\Style;
use PlanB\Beautifier\Style\StyleType;
use PlanB\Beautifier\Style\TypeStyle;
use PlanB\Type\Data\Data;
use Prophecy\Prophet;

class StyleFactorySpec extends ObjectBehavior
{

    public function it_retrive_a_default_style()
    {
        $this->build(StyleType::DEFAULT());
        $this->shouldHaveType(Style::class);
    }

    public function it_retrive_a_type_style()
    {
        $this->build(StyleType::TYPE());
        $this->shouldHaveType(Style::class);

        $this->isBold()->shouldReturn(true);
        $this->getFgColorName()->shouldReturn('cyan');
    }

    public function it_retrive_a_value_style()
    {
        $this->build(StyleType::VALUE());
        $this->shouldHaveType(Style::class);

        $this->isBold()->shouldReturn(false);
        $this->getFgColorName()->shouldReturn('green');
    }

    public function it_retrive_an_argument_style()
    {
        $this->build(StyleType::ARGUMENT());
        $this->shouldHaveType(Style::class);

        $this->isBold()->shouldReturn(false);
        $this->getFgColorName()->shouldReturn('yellow');
    }


    public function it_retrive_a_strong_style()
    {
        $this->build(StyleType::STRONG());
        $this->shouldHaveType(Style::class);

        $this->isBold()->shouldReturn(true);
        $this->isUnderScore()->shouldReturn(true);
    }

    public function it_retrive_an_exception_header_style()
    {
        $this->build(StyleType::EXCEPTION_HEADER());
        $this->shouldHaveType(Style::class);

        $this->isBold()->shouldReturn(true);
        $this->getBgColorName()->shouldReturn('red');
        $this->getLeftPadding()->shouldReturn(2);
        $this->getLeftMargin()->shouldReturn(2);
    }

    public function it_retrive_an_exception_body_style()
    {
        $this->build(StyleType::EXCEPTION_BODY());
        $this->shouldHaveType(Style::class);

        $this->getLeftPadding()->shouldReturn(0);
        $this->getLeftMargin()->shouldReturn(2);
    }

    public function it_retrive_an_exception_trace_style()
    {
        $this->build(StyleType::EXCEPTION_TRACE());
        $this->shouldHaveType(Style::class);

        $this->getLeftPadding()->shouldReturn(0);
        $this->getLeftMargin()->shouldReturn(2);
        $this->getFgColorName()->shouldReturn('green');
    }


    public function build($name)
    {
        $this->beConstructedThrough('factory', [$name]);
    }
}
