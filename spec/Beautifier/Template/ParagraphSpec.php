<?php

namespace spec\PlanB\Beautifier\Template;

use Ds\Map;
use PlanB\Beautifier\Template\Line;
use PlanB\Beautifier\Template\Paragraph;
use PhpSpec\ObjectBehavior;
use PlanB\Type\DataType\DataType;
use Prophecy\Argument;

class ParagraphSpec extends ObjectBehavior
{
    public function build(string $template, array $replacements = [])
    {
        $this->beConstructedThrough('make', [$template, $replacements]);
    }

    public function it_is_initializable()
    {
        $this->build('');
        $this->shouldHaveType(Paragraph::class);
    }

    public function it_is_a_collection_of_lines()
    {
        $this->build('');
        $this->getInnerType()->shouldBeLike(DataType::make(Line::class));
    }

    public function it_retrieve_a_paragraph_with_a_single_line()
    {
        $this->build('esto es una linea');
        $this->count()->shouldReturn(1);
    }

    public function it_retrieve_a_paragraph_with_two_or_more_lines()
    {
        $template = <<<eof
            una linea
            dos lineas
eof;

        $this->build($template);
        $this->count()->shouldReturn(2);
    }

    public function it_retrieve_the_max_line_width()
    {
        $template = <<<eof
            una linea
            dos lineas
eof;
        $this->build($template);
        $this->getWidth()->shouldReturn(9);
    }
}
