<?php

namespace spec\PlanB\Console\Message;

use PlanB\Console\Message\Paragraph;
use PlanB\Console\Message\Line;
use PlanB\Console\Message\Message;
use PhpSpec\ObjectBehavior;
use PlanB\Type\Text\Text;
use Prophecy\Argument;

class MessageSpec extends ObjectBehavior
{
    private const ONE_LINE_TEXT = "one_line_text";

    private const TWO_LINE_TEXT = <<<eof
    first line
    second line
eof;

    public function it_can_be_created_blank_line()
    {
        $this->beConstructedThrough('blank');
        $this->shouldHaveType(Paragraph::class);
        $this->count()->shouldReturn(1);
    }

    public function it_can_be_created_from_a_one_line_string()
    {
        $this->beConstructedThrough('line', [self::ONE_LINE_TEXT]);
        $this->shouldHaveType(Paragraph::class);
    }

    public function it_can_be_created_from_a_two_lines_string()
    {
        $this->beConstructedThrough('line', [self::TWO_LINE_TEXT]);

        $this->shouldHaveType(Paragraph::class);
        $this->count()->shouldReturn(2);
    }

    public function it_can_be_created_from_array_of_lines()
    {
        $this->beConstructedThrough('join', [[
            Text::format('aaa'),
            'line B',
            45648,
            Message::line('cccc'),
            Message::line("xxxx\nyyyy\nzzzz")
        ]]);

        $this->count()->shouldReturn(7);
    }
}
