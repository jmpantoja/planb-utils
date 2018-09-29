<?php

namespace spec\PlanB\Console\Message;

use PhpSpec\Exception\Example\FailureException;
use PlanB\Console\Message\LineWithStyle;
use PlanB\Console\Message\Message;
use PlanB\Console\Message\Paragraph;
use PhpSpec\ObjectBehavior;
use PlanB\Console\Message\Style\Color;
use PlanB\Console\Message\Style\Style;
use PlanB\DS\Resolver\Input;
use PlanB\Type\Text\Text;
use PlanB\Type\Text\TextListBuilder;
use Prophecy\Argument;

class ParagraphSpec extends ObjectBehavior
{

    private const OUTPUT_ATTRIBUTES_MERGED = <<<eof
<fg=green;options=bold,reverse>string </>
<fg=green;options=bold,reverse>Text   </>
<fg=red;options=bold,reverse>linea A</>
<fg=red;options=bold,reverse>linea B</>
<fg=green;bg=green;options=bold,reverse>linea C</>
<fg=green;options=bold,reverse,underscore,blink>linea D</>
eof;


    private const OUTPUT_PADDING_MERGED = <<<eof
<options=bold>  string           </>
<options=bold>  Text             </>
<options=bold>     linea A       </>
<options=bold>     linea B       </>
<bg=green;options=bold>    linea C        </>
<options=bold>    linea D        </>
eof;

    private const OUTPUT_MARGIN_MERGED = <<<eof
  <options=bold>string             </>    
  <options=bold>Text               </>    
     <options=bold>linea A            </>       
     <options=bold>linea B            </>       
    <bg=green;options=bold>linea C            </>      
    <options=bold>linea D            </>    
eof;

    private const OUTPUT_STYLE_MERGED = <<<eof
string string string string
           Text            
linea A                    
linea B                    
<bg=green>                    linea C</>
          linea D          
eof;


    public function let()
    {
        $this->beConstructedThrough('make', [[]]);
    }

    public function it_is_initializable()
    {
        $this->beConstructedThrough('make', [[
            Message::line("linea A\nlinea B")->fgColor(Color::RED()),
            Message::line("linea C")->bgColor(Color::GREEN()),
            Message::line("linea D")->underscore()->blink(),
        ]]);

        $this->shouldHaveType(Paragraph::class);
        $this->count()->shouldReturn(4);
    }

    public function it_can_merge_style_attributes(LineWithStyle $lineA, LineWithStyle $lineB)
    {

        $this->beConstructedThrough('make', [[
            'string',
            Text::make('Text'),
            Message::line("linea A\nlinea B")->fgColor(Color::RED()),
            Message::line("linea C")->bgColor(Color::GREEN()),
            Message::line("linea D")->underscore()->blink(),
        ]]);

        $this->bold()
            ->inverse()
            ->fgColor('green');

        $this->render()
            ->stringify()
            ->shouldReturn(self::OUTPUT_ATTRIBUTES_MERGED);
    }

    public function it_can_merge_style_padding()
    {
        $this->beConstructedThrough('make', [[
            'string',
            Text::make('Text'),
            Message::line("linea A\nlinea B")->padding(3),
            Message::line("linea C")->bgColor(Color::GREEN())->padding(2),
            Message::line("linea D")->padding(2, 0)
        ]]);

        $this
            ->bold()
            ->padding(1, 2);

        $this->render()
            ->stringify()
            ->shouldReturn(self::OUTPUT_PADDING_MERGED);
    }

    public function it_can_merge_style_margin()
    {
        $this->beConstructedThrough('make', [[
            'string',
            Text::make('Text'),
            Message::line("linea A\nlinea B")->margin(3),
            Message::line("linea C")->bgColor(Color::GREEN())->margin(2),
            Message::line("linea D")->margin(2, 0)
        ]]);

        $this
            ->bold()
            ->margin(1, 2);


        $this->render()
            ->stringify()
            ->shouldReturn(self::OUTPUT_MARGIN_MERGED);
    }

    public function it_can_merge_style_position()
    {

        $this->beConstructedThrough('make', [[
            'string string string string',
            Text::make('Text'),
            Message::line("linea A\nlinea B")->left(),
            Message::line("linea C")->bgColor(Color::GREEN())->right(),
            Message::line("linea D")
        ]]);

        $this->center();

        $this->render()
            ->stringify()
            ->shouldReturn(self::OUTPUT_STYLE_MERGED);

    }
}
