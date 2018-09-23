<?php

namespace spec\PlanB\Type\Assurance;

use PlanB\Type\Assurance\AssuranceCall;
use PhpSpec\ObjectBehavior;
use PlanB\Type\Assurance\Exception\InvalidAssuranceMethodException;
use PlanB\Type\Text\Text;
use Prophecy\Argument;

class AssuranceCallSpec extends ObjectBehavior
{
    private const INVALID_METHOD = 'InvalidMethod';

    public function let(Text $text)
    {
        $this->beConstructedThrough('make', [$text]);
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
            ->duringExecute(self::INVALID_METHOD);
    }

    public function it_refuse_an_unexists_method()
    {
        $this->shouldThrow(InvalidAssuranceMethodException::class)
            ->duringExecute('isNotExists');

        $this->shouldThrow(InvalidAssuranceMethodException::class)
            ->duringExecute('hasNotExists');
    }
}
