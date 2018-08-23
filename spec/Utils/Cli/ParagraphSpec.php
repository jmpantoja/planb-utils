<?php

namespace spec\PlanB\Utils\Cli;

use PlanB\Utils\Cli\Style\Align;
use PlanB\Utils\Cli\Style\Color;
use PlanB\Utils\Cli\Style\Option;
use PlanB\Utils\Cli\Paragraph;
use PhpSpec\ObjectBehavior;
use PlanB\Utils\Cli\Decorators;
use PlanB\Utils\Cli\Style\Style;
use PlanB\Type\Text\Text;
use Prophecy\Argument as p;

class ParagraphSpec extends ObjectBehavior
{

    private const LINE_A = 'linea #A';
    private const LINE_B = 'linea #B';

    private const TAB_LINE_A = "\tlinea #A";
    private const SPACES_LINE_A = Style::TAB . "linea #A";

    private const LINES = [
        self::LINE_A,
        self::LINE_B,
    ];

    private const LINES_WITH_PADDING = [
        Style::TAB . self::LINE_A . Style::TAB,
        Style::TAB . self::LINE_B . Style::TAB,
    ];

    private const INPUT = <<<eof
    short line
    very, very long line line with <fg=red>tag</>
    line with <fg=blue>tag</>
    very, very long line line without tags
eof;

    private const EXPANDED_OUTPUT = <<<eof
    short line                            
    very, very long line line with <fg=red>tag</>    
    line with <fg=blue>tag</>                         
    very, very long line line without tags
eof;

    private const CENTERED_OUTPUT = <<<eof
<bg=white;fg=green;options=bold,blink>                  short line              </>
<bg=white;fg=green;options=bold,blink>      very, very long line line with <bg=white;fg=red;options=bold,blink>tag</>  </>
<bg=white;fg=green;options=bold,blink>                line with <bg=white;fg=blue;options=bold,blink>tag</>             </>
<bg=white;fg=green;options=bold,blink>    very, very long line line without tags</>
eof;


    private const OVERWRITE_OUTPUT = <<<eof
<bg=white;fg=green;options=bold,blink>    short line                            </>
<bg=white;fg=green;options=bold,blink>    very, very long line line with <bg=white;fg=red;options=bold,blink>tag</>    </>
<bg=white;fg=green;options=bold,blink>    line with <bg=white;fg=blue;options=bold,blink>tag</>                         </>
<bg=white;fg=green;options=bold,blink>    very, very long line line without tags</>
eof;


    public function getMatchers(): array
    {
        return [
            'returnText' => function ($subject, $text) {

                if (!($subject instanceof Text)) {
                    return false;
                }

                return $text == $subject->stringify();
            }
        ];
    }

    /**
     * Override this method to provide your own inline matchers
     *
     * @link http://phpspec.net/cookbook/matchers.html Matchers cookbook
     * @return array a list of inline matchers
     */
    public function let()
    {
        $this->beConstructedThrough('create', [self::INPUT]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Paragraph::class);
    }

    public function it_replace_tabs_by_spaces()
    {
        $this->beConstructedThrough('create', [self::TAB_LINE_A]);
        $this->render()->shouldReturnText(self::SPACES_LINE_A);
    }


    public function it_can_be_rendered_without_style()
    {
        $this->render()->shouldReturnText(self::EXPANDED_OUTPUT);
    }

    public function it_can_be_rendered_with_style()
    {
        $style = $this->getStyle();
        $this->style($style);

        $this->render()->shouldReturnText(self::OVERWRITE_OUTPUT);
    }


    public function it_can_be_rendered_with_padding()
    {
        $input = implode("\n", self::LINES);
        $output = implode("\n", self::LINES_WITH_PADDING);

        $this->beConstructedThrough('create', [$input]);

        $this->padding(1, 1);
        $this->render()->shouldReturnText($output);
    }

    public function it_can_be_rendered_with_common_padding()
    {
        $input = implode("\n", self::LINES);
        $output = implode("\n", self::LINES_WITH_PADDING);

        $this->beConstructedThrough('create', [$input]);

        $this->padding(1);

        $this->render()->shouldReturnText($output);
    }

    public function it_can_be_align()
    {
        $style = $this->getStyle();

        $this->style($style);
        $this->align(Align::CENTER());

        $this->render()->shouldReturnText(self::CENTERED_OUTPUT);
    }

    /**
     * @return Style
     */
    protected function getStyle()
    {

        $style = Style::create()
            ->foreGroundColor(Color::GREEN())
            ->backGroundColor(Color::WHITE())
            ->option(Option::BOLD())
            ->option(Option::BLINK());
        return $style;
    }
}
