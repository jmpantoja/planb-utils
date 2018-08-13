<?php

namespace spec\PlanB\Utils\Cli;

use MabeEnum\Enum;
use PlanB\Utils\Cli\Color;
use PhpSpec\ObjectBehavior;
use PlanB\Utils\Cli\Option;
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
//
//
//public const BLINK = 'blink';
//public const BOLD = 'bold';
//public const UNDERSCORE = 'underscore';
//public const REVERSE = 'reverse';
