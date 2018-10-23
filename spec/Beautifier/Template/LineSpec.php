<?php

namespace spec\PlanB\Beautifier\Template;

use Ds\Map;
use PlanB\Beautifier\Template\Line;
use PhpSpec\ObjectBehavior;
use PlanB\Beautifier\Template\Token;
use PlanB\Type\DataType\DataType;
use Prophecy\Argument;

class LineSpec extends ObjectBehavior
{
    public function build(string $template, array $replacements = [])
    {
        $this->beConstructedThrough('make', [$template, new Map($replacements)]);
    }

    public function it_is_initializable()
    {
        $this->build('');
        $this->shouldHaveType(Line::class);
    }

    public function it_is_a_collection_of_tokens()
    {
        $this->build('');
        $this->getInnerType()->shouldBeLike(DataType::make(Token::class));
    }

    public function it_retrieve_a_line_with_a_single_token()
    {
        $this->build('token');
        $this->count()->shouldReturn(1);
    }

    public function it_retrieve_a_line_with_two_or_more_tokens()
    {
        $this->build('token1    <token2>     <token3:token3>');
        $this->count()->shouldReturn(5);
    }
}
