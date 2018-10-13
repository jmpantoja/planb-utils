<?php

namespace spec\PlanB\Beautifier;

use PlanB\Beautifier\Beautifier;
use PhpSpec\ObjectBehavior;

use PlanB\Beautifier\Console\ConsoleFormatter;
use PlanB\Beautifier\Formatter\FormatterInterface;
use PlanB\Beautifier\Html\HtmlFormatter;
use PlanB\Beautifier\PlainText\PlainTextFormatter;
use PlanB\Beautifier\Formatter\FormatterFactory;
use Prophecy\Argument;


class BeautifierSpec extends ObjectBehavior
{
    private const INPUT = 'entrada';

    private const OUTPUT = 'salida';


    public function let(FormatterFactory $factory)
    {
        $this->beConstructedThrough('make', [$factory]);
    }

    public function it_is_initializable(FormatterFactory $factory)
    {

        $this->beConstructedThrough('make', [$factory]);

        $this->shouldHaveType(Beautifier::class);
    }

    public function it_use_a_formatter_by_context(FormatterInterface $formatter, FormatterFactory $factory)
    {
        $this->buildformatter($formatter);
        $factory->getByContext(PHP_SAPI)->willReturn($formatter);

        $this->dump(self::INPUT)
            ->shouldReturn(self::OUTPUT);
    }

    public function it_use_a_plain_text_formatter(PlainTextFormatter $formatter, FormatterFactory $factory)
    {
        $this->buildformatter($formatter);
        $factory->getPlainText()->willReturn($formatter);

        $this->toPlainText(self::INPUT)
            ->shouldReturn(self::OUTPUT);
    }

    public function it_use_a_console_formatter(ConsoleFormatter $formatter, FormatterFactory $factory)
    {
        $this->buildformatter($formatter);
        $factory->getConsole()->willReturn($formatter);

        $this->toConsole(self::INPUT)
            ->shouldReturn(self::OUTPUT);
    }


    public function it_use_a_html_formatter(HtmlFormatter $formatter, FormatterFactory $factory)
    {
        $this->buildformatter($formatter);
        $factory->getHtml()->willReturn($formatter);

        $this->toHtml(self::INPUT)
            ->shouldReturn(self::OUTPUT);
    }

    /**
     * @param FormatterInterface $formatter
     */
    private function buildformatter(FormatterInterface $formatter): void
    {
        $formatter->dump(self::INPUT)
            ->shouldBeCalledTimes(1)
            ->willReturn(self::OUTPUT);
    }

}
