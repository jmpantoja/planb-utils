<?php

namespace spec\PlanB\Beautifier\Formatter;

use PhpSpec\ObjectBehavior;
use PlanB\Beautifier\Console\ConsoleFormatter;
use PlanB\Beautifier\Formatter\FormatterFactory;
use PlanB\Beautifier\Html\HtmlFormatter;
use PlanB\Beautifier\PlainText\PlainTextFormatter;


class FormatterFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('make');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(FormatterFactory::class);
    }

    public function it_retrieve_a_plain_text_formatter_when_sapi_is_cli()
    {
        $this->getByContext('cli')
            ->shouldHaveType(PlainTextFormatter::class);
    }


    public function it_retrieve_a_plain_text_formatter_when_sapi_is_phpdbg()
    {
        $this->getByContext('phpdbg')
            ->shouldHaveType(PlainTextFormatter::class);
    }


    public function it_retrieve_a_html_formatter_when_sapi_is_another()
    {
        $this->getByContext('cgi')
            ->shouldHaveType(HtmlFormatter::class);
    }

    public function it_retrieve_a_plain_text_formatter()
    {
        $this->getPlainText()
            ->shouldHaveType(PlainTextFormatter::class);
    }

    public function it_retrieve_a_console_formatter()
    {
        $this->getConsole()
            ->shouldHaveType(ConsoleFormatter::class);
    }

    public function it_retrieve_a_html_formatter()
    {
        $this->getHtml()
            ->shouldHaveType(HtmlFormatter::class);
    }
}
