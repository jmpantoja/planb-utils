<?php

namespace spec\PlanB\DS1;

use PlanB\DS1\Exception\InvalidArgumentException;
use PlanB\DS1\Vector;
use PlanB\DS1\VectorBuilder;
use PhpSpec\ObjectBehavior;
use PlanB\Type\DataType\Type;
use PlanB\Type\Text\Text;
use PlanB\Type\Value\Value;
use Prophecy\Argument;
use spec\PlanB\DS1\Traits\TraitBuilder;

class VectorBuilderSpec extends ObjectBehavior
{

    protected const VALUE_A = 'value A';
    protected const VALUE_B = 'value B';
    protected const VALUE_C = 'value C';
    protected const VALUE_D = 'value D';

    protected const TARGET_CLASSNAME = Vector::class;

    use TraitBuilder;


    public function it_is_initializable()
    {
        $this->shouldHaveType(VectorBuilder::class);
    }

}
