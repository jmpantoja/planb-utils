<?php

namespace spec\PlanB\Utils\Cli;

use MabeEnum\Enum;
use PlanB\Utils\Cli\Align;
use PlanB\Utils\Cli\Color;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AlignSpec extends ObjectBehavior
{
    public function let()
    {

        $this->beConstructedThrough('get', [Align::LEFT]);
    }

    public function it_is_intializable()
    {
        $this->shouldHaveType(Enum::class);
        $this->shouldHaveType(Align::class);

    }

    public function it_have_required_names()
    {
        $this->getNames()->shouldIterateAs([
                0 => "LEFT",
                1 => "CENTER",
                2 => "RIGHT"
            ]
        );
    }
}
