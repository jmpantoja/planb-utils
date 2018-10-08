<?php

namespace spec\PlanB\Type\Assurance\Exception;

use PlanB\Type\Assurance\Exception\AssertException;
use PhpSpec\ObjectBehavior;
use PlanB\Type\Text\Text;
use Prophecy\Argument;


class AssertExceptionSpec extends ObjectBehavior
{
    public function let(Text $text)
    {
        $text->__toString()->willReturn('Texto');
    }

    public function it_can_be_created(Text $text)
    {
        $this->beConstructedThrough('make', [$text, 'isString', []]);
        $this->shouldHaveType(AssertException::class);

        $this->getMessage()->shouldContain('<fg=cyan;options=bold>[Double\PlanB\Type\Text\Text');
        $this->getMessage()->shouldContain('<options=bold,underscore>fails ensuring</> that');
        $this->getMessage()->shouldContain('<options=bold,underscore>is string</>');
    }

    public function it_can_be_created_with_one_params(Text $text)
    {
        $this->beConstructedThrough('make', [$text, 'isString', ['A']]);
        $this->shouldHaveType(AssertException::class);

        $this->getMessage()->shouldContain('<fg=cyan;options=bold>[Double\PlanB\Type\Text\Text');
        $this->getMessage()->shouldContain('<options=bold,underscore>fails ensuring</> that');
        $this->getMessage()->shouldContain('<options=bold,underscore>is string</>');
        $this->getMessage()->shouldContain('<fg=green>"A"</>');
    }


    public function it_can_be_created_with_two_params(Text $text)
    {
        $this->beConstructedThrough('make', [$text, 'isString', ['A', 'B']]);
        $this->shouldHaveType(AssertException::class);

        $this->getMessage()->shouldContain('<fg=cyan;options=bold>[Double\PlanB\Type\Text\Text');
        $this->getMessage()->shouldContain('<options=bold,underscore>fails ensuring</> that');
        $this->getMessage()->shouldContain('<options=bold,underscore>is string</>');
        $this->getMessage()->shouldContain('<fg=green>"A"</>');
        $this->getMessage()->shouldContain('<fg=green>"B"</>');
    }
}
