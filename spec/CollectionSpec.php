<?php

namespace spec\PlanB\Type;

use PlanB\Type\Collection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Collection::class);
    }

    function it_is_countable()
    {
        $this->shouldHaveType(\Countable::class);
    }
}
