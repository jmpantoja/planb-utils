<?php

declare(strict_types=1);

namespace spec\PlanB\DS\ItemList;


use PhpSpec\ObjectBehavior;
use PlanB\DS\ItemList\Exception\InvalidItemException;
use PlanB\DS\ItemList\ItemList;
use PlanB\Type\Text\Text;
use spec\PlanB\DS\ItemList\Fake\FakeList;

class CustomizeListSpec extends ObjectBehavior
{

    private const KEY = 'a';

    private const VALUE = 'ABC';

    public function let()
    {
        $this->beAnInstanceOf(FakeList::class);
        $this->beConstructedThrough('create');
    }

    public function it_can_resolve_an_item()
    {
        $this->set(self::KEY, self::VALUE);
        $this->get(self::KEY)
            ->shouldHaveType(Text::class);

        $this->get(self::KEY)
            ->stringify()
            ->shouldReturn(self::VALUE);

    }
}
