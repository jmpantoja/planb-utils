<?php

namespace spec\PlanB\Type\Validator;

use PhpSpec\Exception\Exception;
use PlanB\Type\Validator\InstanceOfValidator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InstanceOfValidatorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedForType(InstanceOfValidator::class);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstanceOfValidator::class);
    }

    public function it_accept_classnames()
    {
        $this->isValidType(__CLASS__)->shouldReturn(true);
    }


    public function it_accept_interfaces()
    {
        $this->isValidType(\Throwable::class)->shouldReturn(true);
    }

    public function it_refuse_other_values()
    {
        $this->isValidType('array')->shouldReturn(false);
        $this->isValidType('bool')->shouldReturn(false);
        $this->isValidType('callable')->shouldReturn(false);
        $this->isValidType('double')->shouldReturn(false);
        $this->isValidType('float')->shouldReturn(false);
        $this->isValidType('int')->shouldReturn(false);
        $this->isValidType('integer')->shouldReturn(false);
        $this->isValidType('iterable')->shouldReturn(false);
        $this->isValidType('long')->shouldReturn(false);
        $this->isValidType('null')->shouldReturn(false);
        $this->isValidType('object')->shouldReturn(false);
        $this->isValidType('numeric')->shouldReturn(false);
        $this->isValidType('real')->shouldReturn(false);
        $this->isValidType('resource')->shouldReturn(false);
        $this->isValidType('scalar')->shouldReturn(false);
        $this->isValidType('string')->shouldReturn(false);
    }


    public function it_validate_against_classname()
    {
        $this->beConstructedForType(InstanceOfValidator::class);

        $this->validate($this)->shouldReturn(true);
        $this->validate(new Exception())->shouldReturn(false);
    }


    public function it_validate_against_interfacename()
    {
        $this->beConstructedForType(\Throwable::class);

        $this->validate($this)->shouldReturn(false);
        $this->validate(new Exception())->shouldReturn(true);
    }
}
