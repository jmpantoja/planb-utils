<?php

namespace spec\PlanB\DS\PriorityQueue;

use PlanB\DS\PriorityQueue\PriorityQueue;
use PlanB\DS\PriorityQueue\PriorityQueueBuilder;
use PlanB\DS\Queue;
use PlanB\DS\QueueBuilder;
use PlanB\DS\Stack;
use PlanB\DS\StackBuilder;
use PhpSpec\ObjectBehavior;
use PlanB\Type\Text\Text;
use Prophecy\Argument;
use spec\PlanB\DS\Traits\TraitBuilder;

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
