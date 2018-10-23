<?php

namespace spec\PlanB\Beautifier\Parser;

use PlanB\Beautifier\Enviroment;
use PlanB\Beautifier\Parser\HtmlParser;
use PhpSpec\ObjectBehavior;
use PlanB\Beautifier\Parser\Parser;
use PlanB\Beautifier\Parser\ParserFactory;
use Prophecy\Argument;

class ParserTemplateSpec extends ObjectBehavior
{
    public function build(Enviroment $enviroment)
    {
        $this->beAnInstanceOf(ParserFactory::class);
        $this->beConstructedThrough('factory', [$enviroment]);
    }

    private function trim(string $output)
    {
        $lines = explode("\n", $output);
        $lines = array_map(function ($line) {
            return trim($line);
        }, $lines);

        return implode("\n", $lines);
    }

    private function check_parse(Enviroment $enviroment, string $output)
    {
        $this->build($enviroment);

        $output = $this->trim($output);

        $template = <<<eof
            type style: <type:key_A>
            value style: <value:key_A>
            argument style: <argument:key_A>
            all together now: (<type:key_A>:<type:key_B>)(<value:key_A><argument:key_B>)
eof;
        $this->parse($template, [
            'key_A' => 'data_A',
            'key_B' => 'data_B'
        ])->shouldReturn($output);

    }

    public function it_parse_a_template_to_plain_text()
    {
        $output = <<<eof
            type style: data_A
            value style: data_A
            argument style: data_A
            all together now: (data_A:data_B)(data_Adata_B)
eof;

        $this->check_parse(Enviroment::PLAIN_TEXT(), $output);
    }

    public function it_parse_a_template_to_html()
    {
        $output = <<<eof
            type style: <span style="color:cyan;font-weight:bold">data_A</span>
            value style: <span style="color:green">data_A</span>
            argument style: <span style="color:yellow">data_A</span>
            all together now: (<span style="color:cyan;font-weight:bold">data_A</span>:<span style="color:cyan;font-weight:bold">data_B</span>)(<span style="color:green">data_A</span><span style="color:yellow">data_B</span>)
eof;

        $this->check_parse(Enviroment::HTML(), $output);
    }

    public function it_parse_a_template_to_console()
    {
        $output = <<<eof
            type style: <fg=cyan;options=bold>data_A</>
            value style: <fg=green>data_A</>
            argument style: <fg=yellow>data_A</>
            all together now: (<fg=cyan;options=bold>data_A</>:<fg=cyan;options=bold>data_B</>)(<fg=green>data_A</><fg=yellow>data_B</>)
eof;

        $this->check_parse(Enviroment::CONSOLE(), $output);
    }
}
