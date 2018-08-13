<?php

namespace spec\PlanB\Utils\Cli;

use PlanB\Utils\Cli\Color;
use PlanB\Utils\Cli\Line;
use PhpSpec\ObjectBehavior;
use PlanB\Utils\Cli\Option;
use PlanB\Utils\Cli\Output;
use Prophecy\Argument;

class OutputSpec extends ObjectBehavior
{
    private const CONTENT = 'LINE #A';


    public function let()
    {
        $this->beAnInstanceOf(Line::class);;
        $this->beConstructedThrough('create', [self::CONTENT]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Output::class);
    }



}
