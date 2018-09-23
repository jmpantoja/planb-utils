<?php

namespace spec\PlanB\Type\DataType;

use PlanB\Type\DataType\DataType;
use PlanB\Type\DataType\DataTypeAssurance;
use PhpSpec\ObjectBehavior;
use PlanB\Type\DataType\Type;
use Prophecy\Argument;

class DataTypeAssuranceSpec extends ObjectBehavior
{
    public function let(DataType $dataType)
    {
        $dataType->__toString()->willReturn(Type::STRING);
        $this->beConstructedThrough('make', [$dataType]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DataTypeAssurance::class);
    }

    public function it_can_retrive_evaluated_object()
    {
        $this->end()->stringify()->shouldReturn(Type::STRING);
    }

    public function it_can_be_stringify()
    {
        $this->__toString()->shouldReturn(Type::STRING);
    }
}
