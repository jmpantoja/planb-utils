<?php

namespace spec\PlanB\DS1;

use PlanB\DS1\Deque;
use PlanB\DS1\DequeBuilder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\PlanB\DS1\Traits\TraitBuilder;

class DequeBuilderSpec extends ObjectBehavior
{
    protected const VALUE_A = 'value A';
    protected const VALUE_B = 'value B';
    protected const VALUE_C = 'value C';
    protected const VALUE_D = 'value D';


    protected const TARGET_CLASSNAME = Deque::class;

    use TraitBuilder;

    function it_is_initializable()
    {
        $this->shouldHaveType(DequeBuilder::class);
    }
}
