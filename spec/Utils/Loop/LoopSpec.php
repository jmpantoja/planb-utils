<?php

namespace spec\PlanB\Utils\Loop;


use PlanB\DS\Vector\Vector;
use PlanB\Utils\Loop\Loop;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;


function loop(iterable $input = null)
{
    return Loop::make($input);
}

class LoopSpec extends ObjectBehavior
{
    public function build(iterable $value = [])
    {
        $this->beAnInstanceOf(Loop::class);
        $this->beConstructedThrough('make', [$value]);
    }

    public function it_is_initializable()
    {

        $this->build();
        $this->shouldHaveType(Loop::class);

    }

    public function it_not_execute_function_if_has_not_elements(MethodMock $each)
    {
        $this->build();
        $each->__invoke(Argument::any(), Argument::any())->shouldNotBeCalled();
        $this->each($each)->run();

    }

    public function it_execute_a_function_for_each_element(MethodMock $each)
    {
        $input = ['a' => 10, 'b' => 20, 'c' => 30];
        $this->build($input);

        $each->__invoke(10, 'a')->shouldBeCalledTimes(1);
        $each->__invoke(20, 'b')->shouldBeCalledTimes(1);
        $each->__invoke(30, 'c')->shouldBeCalledTimes(1);

        $this->each($each)->run();
    }


    public function it_execute_a_function_for_each_element_whit_a_before_condition(MethodMock $each)
    {
        $input = range(1, 10);


        $this->build($input);

        $each->__invoke(1, 0)->shouldBeCalledTimes(1);
        $each->__invoke(2, 1)->shouldBeCalledTimes(1);
        $each->__invoke(3, 2)->shouldBeCalledTimes(1);

        $this
            ->each($each)
            ->before(function ($value) {
                return $value <= 3;
            })
            ->run();
    }

    public function it_execute_a_function_for_each_element_with_an_after_condition(MethodMock $each)
    {
        $input = range(1, 10);

        $this->build($input);

        $each->__invoke(1, 0)->shouldBeCalledTimes(1);
        $each->__invoke(2, 1)->shouldBeCalledTimes(1);
        $each->__invoke(3, 2)->shouldBeCalledTimes(1);

        $this
            ->each($each)
            ->after(function ($value) {
                return $value < 3;
            })
            ->run();
    }

    public function it_can_be_used_like_generator_on_foreach_loop(MethodMock $each)
    {
        $input = ['a' => 10, 'b' => 20, 'c' => 30];
        $loop = Loop::make($input);

        $each->__invoke(10, 'a')->shouldBeCalledTimes(1);
        $each->__invoke(20, 'b')->shouldBeCalledTimes(1);
        $each->__invoke(30, 'c')->shouldBeCalledTimes(1);

        foreach ($loop as $key => $value) {
            call_user_func($each->getWrappedObject(), $value, $key);
        }
    }


    public function it_can_be_used_like_generator_on_foreach_loop_considering_a_before_condition(MethodMock $each)
    {
        $input = range(1, 10);
        $loop = Loop::make($input)
            ->before(function ($value) {
                return $value <= 3;
            });

        $each->__invoke(1, 0)->shouldBeCalledTimes(1);
        $each->__invoke(2, 1)->shouldBeCalledTimes(1);
        $each->__invoke(3, 2)->shouldBeCalledTimes(1);

        foreach ($loop as $key => $value) {
            call_user_func($each->getWrappedObject(), $value, $key);
        }
    }

    public function it_can_be_used_like_generator_on_foreach_loop_considering_an_after_condition(MethodMock $each)
    {
        $input = range(1, 10);
        $loop = Loop::make($input)
            ->after(function ($value) {
                return $value < 3;
            });

        $each->__invoke(1, 0)->shouldBeCalledTimes(1);
        $each->__invoke(2, 1)->shouldBeCalledTimes(1);
        $each->__invoke(3, 2)->shouldBeCalledTimes(1);

        foreach ($loop as $key => $value) {
            call_user_func($each->getWrappedObject(), $value, $key);
        }
    }

    public function it_can_be_used_like_generator_on_while_loop(MethodMock $each)
    {
        $input = range(1, 10);
        $loop = Loop::make($input)
            ->before(function ($value) {
                return $value <= 3;
            });

        $each->__invoke(1, 0)->shouldBeCalledTimes(2);
        $each->__invoke(2, 1)->shouldBeCalledTimes(2);
        $each->__invoke(3, 2)->shouldBeCalledTimes(2);


        $loop->rewind();
        while ($loop->valid()) {
            $value = $loop->current();
            $key = $loop->key();

            call_user_func($each->getWrappedObject(), $value, $key);

            $loop->next();
        }

        $loop->rewind();
        while ($loop->valid()) {
            $value = $loop->current();
            $key = $loop->key();

            call_user_func($each->getWrappedObject(), $value, $key);

            $loop->next();
        }
    }

}
