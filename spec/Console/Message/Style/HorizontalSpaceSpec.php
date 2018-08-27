<?php

namespace spec\PlanB\Console\Message\Style;

use PlanB\Console\Message\Style\HorizontalSpace;
use PhpSpec\ObjectBehavior;
use PlanB\Type\Assurance\Exception\AssertException;
use PlanB\Type\Text\Text;
use Prophecy\Argument;

class HorizontalSpaceSpec extends ObjectBehavior
{

    private const NEGATIVE = -10;
    private const POSITIVE = 5;

    private const LEFT_SPACES = 10;
    private const RIGHT_SPACES = 5;

    private const LEFT = '          ';
    private const MERGED_LEFT = '               ';
    private const MERGED_RIGHT = '          ';


    protected function build(int $left = 0, int $right = null): void
    {
        $this->beConstructedThrough('create', [$left, $right]);
    }

    public function it_is_initializable()
    {
        $this->build();
        $this->shouldHaveType(HorizontalSpace::class);
    }

    public function it_left_and_right_must_be_empty_when_create_without_parameters()
    {
        $this->build();
        $this->left()->shouldReturn(Text::EMPTY_TEXT);
        $this->right()->shouldReturn(Text::EMPTY_TEXT);
    }

    public function it_throws_an_exception_when_created_with_a_negative_value()
    {
        $this->build(self::NEGATIVE);
        $this->shouldThrow(AssertException::class)->duringInstantiation();
    }

    public function it_throws_an_exception_when_created_with_a_negative_value_for_right()
    {
        $this->build(self::LEFT_SPACES, self::NEGATIVE);
        $this->shouldThrow(AssertException::class)->duringInstantiation();
    }

    public function it_left_and_right_must_be_equals_when_created_with_one_parameter()
    {
        $this->build(self::LEFT_SPACES);

        $this->left()->shouldReturn(self::LEFT);
        $this->right()->shouldReturn(self::LEFT);
    }

    public function it_can_be_mergered()
    {
        $space = HorizontalSpace::create(self::POSITIVE);

        $this->build(self::LEFT_SPACES, self::RIGHT_SPACES);
        $merged = $this->merge($space);


        $merged->left()->shouldReturn(self::MERGED_LEFT);
        $merged->right()->shouldReturn(self::MERGED_RIGHT);
    }
}
