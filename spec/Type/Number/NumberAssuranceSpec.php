<?php

namespace spec\PlanB\Type\Number;

use PlanB\Type\Assurance\Assurance;
use PlanB\Type\Number\NumberAssurance;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NumberAssuranceSpec extends ObjectBehavior
{
    private const NUMBER = 123;

    public function let()
    {
        $this->beConstructedThrough('make', [self::NUMBER]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(NumberAssurance::class);
    }

    public function it_is_assurance()
    {
        $this->shouldHaveType(Assurance::class);
    }

    public function it_can_retrieve_the_number_object()
    {
        $this->end()
            ->toInteger()
            ->shouldReturn(self::NUMBER);
    }
}
