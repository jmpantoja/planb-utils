<?php

namespace spec\PlanB\Beautifier\Console;

use PlanB\Beautifier\Console\ConsoleFormatter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConsoleFormatterSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('make');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ConsoleFormatter::class);
    }

    public function it_retrieve_a_beauty_variable()
    {
        $this->dump('hola')
            ->shouldReturn('string:hola');

    }
}
