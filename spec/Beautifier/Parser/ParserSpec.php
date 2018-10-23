<?php

namespace spec\PlanB\Beautifier\Parser;

use PlanB\Beautifier\Enviroment;
use PlanB\Beautifier\Parser\Decorator\ConsoleTagDecorator;
use PlanB\Beautifier\Parser\Decorator\HtmlTagDecorator;
use PlanB\Beautifier\Parser\Decorator\LineWidthDecorator;
use PlanB\Beautifier\Parser\Decorator\MarginDecorator;
use PlanB\Beautifier\Parser\Decorator\PaddingDecorator;
use PlanB\Beautifier\Parser\HtmlParser;
use PhpSpec\ObjectBehavior;
use PlanB\Beautifier\Parser\Parser;
use PlanB\Beautifier\Parser\ParserFactory;
use PlanB\Beautifier\Style\Align;
use PlanB\Beautifier\Style\Color;
use PlanB\Beautifier\Style\Style;
use PlanB\Beautifier\Template\Token;
use Prophecy\Argument;


class ParserSpec extends ObjectBehavior
{
    public function let(Token $token)
    {

        $token->value()->willReturn('hola');

        $this->beConstructedThrough('make');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Parser::class);
    }

    protected function stylized(Token $token): Style
    {
        $style = Style::make();
        $token->style()->willReturn($style);

        return $style;
    }

    public function it_decorate_tag_on_console(Token $token)
    {
        $this->stylized($token)
            ->setBgColor(Color::RED())
            ->setFgColor(Color::BLUE())
            ->bold()
            ->underscore();

        $this->addDecorator(ConsoleTagDecorator::make());
        $this->decorate($token)
            ->shouldReturn('<fg=blue;bg=red;options=bold,underscore>hola</>');
    }

    public function it_decorate_tag_on_html(Token $token)
    {
        $this->stylized($token)
            ->setBgColor(Color::RED())
            ->setFgColor(Color::BLUE())
            ->bold()
            ->underscore();

        $this->addDecorator(HtmlTagDecorator::make());
        $this->decorate($token)
            ->shouldReturn('<span style="color:blue;background:red;font-weight:bold;text-decoration:underline">hola</span>');
    }

    public function it_decorate_with_left_and_right_padding(Token $token)
    {
        $this->stylized($token)
            ->padding(2, 3);

        $this->addDecorator(PaddingDecorator::make());
        $this->decorate($token)
            ->shouldReturn('  hola   ');
    }

    public function it_decorate_with_common_padding(Token $token)
    {
        $this->stylized($token)
            ->padding(2);

        $this->addDecorator(PaddingDecorator::make());
        $this->decorate($token)
            ->shouldReturn('  hola  ');
    }

    public function it_decorate_with_left_and_right_margin(Token $token)
    {
        $this->stylized($token)
            ->margin(2, 3);

        $this->addDecorator(MarginDecorator::make());
        $this->decorate($token)
            ->shouldReturn('  hola   ');
    }

    public function it_decorate_with_common_margin(Token $token)
    {
        $this->stylized($token)
            ->margin(2);

        $this->addDecorator(MarginDecorator::make());
        $this->decorate($token)
            ->shouldReturn('  hola  ');
    }

    public function it_decorate_with_line_width_and_align_by_default(Token $token)
    {
        $this->stylized($token)
            ->expand()
            ->lineWidth(20);

        $this->addDecorator(LineWidthDecorator::make());

        $this->decorate($token)
            ->shouldReturn('        hola        ');
    }

    public function it_decorate_with_line_width_and_align_center(Token $token)
    {
        $this->stylized($token)
            ->lineWidth(20)
            ->align(Align::CENTER());

        $this->addDecorator(LineWidthDecorator::make());
        $this->decorate($token)
            ->shouldReturn('        hola        ');
    }

    public function it_decorate_with_line_width_and_align_left(Token $token)
    {
        $this->stylized($token)
            ->lineWidth(20)
            ->align(Align::LEFT());

        $this->addDecorator(LineWidthDecorator::make());
        $this->decorate($token)
            ->shouldReturn('hola                ');
    }

    public function it_decorate_with_line_width_and_align_right(Token $token)
    {
        $this->stylized($token)
            ->lineWidth(20)
            ->align(Align::RIGHT());

        $this->addDecorator(LineWidthDecorator::make());
        $this->decorate($token)
            ->shouldReturn('                hola');
    }
}
