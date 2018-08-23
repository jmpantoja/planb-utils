<?php

namespace spec\PlanB\Utils\Cli\Style;

use MabeEnum\Enum;
use PlanB\Utils\Cli\Style\Color;
use PhpSpec\ObjectBehavior;
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
}
