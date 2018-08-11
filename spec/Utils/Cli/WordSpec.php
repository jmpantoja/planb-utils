<?php

namespace spec\PlanB\Utils\Cli;

use PlanB\Utils\Cli\Line;
use PlanB\Utils\Cli\Message;
use PlanB\Utils\Cli\Style;
use PlanB\Utils\Cli\Word;
use PlanB\Utils\Cli\Output;
use PhpSpec\ObjectBehavior;
use PlanB\ValueObject\Stringifable;
use Prophecy\Argument;

class WordSpec extends ObjectBehavior
{
    public const FORMAT = 'WORD #%s';
    public const TEXT = 'WORD #1';

    public function let()
    {
        $this->beConstructedThrough('create', [self::FORMAT, 1]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Word::class);
    }

    public function it_extends_from_output()
    {
        $this->shouldHaveType(Output::class);
    }

    public function it_is_stringifable()
    {
        $this->shouldHaveType(Stringifable::class);
    }

    public function it_can_be_created_with_a_single_param(){
        $this->beConstructedThrough('create', [self::TEXT]);
        $this->shouldHaveType(Word::class);

        $this->stringify()->shouldReturn(self::TEXT);
        $this->__toString()->shouldReturn(self::TEXT);
    }

    public function it_has_an_associated_style_by_default()
    {
        $this->getStyle()->shouldHaveType(Style::class);
    }


    public function it_can_convert_to_string()
    {
        $this->stringify()->shouldReturn(self::TEXT);
        $this->__toString()->shouldReturn(self::TEXT);
    }

    public function it_can_be_added_to_line(Line $line)
    {
        $this->parent($line)->shouldReturn($this);
        $this->end()->shouldReturn($line);
    }

    public function it_refuse_be_added_to_message(Message $message)
    {
        $this->shouldThrow(\TypeError::class)->duringParent($message);
    }

    public function it_can_sets_a_style(Style $style)
    {
        $this->style($style);
        $this->getStyle()->shouldReturn($style);
    }

    public function it_can_apply_a_style_and_end(Line $line, Style $style)
    {
        $this->parent($line);
        $this->apply($style)->shouldReturn($line);
        $this->getStyle()->shouldReturn($style);
    }
}
