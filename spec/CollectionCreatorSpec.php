<?php

namespace spec\PlanB\Type;

use PlanB\Type\Collection;
use PlanB\Type\CollectionCreator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\PlanB\Type\Stub\Word;

class CollectionCreatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CollectionCreator::class);
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
}
