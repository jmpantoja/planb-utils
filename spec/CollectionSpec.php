<?php

declare(strict_types=1);

namespace spec\PlanB\Type;


use PhpSpec\ObjectBehavior;
use PlanB\Type\Collection;
use spec\PlanB\Type\Stub\Word;

class CollectionSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('string');
    }


    public function it_is_countable()
    {
        $this->shouldHaveType(\Countable::class);
    }

    public function it_count_zero_when_intialize()
    {
        $this->count()->shouldReturn(0);
        $this->isEmpty()->shouldReturn(true);
    }



//
//    public function it_search_method_returns_null_on_fail(){
//
//    }
}
