<?php

namespace spec\PlanB\DS\Resolver;

use PlanB\DS\Exception\InvalidArgumentException;
use PlanB\DS\Resolver\Input;
use PlanB\DS\Resolver\Resolver;
use PhpSpec\ObjectBehavior;
use PlanB\DS\Vector\Vector;
use PlanB\DS\Vector\VectorBuilder;
use PlanB\Type\DataType\DataType;
use PlanB\Type\DataType\Type;
use PlanB\Type\Text\Text;
use Prophecy\Argument;
use Prophecy\Prophet;


class ResolverSpec extends ObjectBehavior
{

    protected const INPUT = 'input';
    protected const RESPONSE = 'response';

    public function let()
    {
        $this->beConstructedThrough('make');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Resolver::class);
    }

    public function it_is_empty_by_default()
    {
        $this->isEmpty()->shouldReturn(true);
    }


    public function it_is_not_empty_when_add_a_rule()
    {
        $this
            ->rule(function ($value, Input $input) {
                return self::RESPONSE;
            });

        $this->isEmpty()->shouldReturn(false);
    }

    public function it_can_add_one_rule()
    {
        $this
            ->rule(function ($value, Input $input) {
                return self::RESPONSE;
            });

        $this->assertValues([self::INPUT, self::INPUT], [self::RESPONSE, self::RESPONSE]);
        $this->assertValue(self::INPUT, self::RESPONSE);
    }


    public function it_can_add_one_converter(InvokerMock $invoker)
    {

        $this
            ->converter(function ($value) {
                return self::RESPONSE;
            });


        $this->assertValues([self::INPUT, self::INPUT], [self::RESPONSE, self::RESPONSE]);
        $this->assertValue(self::INPUT, self::RESPONSE);
    }

    public function it_can_add_some_converters_as_array(InvokerMock $invoker)
    {
        $this
            ->converters([
                Type::STRING => function (string $value) {
                    return 'A';
                },
                Type::NUMERIC => function (string $value) {
                    return 'B';
                }
            ]);

        $this->assertValues(['texto', 234], ['A', 'B']);
        $this->assertValue('texto', 'A');
        $this->assertValue(234, 'B');
    }


    public function it_can_add_some_rules_as_array(InvokerMock $invoker)
    {
        $this
            ->rules([
                Type::STRING => function (string $value) {
                    return 'A';
                },
                Type::NUMERIC => function (string $value) {
                    return 'B';
                }
            ]);

        $this->assertValues(['texto', 234], ['A', 'B']);

        $this->assertValue('texto', 'A');
        $this->assertValue(234, 'B');
    }

    public function it_can_add_one_or_more_typed_rules(InvokerMock $invoker)
    {
        $this
            ->rule(function ($value) {
                return Text::make($value);
            }, Type::STRINGIFABLE)
            ->rule(function (object $object) {
                return get_class($object);
            }, Type::OBJECT);

        $this->assertValues([self::INPUT, new \stdClass()], [Text::make(self::INPUT), \stdClass::class]);

        $this->assertValue(new \stdClass(), \stdClass::class);

    }

    public function it_can_concatenated_one_or_more_rule()
    {
        $this
            ->rule(function ($value, Input $input) {

                return sprintf('A: %s', $value);
            })->rule(function ($value, Input $input) {
                return sprintf('B: %s', $value);
            });

        $output = 'B: A: input';
        $this->assertValues([self::INPUT, self::INPUT], [$output, $output]);
        $this->assertValue(self::INPUT, $output);

    }

    public function it_stop_when_first_rule_fails(StubCallback $callback)
    {
        $callback->make()->willReturn(self::RESPONSE)
            ->shouldBeCalledTimes(1);

        $this
            ->rule(function ($value, Input $input) use ($callback) {
                $input->ignore();
                return $callback->getWrappedObject()->make();

            })->rule(function ($value, Input $input) use ($callback) {
                return $callback->getWrappedObject()->make();
            });

        $this->assertNever([self::INPUT]);
    }


    public function it_can_ignore_a_value()
    {
        $this
            ->rule(function ($value, Input $input) {
                if (0 !== $value % 2) {
                    $input->ignore();
                }
            });

        $this->assertValues([1, 2, 3, 4, 5, 6], [2, 4, 6]);
    }


    public function it_can_ignore_a_value_using_a_filter()
    {
        $this
            ->filter(function ($value) {
                return (0 === $value % 2);
            });

        $this->assertValues([1, 2, 3, 4, 5, 6], [2, 4, 6]);
    }

    public function it_can_add_some_filtes_as_array()
    {
        $this
            ->filters([
                Type::STRING => function (string $value) {
                    return false;
                },
                Type::NUMERIC => function (string $value) {
                    return true;
                }
            ]);

        $this->assertValues(['texto', 234], [234]);

    }

    public function it_can_ignore_all_values()
    {
        $this
            ->rule(function ($value, Input $input) {
                if ($value < 100) {
                    $input->ignore();
                }
            });

        $this->assertNever([1, 2, 3, 4, 5, 6]);
    }


    public function it_can_reject_a_value(InvokerMock $invoker)
    {
        $this
            ->rule(function ($value, Input $input) {
                if (0 !== $value % 2) {
                    $input->reject('%s no es par', $value);
                }
            });

        $this->shouldThrow(InvalidArgumentException::class)->duringValues($invoker, [1, 2, 3, 4, 5, 6]);
        $this->shouldThrow(InvalidArgumentException::class)->duringValue($invoker, 1);
        $this->shouldThrow(InvalidArgumentException::class)->duringValue($invoker, 3);
        $this->shouldThrow(InvalidArgumentException::class)->duringValue($invoker, 5);
    }


    public function it_can_reject_a_value_using_a_validator(InvokerMock $invoker)
    {
        $this
            ->validator(function ($value) {
                return (0 === $value % 2);
            });

        $this->shouldThrow(InvalidArgumentException::class)->duringValues($invoker, [1, 2, 3, 4, 5, 6]);

        $this->shouldThrow(InvalidArgumentException::class)->duringValue($invoker, 1);
        $this->shouldThrow(InvalidArgumentException::class)->duringValue($invoker, 3);
        $this->shouldThrow(InvalidArgumentException::class)->duringValue($invoker, 5);
    }

    public function it_can_add_some_validators_as_array(InvokerMock $invoker)
    {
        $this
            ->validators([
                Type::STRING => function (string $value) {
                    return false;
                },
                Type::NUMERIC => function (string $value) {
                    return true;
                }
            ]);


        $this->assertValues([90992, 234], [90992, 234]);
        $this->shouldThrow(InvalidArgumentException::class)->duringValues($invoker, ['texto   ', 234]);

        $this->shouldThrow(InvalidArgumentException::class)->duringValue($invoker, 'texto');
    }


    public function it_can_reject_a_value_and_throw_a_custom_exception(InvokerMock $invoker)
    {
        $this
            ->rule(function ($value, Input $input) {
                if (0 !== $value % 2) {
                    $input->throws(new \LogicException());
                }
            });

        $this->shouldThrow(\LogicException::class)->duringValues($invoker, [1, 2, 3, 4, 5, 6]);

        $this->shouldThrow(\LogicException::class)->duringValue($invoker, 1);
        $this->shouldThrow(\LogicException::class)->duringValue($invoker, 3);
        $this->shouldThrow(\LogicException::class)->duringValue($invoker, 5);
    }


    public function it_can_create_a_typed_resolver(InvokerMock $invoker)
    {
        $this->beConstructedThrough('typed', [Type::STRING]);

        $this->assertValues(['xxx'], ['xxx']);
        $this->getType()->shouldBeLike(DataType::make(Type::STRING));

        $this->shouldThrow(InvalidArgumentException::class)->duringValues($invoker, [21234]);

        $this->shouldThrow(InvalidArgumentException::class)->duringValue($invoker, 21234);
    }

    public function it_can_assing_a_type_to_a_created_resolver(InvokerMock $invoker)
    {
        $this->beConstructedThrough('make');

        $this->type(Type::STRING);
        $this->getType()->shouldBeLike(DataType::make(Type::STRING));

        $this->shouldThrow(InvalidArgumentException::class)->duringValues($invoker, [21234]);
        $this->shouldThrow(InvalidArgumentException::class)->duringValue($invoker, 21234);
    }


    private function assertValues(array $input, array $output)
    {

        $prophet = new Prophet();
        $invoker = $prophet->prophesize(InvokerMock::class);

        $invoker->__invoke(new \DS\Map($output))->shouldBeCalledTimes(1);


        $this->values($invoker, $input);
    }


    private function assertValue($input, $output)
    {

        $prophet = new Prophet();
        $invoker = $prophet->prophesize(InvokerMock::class);

        $invoker->__invoke($output, null)->shouldBeCalledTimes(1);
        $this->value($invoker, $input);
    }


    private function assertNever(array $input)
    {

        $prophet = new Prophet();
        $invoker = $prophet->prophesize(InvokerMock::class);

        $invoker->__invoke(Argument::any(), Argument::any())->shouldBeCalledTimes(0);
        $this->values($invoker, $input);
    }
}
