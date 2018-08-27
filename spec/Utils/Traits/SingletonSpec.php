<?php

namespace spec\PlanB\Utils\Traits;

use PlanB\Utils\Traits\Singleton;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SingletonSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beAnInstanceOf(SingletonStub::class);
        $this->beConstructedThrough('getInstance');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SingletonStub::class);
    }

    public function it_is_singleton()
    {
        $this->getInstance()->shouldReturn($this);
    }

    public function it_is_not_clonable()
    {
        $this->callClone()->shouldBeLike($this);
        $this->callWakeUp()->shouldReturn(null);
    }

}
