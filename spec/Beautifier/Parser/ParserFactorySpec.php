<?php

namespace spec\PlanB\Beautifier\Parser;

use PlanB\Beautifier\Enviroment;
use PlanB\Beautifier\Parser\Decorator\ConsoleTagDecorator;
use PlanB\Beautifier\Parser\Decorator\HtmlTagDecorator;
use PlanB\Beautifier\Parser\Parser;
use PlanB\Beautifier\Parser\ParserFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParserFactorySpec extends ObjectBehavior
{

    public function getMatchers(): array
    {
        return [
            'containOneItemOfType' => function (array $subject, string $type) {
                $total = 0;
                foreach ($subject as $item) {
                    if ($item instanceof $type) {
                        $total++;
                    }
                }
                return $total === 1;
            }
        ];
    }

    public function it_retrieve_a_console_parser()
    {
        $this->beConstructedThrough('factory', [Enviroment::CONSOLE()]);
        $this->shouldHaveType(Parser::class);

        $this->getDecorators()->shouldContainOneItemOfType(ConsoleTagDecorator::class);
    }

    public function it_retrieve_a_html_parser()
    {
        $this->beConstructedThrough('factory', [Enviroment::HTML()]);
        $this->shouldHaveType(Parser::class);

        $this->getDecorators()->shouldContainOneItemOfType(HtmlTagDecorator::class);
    }

    public function it_retrieve_a_plain_text_parser()
    {
        $this->beConstructedThrough('factory', [Enviroment::PLAIN_TEXT()]);
        $this->shouldHaveType(Parser::class);

        $this->getDecorators()->shouldHaveCount(0);
    }


    public function it_retrieve_a_parser_by_default()
    {
        $this->beConstructedThrough('factory');
        $this->shouldHaveType(Parser::class);

        $this->getDecorators()->shouldContainOneItemOfType(ConsoleTagDecorator::class);
    }
}
