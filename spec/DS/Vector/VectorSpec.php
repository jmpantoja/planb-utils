<?php

namespace spec\PlanB\DS\Vector;

use PhpSpec\ObjectBehavior;
use PlanB\DS\Collection;
use PlanB\DS\Sequence;
use PlanB\DS\Vector\Vector;
use PlanB\Type\DataType\DataType;
use PlanB\Type\DataType\Type;
use spec\PlanB\DS\Traits\TraitArray;
use spec\PlanB\DS\Traits\TraitCollection;
use spec\PlanB\DS\Traits\TraitConverts;
use spec\PlanB\DS\Traits\TraitSequence;

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

    public function it_can_be_created_with_a_type()
    {
        $this->beConstructedThrough('typed', [Type::NUMERIC]);

        $this->getInnerType()->shouldBeLike(
            DataType::make(Type::NUMERIC)
        );
    }


    public function it_borrame()
    {

        $this[] = 'aaaa';

    }
}
