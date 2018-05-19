<?php

namespace spec\PlanB\Type\Validator;

use PlanB\Type\Validator\TypeOfValidator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TypeOfValidatorSpec extends ObjectBehavior
{

    public function let()
    {
        $this->beConstructedForType('string');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TypeOfValidator::class);
    }

    public function it_accept_native_types()
    {
        $this->isValidType('array')->shouldReturn(true);
        $this->isValidType('bool')->shouldReturn(true);
        $this->isValidType('callable')->shouldReturn(true);
        $this->isValidType('double')->shouldReturn(true);
        $this->isValidType('float')->shouldReturn(true);
        $this->isValidType('int')->shouldReturn(true);
        $this->isValidType('integer')->shouldReturn(true);
        $this->isValidType('iterable')->shouldReturn(true);
        $this->isValidType('long')->shouldReturn(true);
        $this->isValidType('null')->shouldReturn(true);
        $this->isValidType('object')->shouldReturn(true);
        $this->isValidType('numeric')->shouldReturn(true);
        $this->isValidType('real')->shouldReturn(true);
        $this->isValidType('resource')->shouldReturn(true);
        $this->isValidType('scalar')->shouldReturn(true);
        $this->isValidType('string')->shouldReturn(true);
    }

    public function it_refuse_non_native_types()
    {
        $this->isValidType('basura')->shouldReturn(false);
        $this->isValidType(__CLASS__)->shouldReturn(false);
    }

    public function it_validate_strings()
    {
        $this->validate('esto es una cadena')->shouldReturn(true);
        $this->validate(12313)->shouldReturn(false);
    }

    public function it_can_retrieve_type()
    {
        $this->getType()->shouldReturn('string');
    }
}
