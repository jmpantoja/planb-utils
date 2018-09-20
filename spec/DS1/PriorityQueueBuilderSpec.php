<?php

namespace spec\PlanB\DS1;

use PlanB\DS1\PriorityQueue;
use PlanB\DS1\PriorityQueueBuilder;
use PlanB\DS1\Queue;
use PlanB\DS1\QueueBuilder;
use PlanB\DS1\Stack;
use PlanB\DS1\StackBuilder;
use PhpSpec\ObjectBehavior;
use PlanB\Type\Text\Text;
use Prophecy\Argument;
use spec\PlanB\DS1\Traits\TraitBuilder;

class PriorityQueueBuilderSpec extends ObjectBehavior
{
    protected const VALUE_A = 'value A';
    protected const VALUE_B = 'value B';
    protected const VALUE_C = 'value C';
    protected const VALUE_D = 'value D';

    protected const TARGET_CLASSNAME = PriorityQueue::class;

    use TraitBuilder;

    function it_is_initializable()
    {
        $this->shouldHaveType(PriorityQueueBuilder::class);
    }

}
