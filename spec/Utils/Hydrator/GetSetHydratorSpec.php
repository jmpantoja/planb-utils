<?php

namespace spec\PlanB\Utils\Hydrator;

use PlanB\Utils\Hydrator\GetSetHydrator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use \spec\PlanB\Utils\Hydrator\Fake\FakePerson;
use \spec\PlanB\Utils\Hydrator\Fake\FakeIterator;

class GetSetHydratorSpec extends ObjectBehavior
{
    private const NAME = 'pepe';

    private const LAST_NAME = 'garcia';

    public function let()
    {
        $this->beConstructedThrough('create');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GetSetHydrator::class);
    }


    public function it_can_converts_an_array_into_an_object()
    {
        $this->hydrate(FakePerson::class, [
            'name' => self::NAME
        ])
            ->getName()
            ->shouldReturn(self::NAME);
    }

    public function it_can_hydrate_an_exists_object(FakePerson $person)
    {
        $person->setName(self::NAME)->shouldBeCalledTimes(1);

        $this->hydrate($person, [
            'name' => self::NAME
        ]);
    }

    public function it_converts_keys_to_camelcase_before_hydrate()
    {
        $this->hydrate(FakePerson::class, [
            'last-name' => self::LAST_NAME
        ])
            ->getLastName()
            ->shouldReturn(self::LAST_NAME);
    }

    public function it_can_converts_an_object_into_an_array()
    {
        $dummy = new FakePerson ();
        $dummy->setName(self::NAME);
        $dummy->setLastName(self::LAST_NAME);

        $this->extract($dummy)
            ->shouldReturn([
                'name' => self::NAME,
                'last_name' => self::LAST_NAME
            ]);
    }

    public function it_can_converts_an_iterable_object_into_an_array()
    {
        $dummy = new FakeIterator();
        $dummy->setName(self::NAME);
        $dummy->setLastName(self::LAST_NAME);

        $this->extract($dummy)
            ->shouldReturn([
                'name' => self::NAME,
                'last_name' => self::LAST_NAME
            ]);
    }


    public function it_can_converts_an_object_into_an_array_formating_keys_to_snake_case()
    {
        $dummy = new FakePerson ();
        $dummy->setName(self::NAME);
        $dummy->setLastName(self::LAST_NAME);

        $this->extract($dummy, '-')
            ->shouldReturn([
                'name' => self::NAME,
                'last-name' => self::LAST_NAME
            ]);
    }

}
