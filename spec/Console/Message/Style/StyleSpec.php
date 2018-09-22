<?php

namespace spec\PlanB\Console\Message\Style;

use PhpSpec\ObjectBehavior;

use PlanB\Console\Message\Style\Align;
use PlanB\Console\Message\Style\Color;
use PlanB\Console\Message\Style\Option;
use PlanB\Console\Message\Style\Style;
use PlanB\Type\Text\Text;

class StyleSpec extends ObjectBehavior
{
    private const WIDTH = 100;

    private const LEFT_SPACES = 10;
    private const LEFT = '          ';

    private const RIGHT_SPACES = 5;
    private const RIGHT = '     ';


    public function let()
    {
        $this->beConstructedThrough('create');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Style::class);
    }

    public function it_can_apply_a_padding()
    {
        $this->padding(self::LEFT_SPACES, self::RIGHT_SPACES);

        $this->getPaddingLeft()->shouldReturn(self::LEFT);
        $this->getPaddingRight()->shouldReturn(self::RIGHT);
    }

    public function it_can_apply_a_margin()
    {
        $this->margin(self::LEFT_SPACES, self::RIGHT_SPACES);

        $this->getMarginLeft()->shouldReturn(self::LEFT);
        $this->getMarginRight()->shouldReturn(self::RIGHT);
    }

    public function it_can_apply_a_position_with_align_by_default()
    {
        $this->expandTo(self::WIDTH);

        $this->getWidth()->shouldReturn(self::WIDTH);
        $this->getAlign()->shouldReturn(Align::DEFAULT());
    }

    public function it_can_apply_a_position_with_custom_align()
    {
        $this->expandTo(self::WIDTH, Align::RIGHT);

        $this->getWidth()->shouldReturn(self::WIDTH);
        $this->getAlign()->shouldReturn(Align::RIGHT());
    }

    public function it_retrieve_open_tag_by_default()
    {
        $this->getOpenTag()->stringify()->shouldReturn(Text::EMPTY_TEXT);
    }

    public function it_retrieve_open_tag()
    {

        $this->option(Option::BOLD);
        $this->foregroundColor(Color::BLUE);
        $this->backgroundColor(Color::RED);

        $this->getOpenTag()->stringify()->shouldReturn('<fg=blue;bg=red;options=bold>');
    }

    public function it_retrieve_close_tag_by_default()
    {
        $this->getCloseTag()->stringify()->shouldReturn(Text::EMPTY_TEXT);
    }

    public function it_retrieve_close_tag()
    {

        $this->option(Option::BOLD);
        $this->foregroundColor(Color::BLUE);
        $this->backgroundColor(Color::RED);

        $this->getCloseTag()->stringify()->shouldReturn('</>');
    }

    public function it_is_clonable()
    {

        $this->clone()->shouldBeLike($this);
    }

    public function it_can_be_merge_margin()
    {
        $style = $this->buildStyleToMerge();

        $this->margin(2, 3);

        $merged = $this->blend($style);

        $merged->getMarginLeft()->shouldReturn('    ');
        $merged->getMarginRight()->shouldReturn('      ');
    }

    public function it_can_be_merge_padding()
    {

        $style = $this->buildStyleToMerge();
        $this->padding(2, 3);

        $merged = $this->blend($style);

        $merged->getPaddingLeft()->shouldReturn('    ');
        $merged->getPaddingRight()->shouldReturn('      ');
    }

    public function it_can_be_merge_position()
    {

        $style = $this->buildStyleToMerge();
        $this->expandTo(5);

        $merged = $this->blend($style);

        $merged->getWidth()->shouldReturn(10);
        $merged->getAlign()->shouldReturn(Align::CENTER());
    }

    public function it_can_be_merge_attributes()
    {

        $style = $this->buildStyleToMerge();

        $this
            ->foregroundColor(Color::DEFAULT)
            ->backgroundColor(Color::BLUE)
            ->option(Option::UNDERSCORE);

        $merged = $this->blend($style);

        $merged->getOpenTag()
            ->stringify()
            ->shouldReturn('<fg=red;bg=blue;options=bold,underscore>');
    }


    /**
     * @return Style
     */
    protected function buildStyleToMerge(): Style
    {
        $style = Style::create()
            ->margin(2, 3)
            ->padding(2, 3)
            ->expandTo(10, Align::CENTER)
            ->foregroundColor(Color::RED)
            ->backgroundColor(Color::GREEN)
            ->option(Option::BOLD);

        return $style;
    }
}
