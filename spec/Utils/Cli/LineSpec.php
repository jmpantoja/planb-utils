<?php

namespace spec\PlanB\Utils\Cli;

use PlanB\Utils\Cli\Align;
use PlanB\Utils\Cli\Color;
use PlanB\Utils\Cli\Line;
use PhpSpec\ObjectBehavior;
use PlanB\Utils\Cli\Style;
use Prophecy\Argument;

class LineSpec extends ObjectBehavior
{

    private const CONTENT = 'LINE #A';

    private const UNTRIMMED_CONTENT = '    LINE #A    ';

    private const TAGGED_CONTENT = '<fg=red;bg=black>LINE </>#A';

    private const TAGGED_CONTENT_WITH_TABS = "<fg=red;bg=black>\tLINE </>#A";

    public function let()
    {
        $this->beConstructedThrough('create', [self::CONTENT]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Line::class);
    }

    public function it_can_retrieve_the_length()
    {
        $this->length()->shouldReturn(strlen(self::CONTENT));
    }

    public function it_can_retrieve_the_length_from_tagged_content()
    {
        $this->beConstructedThrough('create', [self::TAGGED_CONTENT]);
        $this->length()->shouldReturn(strlen(self::CONTENT));
    }

    public function it_can_retrieve_the_length_from_untrimmed_content()
    {
        $this->beConstructedThrough('create', [self::UNTRIMMED_CONTENT]);
        $this->length()->shouldReturn(strlen(self::CONTENT));
    }

    public function it_can_retrieve_the_length_from_untrimmed_tagged_content()
    {
        $this->beConstructedThrough('create', [self::TAGGED_CONTENT_WITH_TABS]);
        $this->length()->shouldReturn(strlen(self::CONTENT) + strlen(Style::TAB));
    }

    public function it_can_render_simple_content()
    {
        $style = Style::create();

        $this->beConstructedThrough('create', [self::CONTENT]);
        $this->render($style)->shouldReturn(self::CONTENT);
    }

    public function it_can_render_expanded_content(Style $style)
    {
        $this->beConstructedThrough('create', [self::CONTENT]);

        $spaces = 10;

        $maxLenght = strlen(self::CONTENT) + $spaces;

        $style = Style::create();
        $style->width($maxLenght);

        $padding = str_repeat(' ', $spaces);

        $this->render($style)->shouldReturn(self::CONTENT . $padding);
    }

}
