<?php

namespace spec\PlanB\DS\TypedList\Resolver;

use PlanB\DS\TypedList\Resolver\TypeValidator;
use PhpSpec\ObjectBehavior;
use PlanB\Type\Assurance\Exception\AssertException;
use Prophecy\Argument;

class TypeValidatorSpec extends ObjectBehavior
{
    private const TYPE = 'string';
    private const VALID_VALUE = 'valor correcto, por que es una cadena';
    private const INVALID_VALUE = 9145745;

    private const INVALID_TYPE = 'invalid-type';

    public function let()
    {
        $this->beConstructedThrough('create', [self::TYPE]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TypeValidator::class);
    }

    public function it_throw_an_exception_when_create_with_an_invalid_type()
    {
        $this->beConstructedThrough('create', [self::INVALID_TYPE]);
        $this->shouldThrow(AssertException::class)->duringInstantiation();
    }

    public function it_can_validate_a_value()
    {
        $this->validate(self::VALID_VALUE)->shouldReturn(true);
    }

    public function it_can_refuse_a_value()
    {
        $this->validate(self::INVALID_VALUE)->shouldReturn(false);
    }

}
