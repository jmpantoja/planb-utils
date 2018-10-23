<?php

namespace spec\PlanB\Beautifier;

use PlanB\Beautifier\Beautifier;
use PhpSpec\ObjectBehavior;
use PlanB\Beautifier\Enviroment;
use PlanB\Beautifier\Format\ExceptionFormat;
use PlanB\Beautifier\Parser\PlainTextParser;
use PlanB\Type\Data\Data;
use PlanB\Type\Number\Number;
use PlanB\Type\Text\Text;
use Prophecy\Argument;
use Symfony\Component\DependencyInjection\Tests\Compiler\E;

class BeautifierSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('make');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Beautifier::class);
    }

    public function it_parse_a_template_in_html_mode()
    {
        $this->parse('<type:type>(<value:value>)', [
            'type' => 'string',
            'value' => 'value'
        ], Enviroment::HTML())
            ->shouldReturn('<span style="color:cyan;font-weight:bold">string</span>(<span style="color:green">value</span>)');
    }

    public function it_parse_a_template_in_console_mode()
    {
        $this->parse('<type:type>(<value:value>)', [
            'type' => 'string',
            'value' => 'value'
        ], Enviroment::CONSOLE())
            ->shouldReturn('<fg=cyan;options=bold>string</>(<fg=green>value</>)');
    }


    public function it_parse_a_template_in_plain_mode()
    {
        $this->parse('<type:type>(<value:value>)', [
            'type' => 'string',
            'value' => 'value'
        ], Enviroment::PLAIN_TEXT())
            ->shouldReturn('string(value)');
    }


    public function it_dump_a_number()
    {
        $this->dump(900, Enviroment::PLAIN_TEXT())
            ->shouldReturn('integer {900}');
    }


    public function it_dump_a_string()
    {
        $this->dump('hola', Enviroment::PLAIN_TEXT())
            ->shouldReturn('string {"hola"}');
    }

    public function it_dump_a_countable()
    {
        $value = new \ArrayIterator([1, 2, 3, 4, 5]);

        $this->dump($value, Enviroment::PLAIN_TEXT())
            ->shouldReturn('ArrayIterator {count: 5}');
    }

    public function it_dump_an_array()
    {
        $value = [1, 2, 3, 4, 5];

        $this->dump($value, Enviroment::PLAIN_TEXT())
            ->shouldReturn('array {count: 5}');
    }

    public function it_dump_a_stringifable()
    {
        $value = Text::make('hola');

        $this->dump($value, Enviroment::PLAIN_TEXT())
            ->shouldReturn('PlanB\Type\Text\Text {value: "hola"}');
    }

    public function it_dump_a_hashable()
    {
        $value = Number::make(652);

        $this->dump($value, Enviroment::PLAIN_TEXT())
            ->shouldReturn('PlanB\Type\Number\Number {value: 652}');
    }

    public function it_dump_a_data_wrapped_scalar()
    {
        $value = Data::make(123);

        $this->dump($value, Enviroment::PLAIN_TEXT())
            ->shouldReturn('PlanB\Type\Data\Data {integer: 123}');
    }


    public function it_dump_a_data_wrapped_object()
    {
        $value = Data::make(new \stdClass());

        $this->dump($value, Enviroment::PLAIN_TEXT())
            ->shouldReturn('PlanB\Type\Data\Data {class: "stdClass"}');
    }


    public function it_dump_a_data_wrapped_exception()
    {
        $value = Data::make(new \Exception('message'));

        $this->dump($value, Enviroment::PLAIN_TEXT())
            ->shouldReturn('PlanB\Type\Data\Data {Exception: "message"}');
    }

    public function it_dump_a_object()
    {
        $value = new \stdClass();

        $this->dump($value, Enviroment::PLAIN_TEXT())
            ->shouldReturn('object {class: "stdClass"}');
    }

    public function it_dump_an_exception()
    {
        $value = new \Exception('message');

        $output = <<<eof
Exception
message
eof;

        $this->dump($value, Enviroment::PLAIN_TEXT())
            ->shouldReturn($output);
    }

    public function it_dump_an_exception_with_trace()
    {
        $format = ExceptionFormat::make(new \Exception('message'))
            ->setVerbose(true);

        $output = <<<eof
Exception
message
#0 [internal function]
 spec\PlanB\Beautifier\BeautifierSpec->it_dump_an_exception_with_trace()
eof;

        $response = $this->format($format, Enviroment::PLAIN_TEXT());

        $response->shouldContain('Exception');
        $response->shouldContain($output);


    }
}
