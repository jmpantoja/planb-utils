<?php

namespace spec\PlanB\Console\Message\Style;

use MabeEnum\Enum;
use PlanB\Cli\Message\Color;
use PhpSpec\ObjectBehavior;
use PlanB\Console\Message\Style\Option;
use Prophecy\Argument;

class OptionSpec extends ObjectBehavior
{
    public function let()
    {

        $this->beConstructedThrough('get', [Option::BOLD]);
    }

    public function it_is_intializable()
    {
        $this->shouldHaveType(Enum::class);
        $this->shouldHaveType(Option::class);

    }

    public function it_have_required_names()
    {
        $this->getNames()->shouldIterateAs([
                0 => "BLINK",
                1 => "BOLD",
                2 => "UNDERSCORE",
                3 => "REVERSE"
            ]
        );
    }

}
