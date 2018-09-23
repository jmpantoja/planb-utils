<?php

namespace spec\PlanB\Console\Message;


use PlanB\Console\Message\Line;
use PlanB\Console\Message\Style\Align;
use PlanB\Console\Message\Style\Color;
use PlanB\Console\Message\Style\Option;
use PlanB\Console\Message\Style\Style;
use PlanB\Console\Message\Style\Space;
use PlanB\Console\Message\Renderer;
use PhpSpec\ObjectBehavior;
use PlanB\Type\Text\Text;
use Prophecy\Argument;

class RendererSpec extends ObjectBehavior
{
    private const WIDTH = 14;

    private const INPUT = 'hola';

    private const OUTPUT_WITH_PADDING = '  hola  ';
    private const OUTPUT_WITH_DIFFERENT_PADDING = '  hola    ';

    private const OUTPUT_ALING_TO_LEFT = 'hola          ';
    private const OUTPUT_ALING_TO_CENTER = '     hola     ';
    private const OUTPUT_ALING_TO_RIGHT = '          hola';

    private const INPUT_WITH_TAGS = '<fg=red>hola</>';
    private const OUTPUT_WITH_TAGS = '<fg=blue;bg=red;options=bold>hola</>';
    private const OUTPUT_WITH_TAGS_ALING_TO_CENTER = '     <fg=red>hola</>     ';

    private const OUTPUT_WITH_MARGIN = '  <fg=red>hola</>  ';
    private const OUTPUT_WITH_DIFFERENT_MARGIN = '  <fg=red>hola</>    ';

    public function let()
    {
        $this->beConstructedThrough('create');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Renderer::class);
    }

    public function it_can_apply_an_equals_padding()
    {
        $text = Line::make(self::INPUT);
        $style = Style::create()
            ->padding(2);

        $this->render($text, $style)
            ->stringify()
            ->shouldReturn(self::OUTPUT_WITH_PADDING);
    }

    public function it_can_apply_an_different_padding()
    {
        $text = Line::make(self::INPUT);
        $style = Style::create()
            ->padding(2, 4);

        $this->render($text, $style)
            ->stringify()
            ->shouldReturn(self::OUTPUT_WITH_DIFFERENT_PADDING);
    }

    public function it_can_apply_an_equals_margin()
    {
        $text = Line::make(self::INPUT_WITH_TAGS);
        $style = Style::create()
            ->margin(2);

        $this->render($text, $style)
            ->stringify()
            ->shouldReturn(self::OUTPUT_WITH_MARGIN);
    }

    public function it_can_apply_an_different_margin()
    {
        $text = Line::make(self::INPUT_WITH_TAGS);
        $style = Style::create()
            ->margin(2, 4);

        $this->render($text, $style)
            ->stringify()
            ->shouldReturn(self::OUTPUT_WITH_DIFFERENT_MARGIN);
    }


    public function it_can_align_to_left()
    {
        $text = Line::make(self::INPUT);
        $style = Style::create()
            ->expandTo(self::WIDTH);

        $this->render($text, $style)
            ->stringify()
            ->shouldReturn(self::OUTPUT_ALING_TO_LEFT);
    }

    public function it_can_align_to_center()
    {
        $text = Line::make(self::INPUT);
        $style = Style::create()
            ->expandTo(self::WIDTH, Align::CENTER);

        $this->render($text, $style)
            ->stringify()
            ->shouldReturn(self::OUTPUT_ALING_TO_CENTER);
    }

    public function it_can_align_to_right()
    {
        $text = Line::make(self::INPUT);
        $style = Style::create()
            ->expandTo(self::WIDTH, Align::RIGHT);

        $this->render($text, $style)
            ->stringify()
            ->shouldReturn(self::OUTPUT_ALING_TO_RIGHT);
    }

    public function it_can_align_a_text_with_tags()
    {
        $text = Line::make(self::INPUT_WITH_TAGS);
        $style = Style::create()
            ->expandTo(self::WIDTH, Align::CENTER);

        $this->render($text, $style)
            ->stringify()
            ->shouldReturn(self::OUTPUT_WITH_TAGS_ALING_TO_CENTER);
    }

    public function it_can_add_tags_to_a_text()
    {
        $text = Line::make(self::INPUT);
        $style = Style::create()
            ->option(Option::BOLD)
            ->foregroundColor(Color::BLUE)
            ->backgroundColor(Color::RED);


        $this->render($text, $style)
            ->stringify()
            ->shouldReturn(self::OUTPUT_WITH_TAGS);
    }

    public function it_can_apply_a_complete_style()
    {
        $style = Style::create();
        $text = Line::make('x');


        $this->render($text, $style)
            ->stringify()
            ->shouldReturn('x');

        $style->padding(2);
        $this->render($text, $style)
            ->stringify()
            ->shouldReturn('  x  ');


        $style->expandTo(11, Align::LEFT);
        $this->render($text, $style)
            ->stringify()
            ->shouldReturn('  x        ');

        $style->expandTo(11, Align::RIGHT);
        $this->render($text, $style)
            ->stringify()
            ->shouldReturn('        x  ');

        $style->expandTo(11, Align::CENTER);
        $this->render($text, $style)
            ->stringify()
            ->shouldReturn('     x     ');

        $style->foregroundColor(Color::RED)->backgroundColor('blue');
        $this->render($text, $style)
            ->stringify()
            ->shouldReturn('<fg=red;bg=blue>     x     </>');

        $style->margin(3, 2);
        $this->render($text, $style)
            ->stringify()
            ->shouldReturn('   <fg=red;bg=blue>     x     </>  ');


    }
}
