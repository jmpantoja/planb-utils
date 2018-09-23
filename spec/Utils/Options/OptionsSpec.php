<?php

namespace spec\PlanB\Utils\Options;

use PlanB\Utils\Options\Options;
use PhpSpec\ObjectBehavior;
use PlanB\Utils\Options\Exception\UndefinedProfileException;
use Prophecy\Argument;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use \spec\PlanB\Utils\Options\Fake\FakeOptions;

class OptionsSpec extends ObjectBehavior
{
    private const VALUES = ['color' => 'rojo', 'number' => 10];

    private const NORMALIZED_VALUES = ['color' => 'ROJO', 'number' => 10];

    private const UNDEFINED_PROFILE = 'undefined-profile';

    private const INVALID_VALUES = ['color' => 'esto debería ser un color', 'number' => 'esto debería ser un número'];

    public function let()
    {
        $this->beAnInstanceOf(FakeOptions::class);
        $this->beConstructedThrough('make');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Options::class);
    }

    public function it_have_a_profile_by_default()
    {
        $this->getCurrentProfile()->shouldReturn(Options::DEFAULT_PROFILE);
    }

    public function it_can_initialize_with_a_custom_profile()
    {
        $this->beConstructedThrough('make', [FakeOptions::POSITIVE_PROFILE]);
        $this->getCurrentProfile()->shouldReturn(FakeOptions::POSITIVE_PROFILE);
    }

    public function it_can_throw_an_exception_if_create_with_an_invalid_profile()
    {
        $this->beConstructedThrough('make', [self::UNDEFINED_PROFILE]);

        $this->shouldThrow(UndefinedProfileException::class)->duringInstantiation();
    }

    public function it_can_resolve_a_dataset_with_default_profile()
    {
        $this->resolve(self::VALUES)->shouldReturn(self::NORMALIZED_VALUES);
        $this->resolve(self::VALUES)->shouldReturn(self::NORMALIZED_VALUES);

    }

    public function it_can_resolve_a_invalid_dataset_with_default_profile()
    {
        $this->shouldThrow(InvalidOptionsException::class)->duringResolve(self::INVALID_VALUES);
    }

    public function it_can_resolve_a_dataset_with_custom_profile()
    {
        $this->beConstructedThrough('make', [FakeOptions::POSITIVE_PROFILE]);
        $this->resolve(self::VALUES)->shouldReturn(self::NORMALIZED_VALUES);
    }

    public function it_can_resolve_a_invalid_dataset_with_custom_profile()
    {
        $this->beConstructedThrough('make', [FakeOptions::POSITIVE_PROFILE]);
        $this->shouldThrow(InvalidOptionsException::class)->duringResolve(self::INVALID_VALUES);
    }

}

