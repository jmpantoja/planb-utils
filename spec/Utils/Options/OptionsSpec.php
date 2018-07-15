<?php

namespace spec\PlanB\Utils\Options;

use PlanB\Utils\Options\Options;
use PhpSpec\ObjectBehavior;
use PlanB\Utils\Options\Exception\UndefinedProfileException;
use Prophecy\Argument;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;


class OptionsSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beAnInstanceOf(DummyOptions::class);
        $this->beConstructedThrough('create');
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
        $this->beConstructedThrough('create', ['positive-numbers']);
        $this->getCurrentProfile()->shouldReturn('positive-numbers');
    }

    public function it_can_throw_an_exception_if_create_with_an_invalid_profile()
    {
        $this->beConstructedThrough('create', ['undefined-profile']);
        $this->shouldThrow(UndefinedProfileException::class)->duringInstantiation();
    }

    public function it_can_resolve_a_dataset_with_default_profile()
    {
        $values = ['color' => 'rojo', 'number' => 10];

        $this->resolve($values)->shouldReturn(['color' => 'ROJO', 'number' => 10]);
        $this->resolve($values)->shouldReturn(['color' => 'ROJO', 'number' => 10]);

    }

    public function it_can_resolve_a_invalid_dataset_with_default_profile()
    {
        $values = ['color' => 'esto debería ser un color', 'number' => 'esto debería ser un número'];

        $this->shouldThrow(InvalidOptionsException::class)->duringResolve($values);
    }

    public function it_can_resolve_a_dataset_with_custom_profile()
    {
        $this->beConstructedThrough('create', ['positive-numbers']);

        $values = ['color' => 'rojo', 'number' => 10];

        $this->resolve($values)->shouldReturn(['color' => 'ROJO', 'number' => 10]);
    }

    public function it_can_resolve_a_invalid_dataset_with_custom_profile()
    {
        $this->beConstructedThrough('create', ['positive-numbers']);

        $values = ['color' => 'rojo', 'number' => -100];

        $this->shouldThrow(InvalidOptionsException::class)->duringResolve($values);
    }

}

