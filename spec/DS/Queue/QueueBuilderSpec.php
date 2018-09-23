<?php

namespace spec\PlanB\DS\Queue;

use PhpSpec\ObjectBehavior;
use PlanB\DS\Queue\Queue;
use PlanB\DS\Queue\QueueBuilder;
use PlanB\DS\StackBuilder;
use spec\PlanB\DS\Traits\TraitBuilder;

class QueueBuilderSpec extends ObjectBehavior
{
    protected const VALUE_A = 'value A';
    protected const VALUE_B = 'value B';
    protected const VALUE_C = 'value C';
    protected const VALUE_D = 'value D';

    protected const TARGET_CLASSNAME = Queue::class;

    use TraitBuilder;

    function it_is_initializable()
    {
        $this->shouldHaveType(QueueBuilder::class);
    }

}
