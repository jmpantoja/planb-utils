<?php

namespace spec\PlanB\DS\Set;

use PhpSpec\ObjectBehavior;
use PlanB\DS\Set\Set;
use PlanB\DS\Set\SetBuilder;
use PlanB\DS\VectorBuilder;
use spec\PlanB\DS\Traits\TraitBuilder;

class SetBuilderSpec extends ObjectBehavior
{

    protected const VALUE_A = 'value A';
    protected const VALUE_B = 'value B';
    protected const VALUE_C = 'value C';
    protected const VALUE_D = 'value D';

    protected const TARGET_CLASSNAME = Set::class;

    use TraitBuilder;


    public function it_is_initializable()
    {
        $this->shouldHaveType(SetBuilder::class);
    }

}
