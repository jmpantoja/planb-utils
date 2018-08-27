<?php

namespace spec\PlanB\Console\Message\Style;

use MabeEnum\Enum;
use PhpSpec\ObjectBehavior;
use PlanB\Console\Message\Style\Align;

class AlignSpec extends ObjectBehavior
{
    public function let()
    {

        $this->beConstructedThrough('get', [Align::LEFT]);
    }

    public function it_is_intializable()
    {
        $this->shouldHaveType(Enum::class);
        $this->shouldHaveType(Align::class);

    }

    public function it_have_required_names()
    {
        $this->getNames()->shouldIterateAs([
                0 => "LEFT",
                1 => "CENTER",
                2 => "RIGHT",
                3 => "DEFAULT"
            ]
        );
    }

    public function it_can_accurate_the_default_value()
    {
        $this->beConstructedThrough('get', [Align::DEFAULT]);

        $this->getAccurateValue()->shouldReturn(Align::LEFT);
    }

    public function it_can_accurate_a_regular_value()
    {
        $this->beConstructedThrough('get', [Align::CENTER]);

        $this->getAccurateValue()->shouldReturn(Align::CENTER);
    }


    public function it_determine_if_is_default_value()
    {
        $this->beConstructedThrough('get', [Align::DEFAULT]);

        $this->isDefault()->shouldReturn(true);

    }

    public function it_determine_if_is_not_default_value()
    {
        $this->beConstructedThrough('get', [Align::RIGHT]);

        $this->isDefault()->shouldReturn(false);

    }
}
