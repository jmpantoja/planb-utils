<?php

namespace spec\PlanB\Utils\Cli;


use PlanB\Utils\Cli\Line;
use PhpSpec\ObjectBehavior;
use PlanB\Utils\Cli\Style\Align;
use PlanB\Utils\Cli\Style\Color;
use PlanB\Utils\Cli\Style\Option;
use PlanB\Utils\Cli\Style\Spacing;
use PlanB\Utils\Cli\Style\Style;
use PlanB\ValueObject\Text\Text;
use Prophecy\Argument;

class LineSpec extends ObjectBehavior
{

    private const INPUT = "input";

    private const INPUT_WITH_TABS = "\t\t" . self::INPUT;
    private const OUTPUT_WITH_SPACES = Style::TAB . Style::TAB . self::INPUT;

    private const INPUT_WITH_TAG = "input<fg=red>content</>";
    private const OUTPUT_WITH_TAG_OVERWRITE = "<bg=green;options=bold,blink>input<bg=green;fg=red;options=bold,blink>content</></>";

    private const OUTPUT_CENTERED = "     input     ";
    private const OUTPUT_WITH_PADDING = "      <fg=red>input</>      ";

    public function getMatchers(): array
    {
        return [
            'returnLine' => function ($subject, string $text) {
                if (!($subject instanceof Line)) {
                    return false;
                }

                return $text === $subject->stringify();
            }
        ];
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Line::class);
    }

    public function it_replace_tabs_by_spaces()
    {
        $this->beConstructedThrough('create', [self::INPUT_WITH_TABS]);

        $style = Style::create();
        $spacing = Spacing::create();

        $this->render($style, $spacing)->shouldReturnLine(self::OUTPUT_WITH_SPACES);
    }

    public function it_replace_inner_styles()
    {
        $this->beConstructedThrough('create', [self::INPUT_WITH_TAG]);

        $style = Style::create()
            ->backGroundColor(Color::GREEN())
            ->option(Option::BOLD())
            ->option(Option::BLINK());

        $spacing = Spacing::create();

        $this->render($style, $spacing)->shouldReturnLine(self::OUTPUT_WITH_TAG_OVERWRITE);
    }

    public function it_can_be_align()
    {
        $this->beConstructedThrough('create', [self::INPUT]);

        $style = Style::create();

        $spacing = Spacing::create()
            ->expandTo(15)
            ->align(Align::CENTER());

        $this->render($style, $spacing)->shouldReturnLine(self::OUTPUT_CENTERED);
    }

    public function it_can_be_padding()
    {
        $this->beConstructedThrough('create', [self::INPUT]);

        $style = Style::create()
            ->foreGroundColor(Color::RED());

        $spacing = Spacing::create()
            ->padding(2);

        $this->render($style, $spacing)->shouldReturnLine(self::OUTPUT_WITH_PADDING);
    }

}
