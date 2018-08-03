<?php

namespace spec\PlanB\Utils\Assurance;

use PlanB\Utils\Assurance\AssuranceCall;
use PhpSpec\ObjectBehavior;
use PlanB\Utils\Assurance\Exception\InvalidAssuranceMethodException;
use PlanB\ValueObject\Text\Text;
use Prophecy\Argument;

class AssuranceCallSpec extends ObjectBehavior
{
    public function let(Text $text)
    {
        $this->beConstructedThrough('create', [$text]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(AssuranceCall::class);
    }


    public function it_can_retrive_the_wrapped_object()
    {
        $this->getEvaluatedObject()->shouldHaveType(Text::class);
    }

    public function it_can_execute_a_method(Text $text)
    {
        $text->isEmpty()->willReturn(true);
        $this->execute('isEmpty')->shouldReturn(true);
    }

    public function it_can_execute_a_negative_method(Text $text)
    {
        $text->isEmpty()->willReturn(true);
        $this->execute('isNotEmpty')->shouldReturn(false);
    }

    public function it_refuse_an_invalid_method()
    {
        $this->shouldThrow(InvalidAssuranceMethodException::class)
            ->duringExecute('InvalidMethod');
    }

    public function it_refuse_an_unexists_method()
    {
        $this->shouldThrow(InvalidAssuranceMethodException::class)
            ->duringExecute('isNotExists');

        $this->shouldThrow(InvalidAssuranceMethodException::class)
            ->duringExecute('hasNotExists');
    }
}