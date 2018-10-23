<?php

namespace spec\PlanB\Beautifier\Parser;

use PlanB\Beautifier\Enviroment;
use PlanB\Beautifier\Parser\HtmlParser;
use PhpSpec\ObjectBehavior;
use PlanB\Beautifier\Parser\Parser;
use PlanB\Beautifier\Parser\ParserFactory;
use PlanB\Type\Assurance\Exception\AssertException;
use Prophecy\Argument;

class ParserExceptionSpec extends ObjectBehavior
{
    public function build(Enviroment $enviroment)
    {
        $this->beAnInstanceOf(ParserFactory::class);
        $this->beConstructedThrough('factory', [$enviroment]);
    }

    private function debug(Enviroment $enviroment, string $output)
    {
        $this->build($enviroment);

        $exception = new \Exception('message');
        $template = <<<eof
        
            <exception_header:blank>
            <exception_header:class>
            <exception_header:blank>
            
            <exception_body:message>
eof;

        dump($this->getWrappedObject()->parse($template, [
            'blank' => ' ',
            'class' => get_class($exception),
            'message' => $exception->getMessage()
        ]));

    }

    private function check_parse(Enviroment $enviroment, string $output)
    {
        $this->build($enviroment);

        $exception = new \Exception('message');
        $template = <<<eof
        
            <exception_header:blank>
            <exception_header:class>
            <exception_header:blank>
            
            <exception_body:message>
eof;

        $this->parse($template, [
            'blank' => ' ',
            'class' => get_class($exception),
            'message' => $exception->getMessage()
        ])->shouldReturn($output);

    }

    public function it_parse_a_template_to_plain_text()
    {
        $output = <<<eof
Exception
message
eof;

        $this->check_parse(Enviroment::PLAIN_TEXT(), $output);
    }

    public function it_parse_a_template_to_html()
    {
        $output = <<<eof

  <span style="color:white;background:red;font-weight:bold">             </span>  
  <span style="color:white;background:red;font-weight:bold">  Exception  </span>  
  <span style="color:white;background:red;font-weight:bold">             </span>  

  message  
eof;

        $this->check_parse(Enviroment::HTML(), $output);
    }

    public function it_parse_a_template_to_console()
    {
        $output = <<<eof

  <fg=white;bg=red;options=bold>             </>  
  <fg=white;bg=red;options=bold>  Exception  </>  
  <fg=white;bg=red;options=bold>             </>  

  message  
eof;

        $this->check_parse(Enviroment::CONSOLE(), $output);
    }
}
