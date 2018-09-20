<?php

declare(strict_types=1);

namespace spec\PlanB\DS1\Resolver;


use PlanB\DS1\Exception\InvalidArgumentException;
use PlanB\DS1\Resolver\Input\FailedInput;
use PlanB\DS1\Resolver\Input\InputInterface;
use PlanB\DS1\Resolver\ResolvedValue;
use PlanB\DS1\Resolver\Resolver;
use PhpSpec\ObjectBehavior;
use PlanB\DS1\Resolver\Input\IgnoredInput;
use PlanB\DS1\Resolver\Input\NormalizedValue;
use PlanB\DS1\Resolver\Input\Input;
use PlanB\DS1\Resolver\Rule\Converter;
use PlanB\DS1\Resolver\Rule\Exception\InvalidRuleReturnedType;
use PlanB\DS1\Resolver\Rule\Filter;
use PlanB\DS1\Resolver\Rule\Validator;
use PlanB\Type\DataType\DataType;
use PlanB\Type\DataType\Type;
use PlanB\Type\Text\Text;
use PlanB\Type\Value\Value;
use Prophecy\Argument;
use spec\PlanB\Matchers;


class ResolverSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('make');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Resolver::class);
    }

    public function it_can_make_a_non_typed_resolver()
    {
        $this->beConstructedThrough('make');

        $this->getType()->shouldReturn(null);
    }

    public function it_can_make_a_typed_resolver()
    {
        $this->beConstructedThrough('make');

        $this->setType(Type::STRING);

        $this->getType()->shouldBeLike(DataType::create(Type::STRING));
    }

    public function it_ignore_a_value_when_filter_return_false()
    {
        $this->addFilter(function (int $value) {
            $isEven = ($value % 2 == 0);
            return $isEven;
        });

        $this->resolve(15)->shouldHaveType(IgnoredInput::class);
        $this->resolve(6)->shouldHaveType(Input::class);
    }

    public function it_accept_a_value_when_filter_return_true()
    {
        $this->addFilter(Filter::make(function (int $value) {
            return $value <= 10;
        }));

        $this->resolve(15)->shouldHaveType(IgnoredInput::class);
        $this->resolve(6)->shouldHaveType(Input::class);
    }

    public function it_filter_values_of_one_single_type_using_method()
    {
        $this->addTypedFilter(Type::INTEGER, function (int $value) {
            return $value <= 10;
        });

        $this->resolve(15)->shouldHaveType(IgnoredInput::class);
        $this->resolve("15")->shouldHaveType(Input::class);

    }

    public function it_filter_values_of_one_single_type_using_typed_filter()
    {
        $this->addFilter(Filter::typed(Type::INTEGER, function (int $value) {
            return $value <= 10;
        }));

        $this->resolve(15)->shouldHaveType(IgnoredInput::class);
        $this->resolve("15")->shouldHaveType(Input::class);

    }

    public function it_convert_a_value_from_a_type_to_another()
    {
        $this->addConverter(Type::STRING, function (string $value) {
            return strlen($value);
        });

        $this->resolve('')
            ->shouldBeLike(Input::make(0));

        $this->resolve('a')
            ->shouldBeLike(Input::make(1));

        $this->resolve('ab')
            ->shouldBeLike(Input::make(2));

        $this->resolve([1, 2, 3])
            ->shouldBeLike(Input::make([1, 2, 3]));

    }

    public function it_convert_a_value_with_a_chain_of_converters(Converter $first, Converter $second)
    {
        $first->setInnerType(null)
            ->shouldBeCalledTimes(1);

        $second->setInnerType(null)
            ->shouldNotBeCalled();

        $first->resolve(Argument::type(InputInterface::class))
            ->willReturn(IgnoredInput::make('input'))
            ->shouldBeCalledTimes(1);

        $second->resolve(Argument::type(InputInterface::class))
            ->willReturn(Input::make('este valor se ignora'))
            ->shouldNotBeCalled();

        $this->addConverter(Type::STRING, $first);
        $this->addConverter(Type::STRING, $second);

        $this->resolve('cadena de texto')
            ->shouldBeLike(IgnoredInput::make('input'));

    }

    public function it_return_a_failed_input_when_add_an_invalid_input_type()
    {
        $this->beConstructedThrough('make', [Type::STRING]);

        $this->resolve('cadena de texto')->shouldHaveType(Input::class);
        $this->resolve(9)->shouldHaveType(FailedInput::class);

    }

    public function it_return_a_failed_input_when_add_an_invalid_input_value()
    {
        $this->addValidator(function (int $value) {
            return $value < 10;
        });

        $this->resolve(9)->shouldHaveType(Input::class);
        $this->resolve(11)->shouldHaveType(FailedInput::class);
    }

    public function it_return_a_failed_input_when_add_an_invalid_input_value_using_typed_validator()
    {
        $this->addTypedValidator(Type::INTEGER, function (int $value) {
            return $value < 10;
        });

        $this->resolve(9)->shouldHaveType(Input::class);
        $this->resolve(11)->shouldHaveType(FailedInput::class);
    }

    public function it_normalize_a_value()
    {
        $this
            ->addFilter(function ($value) {

                return Value::create($value)->isConvertibleToString();
            })->addConverter(Type::STRING, function (string $value) {

                return Text::create($value);
            })->addNormalizer(function (Text $value) {

                return $value->toUpper();
            });

        $this->resolve([1, 2, 3])
            ->shouldHaveType(IgnoredInput::class);

        $this->resolve('hola que tal')
            ->shouldBeLike(Input::make(Text::create('HOLA QUE TAL')));

    }

    public function it_normalize_a_value_using_a_typed_normalizer()
    {
        $this
            ->addTypedNormalizer(Type::STRING, function (string $value) {
                return Text::create($value);
            })
            ->addTypedNormalizer(Text::class, function (Text $text) {
                return $text->toUpper();
            });

        $this->resolve('hola que tal')
            ->shouldBeLike(Input::make(Text::create('HOLA QUE TAL')));
    }


    public function it_ensure_than_a_normalizer_dont_change_the_value_type()
    {
        $this
            ->setType(Text::class)
            ->addTypedNormalizer(Type::STRING, function (string $value) {
                return Text::create($value);
            })
            ->addTypedNormalizer(Text::class, function (Text $text) {

                return $text->toUpper()->stringify();
            });

        $expected = FailedInput::make(Text::create('HOLA QUE TAL'))
            ->setOriginal('hola que tal');

        $this->resolve('hola que tal')
            ->shouldBeLike($expected);
    }


    public function it_throws_an_exception_when_a_rule_fails()
    {
        $this
            ->addTypedNormalizer(Type::STRING, function (string $value) {
                return Text::create($value);
            })
            ->addTypedNormalizer(Text::class, function (Text $text) {
                throw new Exception('algo malo ha pasado');
            });

        $this->shouldThrow(InvalidArgumentException::class)->duringResolve('hola que tal');
    }

}
