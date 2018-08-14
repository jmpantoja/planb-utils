<?php

namespace spec\PlanB\Utils\Cli;

use PlanB\Utils\Cli\Align;
use PlanB\Utils\Cli\Color;
use PlanB\Utils\Cli\Line;
use PlanB\Utils\Cli\Option;
use PlanB\Utils\Cli\Style;
use PhpSpec\ObjectBehavior;
use PlanB\ValueObject\Text\Text;
use Prophecy\Argument;

class StyleSpec extends ObjectBehavior
{

    private const TEXT = 'inner content';
    private const TEXT_WITH_FOREGROUND = '<fg=red>inner content</>';
    private const TEXT_WITH_BACKGROUND = '<bg=red>inner content</>';
    private const TEXT_WITH_BOLD_OPTION = '<options=bold>inner content</>';
    private const TEXT_WITH_BOLD_AND_BLINK_OPTION = '<options=bold,blink>inner content</>';
    private const TEXT_WITH_ALL_TOGETHER = '<bg=blue;fg=red;options=bold,blink>inner content</>';


    private const BAD_FORMAT = 'bad-format';

    private const UNCHANGED_TEXT = '<bg=blue;fg=yellow;options=bold>inner content</>';

    private const BAD_VALUES = 'fg=rXXX;options=XXX';

    public function let(Text $text)
    {
        $text->stringify()->willReturn(self::TEXT);

        $this->beConstructedThrough('create');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Style::class);
    }

    public function it_can_wrap_a_text_with_no_style(Text $text)
    {
        $this
            ->wrap($text)
            ->shouldReturn($text);
    }

    public function it_can_wrap_a_text_with_foreground_color(Text $text)
    {
        $this->foreGroundColor(Color::RED())
            ->wrap($text)
            ->stringify()
            ->shouldReturn(self::TEXT_WITH_FOREGROUND);
    }

    public function it_can_wrap_a_text_with_background_color(Text $text)
    {
        $this->backGroundColor(Color::RED())
            ->wrap($text)
            ->stringify()
            ->shouldReturn(self::TEXT_WITH_BACKGROUND);
    }

    public function it_can_wrap_a_text_with_one_option(Text $text)
    {
        $this->option(Option::BOLD())
            ->wrap($text)
            ->stringify()
            ->shouldReturn(self::TEXT_WITH_BOLD_OPTION);
    }

    public function it_can_wrap_a_text_with_two_option(Text $text)
    {
        $this->option(Option::BOLD())
            ->option(Option::BLINK())
            ->wrap($text)
            ->stringify()
            ->shouldReturn(self::TEXT_WITH_BOLD_AND_BLINK_OPTION);
    }

    public function it_can_wrap_a_text_with_all_together(Text $text)
    {
        $this->option(Option::BOLD())
            ->option(Option::BLINK())
            ->foreGroundColor(Color::RED())
            ->backGroundColor(Color::BLUE())
            ->backGroundColor(Color::BLUE())
            ->wrap($text)
            ->stringify()
            ->shouldReturn(self::TEXT_WITH_ALL_TOGETHER);
    }


    public function it_can_be_merged_from_string(Text $text)
    {

        $style = $this->backGroundColor(Color::BLUE())
            ->foreGroundColor(Color::YELLOW())
            ->option(Option::BOLD())
            ->applyAttributeString('fg=red;options=blink');

        $style->wrap($text)
            ->stringify()
            ->shouldReturn(self::TEXT_WITH_ALL_TOGETHER);
    }

    public function it_can_be_merged_from_string_ignoring_bad_format(Text $text)
    {

        $style = $this->backGroundColor(Color::BLUE())
            ->foreGroundColor(Color::YELLOW())
            ->option(Option::BOLD())
            ->applyAttributeString(self::BAD_FORMAT);

        $style->wrap($text)
            ->stringify()
            ->shouldReturn(self::UNCHANGED_TEXT);
    }

    public function it_can_be_merged_from_string_ignoring_bad_value(Text $text)
    {

        $style = $this->backGroundColor(Color::BLUE())
            ->foreGroundColor(Color::YELLOW())
            ->option(Option::BOLD())
            ->applyAttributeString(self::BAD_VALUES);

        $style->wrap($text)
            ->stringify()
            ->shouldReturn(self::UNCHANGED_TEXT);
    }
}
