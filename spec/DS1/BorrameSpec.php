<?php

namespace spec\PlanB\DS1;

use PlanB\DS1\Borrame;
use PhpSpec\ObjectBehavior;
use PlanB\DS1\Vector;
use Prophecy\Argument;

class BorrameSpec extends ObjectBehavior
{

    private function build(string $className): void
    {
        $this->beAnInstanceOf($className);
        $this->beConstructedThrough('make');
    }

    public function it_example_vector()
    {
        $this->build(Vector::class);


        /** @var Vector $vector */
        $vector = Vector::make([]);

        $vector->push('a', 'b');
        $vector->pushAll([
            'c',
            'd'
        ]);

        $vector->set(0, 'e');
        $vector[] = 'f';

        $vector->insert(1, 'g', 'h');
        $vector->unshift('i', 'j');


    }


}
