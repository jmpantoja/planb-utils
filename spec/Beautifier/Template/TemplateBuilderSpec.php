<?php

namespace spec\PlanB\Beautifier\Template;

use PlanB\Beautifier\Template\TemplateBuilder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TemplateBuilderSpec extends ObjectBehavior
{
    public function let(){
        $this->beConstructedThrough('make');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TemplateBuilder::class);
    }
}
