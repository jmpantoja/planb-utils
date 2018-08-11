<?php

namespace spec\PlanB\Utils\Cli;

use PlanB\Utils\Cli\Line;
use PlanB\Utils\Cli\OutputAggregate;
use PlanB\Utils\Cli\Output;
use PlanB\Utils\Cli\Message;
use PhpSpec\ObjectBehavior;
use PlanB\ValueObject\Stringifable;
use Prophecy\Argument;


class MessageSpec extends ObjectBehavior
{
    const TWO_LINES = "WORD #1\nWORD #2";

    public function let()
    {
        $this->beConstructedThrough('create');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Message::class);
    }

    public function it_extends_from_block()
    {
        $this->shouldHaveType(Output::class);
    }


    public function it_is_aggregable()
    {
        $this->shouldHaveType(OutputAggregate::class);
    }


    public function it_is_stringifable()
    {
        $this->shouldHaveType(Stringifable::class);
    }

    public function it_can_be_created_while_add_a_line()
    {
        $this->beConstructedThrough('create', [WordSpec::FORMAT, 1]);
        $this->shouldHaveType(Message::class);

        $this->count()->shouldReturn(1);
    }

    public function it_can_add_an_empty_line()
    {
        $line = $this->line();
        $line->shouldHaveType(Line::class);

        $line->end()->shouldReturn($this);
        $this->count()->shouldReturn(1);
    }

    public function it_can_add_a_word_on_a_line()
    {
        $line = $this->line(WordSpec::FORMAT, 1);
        $line->shouldHaveType(Line::class);

        $line->count()->shouldReturn(1);

        $line->end()->shouldReturn($this);
        $this->count()->shouldReturn(1);
    }


    public function it_can_compose_a_single_line_message()
    {
        $this->line(WordSpec::FORMAT, 1);

        $this->stringify()->shouldReturn(LineSpec::ONE_WORD);
    }

    public function it_can_compose_a_multipe_line_message()
    {
        $this->line(WordSpec::FORMAT, 1);
        $this->line(WordSpec::FORMAT, 2);

        $this->stringify()->shouldReturn(self::TWO_LINES);
    }

    public function it_can_compose_a_single_line_and_a_word_message()
    {
        $this->line(WordSpec::FORMAT, 1)
            ->word(WordSpec::FORMAT, 2);

        $this->stringify()->shouldReturn(LineSpec::TWO_WORDS);
    }

}
