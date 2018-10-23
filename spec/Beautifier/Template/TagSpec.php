<?php

namespace spec\PlanB\Beautifier\Template;

use Ds\Map;
use PlanB\Beautifier\Style\Style;
use PlanB\Beautifier\Style\StyleFactory;
use PlanB\Beautifier\Style\StyleType;
use PlanB\Beautifier\Template\Tag;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TagSpec extends ObjectBehavior
{
    public function build(string $token)
    {
        $this->beConstructedThrough('make', [$token]);
    }

    public function it_is_initializable()
    {
        $this->build('x');
        $this->shouldHaveType(Tag::class);
    }

    public function it_parse_a_non_tagged_text()
    {
        $this->build('hola');

        $this->style()->shouldReturn(StyleType::DEFAULT);
        $this->key()->shouldReturn(null);
    }

    public function it_parse_a_only_key_tagged_text()
    {
        $this->build('<key>');

        $this->style()->shouldReturn(StyleType::DEFAULT);
        $this->key()->shouldReturn('key');
    }


    public function it_parse_a_complete_tagged_text()
    {
        $this->build('<type:key>');

        $this->style()->shouldReturn(StyleType::TYPE);
        $this->key()->shouldReturn('key');
    }
}
