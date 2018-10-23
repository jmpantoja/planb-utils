<?php

namespace spec\PlanB\Type\Number;

use PlanB\Type\Assurance\Exception\AssertException;
use PlanB\Type\Number\Number;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NumberSpec extends ObjectBehavior
{
    private const INT_ZERO = 0;

    private const DOUBLE_ZERO = 0.0;

    private const BAD_VALUE = 'bad value';

    private const INTEGER = 100;
    private const DOUBLE = 100.0;


    public function let()
    {
        $this->beConstructedThrough('zero');
    }

    public function build($number)
    {
        $this->beConstructedThrough('make', [$number]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Number::class);
    }

    public function it_retrieve_zero_when_create_empty()
    {
        $this->toInteger()->shouldReturn(self::INT_ZERO);
        $this->toDouble()->shouldReturn(self::DOUBLE_ZERO);
    }

    public function it_throws_an_exception_when_create_with_not_numeric_value()
    {
        $this->build(self::BAD_VALUE);
        $this->shouldThrow(AssertException::class)->duringInstantiation();
    }

    public function it_can_convert_an_integer_to_double()
    {
        $this->build(self::INTEGER);
        $this->toDouble()->shouldReturn(self::DOUBLE);
        $this->toFloat()->shouldReturn(self::DOUBLE);
    }

    public function it_can_convert_a_double_to_integer()
    {
        $this->build(self::DOUBLE);
        $this->toInteger()->shouldReturn(self::INTEGER);
        $this->toInt()->shouldReturn(self::INTEGER);
    }

    public function it_can_determine_if_is_positive()
    {
        $this->build(self::DOUBLE);
        $this->isPositive()->shouldReturn(true);
        $this->isNegative()->shouldReturn(false);
    }

    public function it_can_determine_if_is_negative()
    {
        $this->build(-self::DOUBLE);
        $this->isPositive()->shouldReturn(false);
        $this->isNegative()->shouldReturn(true);
    }

    public function it_can_determine_that_zero_is_neither_positive_nor_negative()
    {
        $this->build(-self::INT_ZERO);
        $this->isPositive()->shouldReturn(false);
        $this->isNegative()->shouldReturn(false);
    }

    public function it_can_determine_if_value_is_integer()
    {
        $this->build(self::INT_ZERO);
        $this->isInteger()->shouldReturn(true);
        $this->isDouble()->shouldReturn(false);
    }

    public function it_can_determine_if_value_is_double()
    {
        $this->build(self::DOUBLE_ZERO);
        $this->isInteger()->shouldReturn(false);
        $this->isDouble()->shouldReturn(true);
    }

    public function it_determine_if_two_numbers_are_equals()
    {
        $this->beConstructedThrough('make', [1235]);

        $this->equals(Number::make(1235))->shouldReturn(true);

        $this->equals(Number::make(1235.0))->shouldReturn(false);

        $this->equals(1235)->shouldReturn(false);

    }

    public function it_retrieve_a_hash()
    {
        $this->beConstructedThrough('make', [1235]);

        $this->hash()->shouldReturn(1235);


    }
}
