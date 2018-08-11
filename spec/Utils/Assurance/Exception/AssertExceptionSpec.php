<?php

namespace spec\PlanB\Utils\Assurance\Exception;

use PlanB\Utils\Assurance\Exception\AssertException;
use PhpSpec\ObjectBehavior;
use PlanB\ValueObject\Text\Text;
use Prophecy\Argument;


class AssertExceptionSpec extends ObjectBehavior
{
    public function let(Text $text)
    {
        $text->__toString()->willReturn('Texto');
    }

    public function it_can_be_created(Text $text)
    {
        $this->beConstructedThrough('create', [$text, 'isString', []]);
        $this->shouldHaveType(AssertException::class);

        $this->getMessage()->shouldContain('<fg=cyan>[Double\PlanB\ValueObject\Text\Text');
        $this->getMessage()->shouldContain('<options=bold,underscore>fails ensuring</> that');
        $this->getMessage()->shouldContain('<options=bold,underscore>is string</> <fg=green></>');
    }

    public function it_can_be_created_with_one_params(Text $text)
    {
        $this->beConstructedThrough('create', [$text, 'isString', ['A']]);
        $this->shouldHaveType(AssertException::class);

        $this->getMessage()->shouldContain('<fg=cyan>[Double\PlanB\ValueObject\Text\Text');
        $this->getMessage()->shouldContain('<options=bold,underscore>fails ensuring</> that');
        $this->getMessage()->shouldContain('<options=bold,underscore>is string</>');
        $this->getMessage()->shouldContain('<fg=green>([string: "A"])</>');
    }


    public function it_can_be_created_with_two_params(Text $text)
    {
        $this->beConstructedThrough('create', [$text, 'isString', ['A', 'B']]);
        $this->shouldHaveType(AssertException::class);

        $this->getMessage()->shouldContain('<fg=cyan>[Double\PlanB\ValueObject\Text\Text');
        $this->getMessage()->shouldContain('<options=bold,underscore>fails ensuring</> that');
        $this->getMessage()->shouldContain('<options=bold,underscore>is string</>');
        $this->getMessage()->shouldContain('<fg=green>([string: "A"], [string: "B"])</>');
    }
}
