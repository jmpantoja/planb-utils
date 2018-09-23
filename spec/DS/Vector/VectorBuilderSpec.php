<?php

namespace spec\PlanB\DS\Vector;


use PhpSpec\ObjectBehavior;
use PlanB\DS\Vector\Vector;
use PlanB\DS\Vector\VectorBuilder;
use spec\PlanB\DS\Traits\TraitBuilder;

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
