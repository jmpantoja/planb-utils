<?php

namespace spec\PlanB\Console\Message\Style;

use PlanB\Console\Message\Style\Align;
use PlanB\Console\Message\Style\Position;
use PhpSpec\ObjectBehavior;
use PlanB\Type\Assurance\Exception\AssertException;
use Prophecy\Argument;

class PositionSpec extends ObjectBehavior
{

    private const WIDTH = 100;

    private const NEGATIVE = -100;
    private const FAKE_ALIGN = 'xxxx';

    public function let()
    {
        $this->beConstructedThrough('create');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Position::class);
    }

    public function it_retrieve_width_zero_by_default()
    {
        $this->getWidth()->shouldReturn(0);
    }

    public function it_retrieve_align_left_by_default()
    {
        $this->getAlign()->shouldReturn(Align::DEFAULT());
    }

    public function it_throws_an_exception_if_width_is_nefative()
    {
        $this->beConstructedThrough('create', [self::NEGATIVE]);

        $this->shouldThrow(AssertException::class)->duringInstantiation();
    }

    public function it_throws_an_exception_if_align_is_invalid()
    {
        $this->beConstructedThrough('create', [self::WIDTH, self::FAKE_ALIGN]);

        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }

    public function it_can_be_merged_with_new_width(Position $position)
    {
        $position->getAlign()->willReturn(Align::LEFT());
        $position->getWidth()->willReturn(self::WIDTH);

        $merged = $this->blend($position);

        $this->getWidth()->shouldReturn(0);
        $merged->getWidth()->shouldReturn(self::WIDTH);

    }

    public function it_can_be_merged_with_new_align(Position $position)
    {
        $position->getAlign()->willReturn(Align::CENTER());
        $position->getWidth()->willReturn(self::WIDTH);

        $merged = $this->blend($position);

        $this->getAlign()->shouldReturn(Align::DEFAULT());
        $merged->getAlign()->shouldReturn(Align::CENTER());
    }
}
