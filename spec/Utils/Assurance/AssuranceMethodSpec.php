<?php

namespace spec\PlanB\Utils\Assurance;

use PlanB\Utils\Assurance\AssuranceMethod;
use PhpSpec\ObjectBehavior;
use PlanB\Utils\Assurance\Exception\InvalidAssuranceMethodException;
use PlanB\ValueObject\Path\Path;
use PlanB\ValueObject\Text\Text;
use PlanB\ValueObject\Text\TextAssurance;
use Prophecy\Argument;

class AssuranceMethodSpec extends ObjectBehavior
{
    private const FAKE_METHOD = 'FakeMethod';

    public function it_is_initializable(Path $path)
    {
        $this->beConstructedThrough('create', [$path, 'isEmpty']);
        $this->shouldHaveType(AssuranceMethod::class);
    }

    public function it_can_build_over_an_valid_is_method(Path $path)
    {
        $this->beConstructedThrough('create', [$path, 'isFile']);

        $this->getCallable()->shouldReturn([$path, 'isFile']);
        $this->getExpected()->shouldReturn(true);

    }

    public function it_can_build_over_an_valid_inverted_is_method(Path $path)
    {
        $this->beConstructedThrough('create', [$path, 'isNotFile']);

        $this->getCallable()->shouldReturn([$path, 'isFile']);
        $this->getExpected()->shouldReturn(false);
    }

    public function it_can_build_over_an_valid_has_method(Path $path)
    {
        $this->beConstructedThrough('create', [$path, 'hasExtension']);

        $this->getCallable()->shouldReturn([$path, 'hasExtension']);
        $this->getExpected()->shouldReturn(true);
    }

    public function it_can_build_over_an_valid_inverted_has_method(Path $path)
    {
        $this->beConstructedThrough('create', [$path, 'hasNotExtension']);

        $this->getCallable()->shouldReturn([$path, 'hasExtension']);
        $this->getExpected()->shouldReturn(false);
    }

    public function it_reject_an_invalid_method(Path $path)
    {
        $this->beConstructedThrough('create', [$path, 'getBasename']);
        $this->shouldThrow(InvalidAssuranceMethodException::class)->duringInstantiation();
    }

    public function it_reject_an_unexits_method(Path $path)
    {
        $this->beConstructedThrough('create', [$path, self::FAKE_METHOD]);
        $this->shouldThrow(InvalidAssuranceMethodException::class)->duringInstantiation();
    }

}
