<?php

namespace spec\PlanB\Utils\Cli;

use MabeEnum\Enum;
use PlanB\Utils\Cli\Color;
use PlanB\Utils\Cli\Style;
use PhpSpec\ObjectBehavior;
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


    public function it_can_sets_a_foreground()
    {
        $color = Color::RED();

        $this->foreground($color);

    }
}
