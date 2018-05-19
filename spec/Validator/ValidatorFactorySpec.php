<?php

namespace spec\PlanB\Type\Validator;

use PlanB\Type\Validator\InstanceOfValidator;
use PlanB\Type\Validator\TypeOfValidator;
use PlanB\Type\Validator\Validator;
use PlanB\Type\Validator\ValidatorFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ValidatorFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(ValidatorFactory::class);
    }

    public function it_can_create_a_validator_by_classname()
    {
        $this->factory(__CLASS__)->shouldHaveType(InstanceOfValidator::class);
    }

    public function it_can_create_a_validator_by_interface()
    {
        $this->factory(Validator::class)->shouldHaveType(InstanceOfValidator::class);
    }


    public function it_can_create_a_validator_by_native()
    {
        $this->factory('string')->shouldHaveType(TypeOfValidator::class);
    }
}
