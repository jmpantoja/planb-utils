<?php

namespace spec\PlanB\Beautifier\Parser;

use PlanB\Beautifier\Parser\AttributeList;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AttributeListSpec extends ObjectBehavior
{

    public function build(array $input = [])
    {
        $this->beConstructedThrough('make', [$input]);
    }

    public function it_is_initializable()
    {
        $this->build([]);
        $this->shouldHaveType(AttributeList::class);
    }

    public function it_transform_an_array_to_a_string()
    {
        $this->build([
            'keyA' => 'valueA'
        ]);

        $this->stringify()->shouldReturn('keyA=valueA');
    }

    public function it_transform_a_two_levels_array_to_a_string()
    {
        $this->build([
            'keyA' => 'valueA',
            'keyB' => [
                'valueB',
                'valueC'
            ]
        ]);

        $this->stringify()->shouldReturn('keyA=valueA;keyB=valueB,valueC');
    }
}
