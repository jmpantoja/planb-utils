<?php

namespace spec\PlanB\DS\ArrayList\Utilities;

use PlanB\DS\ArrayList\Collection;

use PhpSpec\ObjectBehavior;
use PlanB\DS\ArrayList\Exception\EmptyArgumentException;
use PlanB\DS\ArrayList\Exception\InvalidValueTypeException;
use PlanB\DS\ArrayList\Utilities\CollectionBuilder;
use Prophecy\Argument;
use spec\PlanB\DS\ArrayList\Stub\Word;

class CollectionBuilderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CollectionBuilder::class);
    }

    public function it_can_create_a_collection_by_type()
    {
        $response = $this->fromType('string');
        $response->shouldHaveType(Collection::class);
    }

    public function it_can_create_a_collection_by_value_type()
    {
        $response = $this->fromValueType('dummy');

        $response->shouldHaveType(Collection::class);
        $response->getType('string');
    }

    public function it_can_create_a_collection_by_object_type()
    {
        $word = Word::fromString('dummy');

        $response = $this->fromValueType($word);

        $response->shouldHaveType(Collection::class);
        $response->getType(Word::class);
    }


    public function it_can_create_a_collection_by_array()
    {
        $input = [
            Word::fromString('item A'),
            Word::fromString('item B'),
            Word::fromString('item C')
        ];

        $response = $this->fromArray($input);

        $response->getType()->shouldReturn(Word::class);
        $response->count()->shouldReturn(3);

        $response->get(0)->__toString('item A');
        $response->get(1)->__toString('item B');
        $response->get(2)->__toString('item C');
    }


    public function it_throws_an_exception_when_create_from_an_invalid_array()
    {
        $input = [
            Word::fromString('item A'),
            'se esperaba un objeto tipo Word',
            Word::fromString('item C')
        ];

        $this->shouldThrow(InvalidValueTypeException::class)->duringFromArray($input);
    }


    public function it_throws_an_exception_when_create_from_an_empty_array()
    {
        $input = [];

        $this->shouldThrow(\InvalidArgumentException::class)->duringFromArray($input);
        $this->shouldThrow(EmptyArgumentException::class)->duringFromArray($input);
    }

}
