<?php

namespace spec\PlanB\Utils\Hydrator;

use PlanB\Utils\Hydrator\GetSetHydrator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GetSetHydratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('create');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GetSetHydrator::class);
    }


    public function it_can_converts_an_array_into_an_object()
    {
        $this->hydrate(Dummy::class, [
            'name' => 'pepe'
        ])
            ->getName()
            ->shouldReturn('pepe');
    }

    public function it_converts_keys_to_camelcase_before_hydrate()
    {
        $this->hydrate(Dummy::class, [
            'last-name' => 'garcia'
        ])
            ->getLastName()
            ->shouldReturn('garcia');
    }
}
