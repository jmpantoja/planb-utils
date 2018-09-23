<?php

namespace spec\PlanB\Console\Message;

use PlanB\Console\Message\Line;
use PhpSpec\ObjectBehavior;
use PlanB\Console\Message\Style\Color;
use PlanB\Console\Message\Style\Style;
use PlanB\Type\Text\Text;
use Prophecy\Argument;

class LineSpec extends ObjectBehavior
{

    private const INPUT_WITH_TAGS = '<fg=red>hola</>';

    public function let()
    {
        $this->beConstructedThrough('make');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Line::class);
    }

    public function it_is_text()
    {
        $this->shouldHaveType(Text::class);
    }

    public function it_retrieve_length_with_and_without_tags()
    {
        $this->beConstructedThrough('make', [self::INPUT_WITH_TAGS]);

        $this->getLength()->shouldReturn(15);
        $this->getContentLength()->shouldReturn(4);
        $this->getTagsLength()->shouldReturn(11);
    }

    public function it_can_apply_a_style()
    {
        $this->beConstructedThrough('make', [self::INPUT_WITH_TAGS]);
        $style = Style::make()
            ->backgroundColor(Color::YELLOW)
            ->foregroundColor(Color::BLUE);


        $this->apply($style)
            ->stringify()
            ->shouldReturn('<fg=red;bg=yellow>hola</>');

    }

    public function it_can_be_created_as_blank()
    {
        $this->beConstructedThrough('blank');

        $this->stringify()->shouldReturn(Text::EMPTY_TEXT);
        $this->getLength()->shouldReturn(0);
        $this->getContentLength()->shouldReturn(0);
        $this->getTagsLength()->shouldReturn(0);
    }
}
