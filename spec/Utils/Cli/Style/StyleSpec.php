<?php

namespace spec\PlanB\Utils\Cli\Style;

use PlanB\Utils\Cli\Style\Align;
use PlanB\Utils\Cli\Style\Color;
use PlanB\Utils\Cli\Style\Option;
use PlanB\Utils\Cli\Style\Style;
use PhpSpec\ObjectBehavior;
use PlanB\ValueObject\Text\Text;
use Prophecy\Argument;

class StyleSpec extends ObjectBehavior
{

    public function let()
    {
        $this->beConstructedThrough('create');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Style::class);
    }

    public function it_is_empty_when_create()
    {
        $this->isEmpty()->shouldReturn(true);
    }

    public function it_is_not_empty_when_add_any_attribute()
    {
        $this->backGroundColor(Color::RED());

        $this->isEmpty()->shouldReturn(false);
    }

    public function it_can_parse_empty_when_is_empty()
    {
        $this->getAttributesAsString()->shouldReturn(Text::EMPTY_TEXT);
    }


    public function it_can_parse_when_has_attributes()
    {
        $this
            ->backGroundColor(Color::RED())
            ->foreGroundColor(Color::BLUE())
            ->option(Option::BOLD())
            ->option(Option::BLINK());

        $this->getAttributesAsString()->shouldReturn('bg=red;fg=blue;options=bold,blink');
    }

    public function it_apply_string_attributes()
    {
        $this->backGroundColor(Color::RED());
        $merged = $this->applyAttributeString('fg=blue;options=bold,blink');

        $merged->getAttributesAsString()
            ->shouldReturn('bg=red;fg=blue;options=bold,blink');
    }

    public function it_ignore_bad_formed_string_attributes()
    {
        $this->backGroundColor(Color::RED());
        $merged = $this->applyAttributeString('AA=blue;CC=bold,blink');

        $merged->getAttributesAsString()
            ->shouldReturn('bg=red');
    }

    public function it_ignore_bad_color()
    {
        $this->backGroundColor(Color::RED());
        $merged = $this->applyAttributeString('fg=XXX;options=bold,blink');

        $merged->getAttributesAsString()
            ->shouldReturn('bg=red;options=bold,blink');
    }

    public function it_ignore_bad_option()
    {
        $this->backGroundColor(Color::RED());
        $merged = $this->applyAttributeString('fg=blue;options=XXX,blink');

        $merged->getAttributesAsString()
            ->shouldReturn('bg=red;fg=blue;options=blink');
    }
}
