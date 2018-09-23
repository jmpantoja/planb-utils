<?php

namespace spec\PlanB\Type\Assurance;

use PlanB\Type\Assurance\AssuranceMethod;
use PhpSpec\ObjectBehavior;
use PlanB\Type\Assurance\Exception\InvalidAssuranceMethodException;
use PlanB\Type\Path\Path;
use PlanB\Type\Text\Text;
use PlanB\Type\Text\TextAssurance;
use Prophecy\Argument;

class AssuranceMethodSpec extends ObjectBehavior
{
    private const FAKE_METHOD = 'FakeMethod';

    public function it_is_initializable(Path $path)
    {
        $this->beConstructedThrough('make', [$path, 'isEmpty']);
        $this->shouldHaveType(AssuranceMethod::class);
    }

    public function it_can_build_over_an_valid_is_method(Path $path)
    {
        $this->beConstructedThrough('make', [$path, 'isFile']);

        $this->getCallable()->shouldReturn([$path, 'isFile']);
        $this->getExpected()->shouldReturn(true);

    }

    public function it_can_build_over_an_valid_inverted_is_method(Path $path)
    {
        $this->beConstructedThrough('make', [$path, 'isNotFile']);

        $this->getCallable()->shouldReturn([$path, 'isFile']);
        $this->getExpected()->shouldReturn(false);
    }

    public function it_can_build_over_an_valid_has_method(Path $path)
    {
        $this->beConstructedThrough('make', [$path, 'hasExtension']);

        $this->getCallable()->shouldReturn([$path, 'hasExtension']);
        $this->getExpected()->shouldReturn(true);
    }

    public function it_can_build_over_an_valid_inverted_has_method(Path $path)
    {
        $this->beConstructedThrough('make', [$path, 'hasNotExtension']);

        $this->getCallable()->shouldReturn([$path, 'hasExtension']);
        $this->getExpected()->shouldReturn(false);
    }

    public function it_reject_an_invalid_method(Path $path)
    {
        $this->beConstructedThrough('make', [$path, 'getBasename']);
        $this->shouldThrow(InvalidAssuranceMethodException::class)->duringInstantiation();
    }

    public function it_reject_an_unexits_method(Path $path)
    {
        $this->beConstructedThrough('make', [$path, self::FAKE_METHOD]);
        $this->shouldThrow(InvalidAssuranceMethodException::class)->duringInstantiation();
    }

}
