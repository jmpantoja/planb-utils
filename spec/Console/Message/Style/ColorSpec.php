<?php

namespace spec\PlanB\Console\Message\Style;

use MabeEnum\Enum;
use PlanB\Console\Message\Style\Color;
use PhpSpec\ObjectBehavior;
use PlanB\Type\Text\Text;
use Prophecy\Argument;

class ColorSpec extends ObjectBehavior
{
    public function let()
    {

        $this->beConstructedThrough('get', [Color::DEFAULT]);
    }

    public function it_is_intializable()
    {
        $this->shouldHaveType(Enum::class);
        $this->shouldHaveType(Color::class);

    }

    public function it_have_required_names()
    {
        $this->getNames()->shouldIterateAs([
                0 => "DEFAULT",
                1 => "BLACK",
                2 => "RED",
                3 => "GREEN",
                4 => "YELLOW",
                5 => "BLUE",
                6 => "MAGENTA",
                7 => "CYAN",
                8 => "WHITE",
            ]
        );
    }

    public function it_have_required_values()
    {
        $this->getValues()->shouldIterateAs([
                0 => "default",
                1 => "black",
                2 => "red",
                3 => "green",
                4 => "yellow",
                5 => "blue",
                6 => "magenta",
                7 => "cyan",
                8 => "white"

            ]
        );
    }

    public function it_can_be_convertered_to_attribute_format_from_default()
    {
        $this->beConstructedThrough('get', [Color::DEFAULT]);
        $this->toAttributeFormat('fg')
            ->stringify()
            ->shouldReturn(Text::EMPTY_TEXT);
    }

    public function it_can_be_convertered_to_attribute_format()
    {
        $this->beConstructedThrough('get', [Color::RED]);
        $this->toAttributeFormat('fg')
            ->stringify()
            ->shouldReturn('fg=red');
    }

    public function it_can_be_merge_from_default_value()
    {
        $this->beConstructedThrough('get', [Color::DEFAULT]);

        $this->merge(Color::RED())
            ->shouldReturn(Color::RED());
    }


    public function it_can_be_merge_from_regular_value()
    {
        $this->beConstructedThrough('get', [Color::GREEN]);

        $this->merge(Color::RED())
            ->shouldReturn(Color::GREEN());
    }
}
