<?php

namespace spec\PlanB\Utils\Cli\Style;

use MabeEnum\Enum;
use PhpSpec\ObjectBehavior;
use PlanB\Utils\Cli\Style\Align;

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
