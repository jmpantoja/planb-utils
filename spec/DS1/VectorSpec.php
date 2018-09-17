<?php

namespace spec\PlanB\DS1;

use PlanB\DS1\Collection;
use PlanB\DS1\Sequence;
use PlanB\DS1\Vector;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\PlanB\DS1\Traits\TraitArray;
use spec\PlanB\DS1\Traits\TraitCollection;
use spec\PlanB\DS1\Traits\TraitConverts;
use spec\PlanB\DS1\Traits\TraitSequence;

class VectorSpec extends ObjectBehavior
{
    protected const VALUE_A = 'value A';
    protected const VALUE_B = 'value B';
    protected const VALUE_C = 'value C';
    protected const VALUE_D = 'value D';
    protected const VALUE_E = 'value E';
    protected const VALUE_F = 'value F';

    use TraitSequence;
    use TraitCollection;
    use TraitArray;
    use TraitConverts;

    public function let()
    {
        $this->beConstructedThrough('make');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Vector::class);
        $this->shouldHaveType(Sequence::class);
        $this->shouldHaveType(Collection::class);

    }
}
