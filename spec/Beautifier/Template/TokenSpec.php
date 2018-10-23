<?php

namespace spec\PlanB\Beautifier\Template;

use Ds\Map;
use PlanB\Beautifier\Style\Style;
use PlanB\Beautifier\Style\StyleFactory;
use PlanB\Beautifier\Style\StyleType;
use PlanB\Beautifier\Template\Token;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TokenSpec extends ObjectBehavior
{
    public function build(string $token, array $replacements = [])
    {
        $this->beConstructedThrough('make', [$token, new Map($replacements)]);
    }

    public function it_is_initializable()
    {
        $this->build('');
        $this->shouldHaveType(Token::class);
    }

    public function it_retrieve_style_and_value_from_a_non_tagged_token()
    {
        $this->build('hola');

        $this->style()->shouldBeLike(Style::make());
        $this->value()->shouldReturn('hola');
    }


    public function it_retrieve_style_and_value_from_a_only_value_token()
    {
        $this->build('<key>', [
            'key' => 'value'
        ]);

        $this->style()->shouldBeLike(Style::make());
        $this->value()->shouldReturn('value');
    }


    public function it_retrieve_style_and_value_from_a_complete_token()
    {
        $this->build('<type:key>', [
            'key' => 'value'
        ]);

        $this->style()->shouldBeLike(StyleFactory::factory(StyleType::TYPE()));
        $this->value()->shouldReturn('value');
    }
}
