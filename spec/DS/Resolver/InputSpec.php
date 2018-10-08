<?php

namespace spec\PlanB\DS\Resolver;

use PlanB\DS\Exception\InvalidArgumentException;
use PlanB\DS\Resolver\Input;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InputSpec extends ObjectBehavior
{
    protected const ORIGINAL = 'value';

    protected const RESPONSE = 'respuesta';

    protected const OTHER_RESPONSE = 'other_response';

    public function let()
    {
        $this->beConstructedThrough('make', [self::ORIGINAL]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Input::class);
    }

    public function it_is_valid_by_default()
    {
        $this->isValid()->shouldReturn(true);
    }

    public function it_retrieve_the_value()
    {
        $this->value()->shouldReturn(self::ORIGINAL);
    }

    public function it_can_be_resolved_with_a_response()
    {
        $this->resolve(self::RESPONSE);

        $this->isValid()->shouldReturn(true);
        $this->value()->shouldReturn(self::RESPONSE);
    }

    public function it_dont_change_value_when_is_resolved_with_null()
    {
        $this->resolve(null);

        $this->isValid()->shouldReturn(true);
        $this->value()->shouldReturn(self::ORIGINAL);
    }

    public function it_dont_change_value_when_input_is_locked()
    {

        $this->next(self::OTHER_RESPONSE);
        $this->resolve(self::RESPONSE);

        $this->value()->shouldReturn(self::OTHER_RESPONSE);
    }


    public function it_can_be_ignored()
    {
        $this->ignore();
        $this->isValid()->shouldReturn(false);
    }

    public function it_continues_ignored_after_been_resolved()
    {
        $this->ignore();
        $this->resolve(self::RESPONSE);

        $this->isValid()->shouldReturn(false);
        $this->value()->shouldReturn(self::ORIGINAL);
    }

    public function it_can_be_rejected()
    {
        $this->reject('reason');
        $this->isValid()->shouldReturn(false);
    }

    public function it_throws_an_exception_if_change_status_from_ignore_to_ignore()
    {
        $this->ignore();
        $this->shouldThrow(\LogicException::class)->duringIgnore();
    }

    public function it_throws_an_exception_if_change_status_from_ignore_to_reject()
    {
        $this->ignore();
        $this->shouldThrow(\LogicException::class)->duringReject('reason');
    }

    public function it_throws_an_exception_if_change_status_from_ignore_to_valid()
    {
        $this->ignore();
        $this->shouldThrow(\LogicException::class)->duringNext(self::RESPONSE);
    }

    public function it_throws_an_exception_if_change_status_from_reject_to_reject()
    {
        $this->reject('reason');
        $this->shouldThrow(\LogicException::class)->duringReject('reason');
    }

    public function it_throws_an_exception_if_change_status_from_reject_to_ignore()
    {
        $this->reject('reason');
        $this->shouldThrow(\LogicException::class)->duringReject('reason');
    }

    public function it_throws_an_exception_if_change_status_from_reject_to_valid()
    {
        $this->reject('reason');
        $this->shouldThrow(\LogicException::class)->duringNext(self::RESPONSE);
    }

    public function it_throws_an_exception_if_change_status_from_valid_to_valid()
    {
        $this->next(self::OTHER_RESPONSE);
        $this->shouldThrow(\LogicException::class)->duringNext(self::RESPONSE);
    }

    public function it_throws_an_exception_if_change_status_from_valid_to_ignore()
    {
        $this->next(self::RESPONSE);
        $this->shouldThrow(\LogicException::class)->duringIgnore();
    }

    public function it_throws_an_exception_if_change_status_from_valid_to_reject()
    {
        $this->next(self::RESPONSE);
        $this->shouldThrow(\LogicException::class)->duringReject('reason');
    }

    public function it_dont_throws_an_exception_if_change_value_after_unlock()
    {
        $this->next(self::RESPONSE);
        $this->shouldThrow(\LogicException::class)->duringNext(self::OTHER_RESPONSE);

        $this->resolve(null);
        $this->shouldNotThrow(\Throwable::class)->duringNext(self::OTHER_RESPONSE);
    }

    public function it_throws_an_exception_if_change_value_after_unlock_a_invalid_input()
    {
        $this->ignore();
        $this->shouldThrow(\LogicException::class)->duringNext(self::OTHER_RESPONSE);

        $this->resolve(null);
        $this->shouldThrow(\Throwable::class)->duringNext(self::OTHER_RESPONSE);
    }

    public function it_throws_an_exception_when_resolve_an_rejected_input()
    {
        $this->reject('reason');
        $this->shouldThrow(InvalidArgumentException::class)->duringResolve(self::RESPONSE);
    }

    public function it_throws_a_custom_exception_when_resolve_an_rejected_input()
    {
        $this->throws(new \LogicException());
        $this->shouldThrow(\LogicException::class)->duringResolve(self::RESPONSE);
    }

}
