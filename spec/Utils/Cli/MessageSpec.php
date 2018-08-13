<?php

namespace spec\PlanB\Utils\Cli;

use PlanB\Utils\Cli\Align;
use PlanB\Utils\Cli\Color;
use PlanB\Utils\Cli\Line;
use PlanB\Utils\Cli\Option;
use PlanB\Utils\Cli\OutputAggregate;
use PlanB\Utils\Cli\Output;
use PlanB\Utils\Cli\Message;
use PhpSpec\ObjectBehavior;
use PlanB\ValueObject\Stringifable;
use Prophecy\Argument;


class MessageSpec extends ObjectBehavior
{
    private const SINGLE_LINE_A = "LINE #A";
    private const LONG_LINE = 'this is a very long line';

    private const MULTIPLE_LINES = "LINE #A\nLINE #B\nthis is a very long line";

    private const MULTIPLE_LINES_CENTERED = "        LINE #A         \n        LINE #B         \nthis is a very long line";

    private const MULTIPLE_LINES_WITH_TAB = "   LINE #A   \n   LINE #B   \n   this is a very long line   ";

    private const MESSAGE_EXPANDED = "LINE #A                 \nLINE #B                 \nthis is a very long line";

    public function let()
    {
        $this->beConstructedThrough('create');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Message::class);
    }

    public function it_is_stringifable()
    {
        $this->shouldHaveType(Stringifable::class);
    }

    public function it_is_countable()
    {
        $this->shouldHaveType(\Countable::class);
    }

    public function it_count_zero_on_default()
    {
        $this->count()->shouldReturn(0);
    }


    public function it_return_an_empty_string_by_default()
    {
        $this->stringify()->shouldReturn('');
        $this->__toString()->shouldReturn('');
    }

    public function it_can_calcule_the_max_lenght()
    {

        $this->add(self::SINGLE_LINE_A);
        $this->add(self::LONG_LINE);

        $this->length()->shouldReturn(strlen(self::LONG_LINE));
    }

    public function it_can_add_a_single_line()
    {
        $this->add(self::SINGLE_LINE_A);

        $this->count()->shouldReturn(1);
        $this->stringify()->shouldReturn(self::SINGLE_LINE_A);

    }

    public function it_can_add_a_multipe_line()
    {
        $this->add(self::MULTIPLE_LINES);
        $this->stringify()->shouldReturn(self::MULTIPLE_LINES);
    }

    public function it_can_add_a_multipe_line_expanded()
    {
        $this->expand();
        $this->add(self::MULTIPLE_LINES);

        //dump($this->getWrappedObject()->stringify(), self::MESSAGE_EXPANDED);
        $this->stringify()->shouldReturn(self::MESSAGE_EXPANDED);
    }

    public function it_can_add_a_text_with_foreground_color()
    {
        $this->expand();

        $color = Color::RED();

        $this->add(self::SINGLE_LINE_A)
            ->foregroundColor($color);

        $expected = sprintf('<fg=%s>%s</>', $color->getValue(), self::SINGLE_LINE_A);

        $this->stringify()->shouldReturn($expected);
    }

    public function it_can_add_a_text_with_background_color()
    {
        $this->expand();

        $color = Color::RED();

        $this->add(self::SINGLE_LINE_A)
            ->backgroundColor($color);

        $expected = sprintf('<bg=%s>%s</>', $color->getValue(), self::SINGLE_LINE_A);

        $this->stringify()->shouldReturn($expected);
    }

    public function it_can_add_a_text_with_option()
    {
        $this->expand();

        $option = Option::BOLD();
        $this->add(self::SINGLE_LINE_A)
            ->option($option);

        $expected = sprintf('<options=%s>%s</>', $option->getValue(), self::SINGLE_LINE_A);

        $this->stringify()->shouldReturn($expected);
    }

    public function it_can_add_a_text_with_align()
    {
        $this->expand();

        $align = Align::CENTER();
        $this->add(self::MULTIPLE_LINES)
            ->align($align);

        $this->stringify()->shouldReturn(self::MULTIPLE_LINES_CENTERED);
    }

    public function it_can_add_a_text_with_tab()
    {
        $this->add('1');
        $this->add(self::MULTIPLE_LINES)
            ->tab(1, 1);

        $this->stringify();

      //  $this->stringify()->shouldReturn(self::MULTIPLE_LINES_WITH_TAB);
    }
}
