<?php

namespace spec\PlanB\DS1;

use PhpSpec\ObjectBehavior;
use PlanB\DS1\Deque;
use PlanB\DS1\Exception\InvalidArgumentException;
use PlanB\DS1\Exception\ReconfigurePopulatedCollectionException;
use PlanB\DS1\Map;
use PlanB\DS1\PriorityQueue;
use PlanB\DS1\Queue;
use PlanB\DS1\Resolver\Input\FailedInput;
use PlanB\DS1\Resolver\Resolver;
use PlanB\DS1\Set;
use PlanB\DS1\Stack;
use PlanB\DS1\Vector;
use PlanB\Type\Assurance\Exception\AssertException;
use PlanB\Type\DataType\Type;
use PlanB\Type\Text\Text;
use PlanB\Type\Value\Value;
use Prophecy\Argument;

class ResolverSpec extends ObjectBehavior
{
    protected const VALUE_A = 'value A';
    protected const VALUE_B = 'value B';
    protected const VALUE_C = 'value C';

    private function build(string $className): void
    {
        $this->beAnInstanceOf($className);
        $this->beConstructedThrough('make');

        $this
            ->addFilter(function ($value) {
                return Value::create($value)->isConvertibleToString();
            })
            ->addTypedFilter(Type::STRING, function ($value) {
                return !is_blank_text($value);
            })
            ->addNormalizer(function (string $value) {
                return Text::create($value);
            });
    }

    public function it_can_resolve_and_add_values_into_a_vector()
    {
        $this->build(Vector::class);

        $this[] = self::VALUE_A;
        $this[] = [self::VALUE_A, self::VALUE_B];

        $this[] = self::VALUE_B;
        $this[] = new \stdClass();

        $this[] = self::VALUE_C;
        $this[] = '  ';

        $this->shouldIterateLike([
            Text::create(self::VALUE_A),
            Text::create(self::VALUE_B),
            Text::create(self::VALUE_C),
        ]);

    }

    public function it_can_resolve_and_add_values_into_a_deque()
    {
        $this->build(Deque::class);

        $this[] = self::VALUE_A;
        $this[] = [self::VALUE_A, self::VALUE_B];

        $this[] = self::VALUE_B;
        $this[] = new \stdClass();

        $this[] = self::VALUE_C;
        $this[] = '  ';

        $this->shouldIterateLike([
            Text::create(self::VALUE_A),
            Text::create(self::VALUE_B),
            Text::create(self::VALUE_C),
        ]);

    }

    public function it_can_resolve_and_add_values_into_a_stack()
    {
        $this->build(Stack::class);

        $this[] = self::VALUE_A;
        $this[] = [self::VALUE_A, self::VALUE_B];

        $this[] = self::VALUE_B;
        $this[] = new \stdClass();

        $this[] = self::VALUE_C;
        $this[] = '  ';

        $this->shouldIterateLike([
            Text::create(self::VALUE_C),
            Text::create(self::VALUE_B),
            Text::create(self::VALUE_A),
        ]);
    }

    public function it_can_resolve_and_add_values_into_a_queue()
    {
        $this->build(Queue::class);

        $this[] = self::VALUE_A;
        $this[] = [self::VALUE_A, self::VALUE_B];

        $this[] = self::VALUE_B;
        $this[] = new \stdClass();

        $this[] = self::VALUE_C;
        $this[] = '  ';

        $this->shouldIterateLike([
            Text::create(self::VALUE_A),
            Text::create(self::VALUE_B),
            Text::create(self::VALUE_C),
        ]);

    }

    public function it_can_resolve_and_add_values_into_a_priority_queue()
    {
        $this->build(PriorityQueue::class);

        $this->push(self::VALUE_A, 5);
        $this->push([self::VALUE_A, self::VALUE_B], 10);

        $this->push(self::VALUE_B, 15);
        $this->push(new \stdClass(), 20);

        $this->push(self::VALUE_C, 25);
        $this->push('   ', 30);

        $this->shouldIterateLike([
            Text::create(self::VALUE_C),
            Text::create(self::VALUE_B),
            Text::create(self::VALUE_A),
        ]);

    }

    public function it_can_resolve_and_add_values_into_a_map()
    {
        $this->build(Map::class);

        $this['a'] = self::VALUE_A;
        $this['a'] = [self::VALUE_A, self::VALUE_B];

        $this['b'] = self::VALUE_B;
        $this['b'] = new \stdClass();

        $this['c'] = self::VALUE_C;
        $this['c'] = '  ';

        $this->shouldIterateLike([
            'a' => Text::create(self::VALUE_A),
            'b' => Text::create(self::VALUE_B),
            'c' => Text::create(self::VALUE_C),
        ]);

    }

    public function it_can_resolve_and_add_values_into_a_set()
    {
        $this->build(Set::class);

        $this[] = self::VALUE_A;
        $this[] = [self::VALUE_A, self::VALUE_B];

        $this[] = self::VALUE_B;
        $this[] = new \stdClass();

        $this[] = self::VALUE_C;
        $this[] = '  ';

        $this->shouldIterateLike([
            Text::create(self::VALUE_A),
            Text::create(self::VALUE_B),
            Text::create(self::VALUE_C),
        ]);
    }


    public function it_can_add_a_filter(Resolver $resolver)
    {
        $closure = \Closure::fromCallable(function () {
        });
        $priority = 1;

        $resolver->addFilter($closure, $priority)
            ->shouldBeCalledTimes(1)
            ->willReturn($resolver);

        $this->beAnInstanceOf(Vector::class);
        $this->beConstructedThrough('make');

        $this->bind($resolver);
        $this->addFilter($closure, $priority);
    }


    public function it_can_add_a_typed_filter(Resolver $resolver)
    {
        $type = Type::STRING;
        $closure = \Closure::fromCallable(function () {
        });
        $priority = 1;

        $resolver->addTypedFilter($type, $closure, $priority)
            ->shouldBeCalledTimes(1)
            ->willReturn($resolver);

        $this->beAnInstanceOf(Vector::class);
        $this->beConstructedThrough('make');

        $this->bind($resolver);
        $this->addTypedFilter($type, $closure, $priority);
    }

    public function it_can_add_a_converter(Resolver $resolver)
    {
        $type = Type::STRING;
        $closure = \Closure::fromCallable(function () {
        });
        $priority = 1;

        $resolver->addConverter($type, $closure, $priority)
            ->shouldBeCalledTimes(1)
            ->willReturn($resolver);

        $this->beAnInstanceOf(Vector::class);
        $this->beConstructedThrough('make');

        $this->bind($resolver);
        $this->addConverter($type, $closure, $priority);
    }

    public function it_can_add_a_validator(Resolver $resolver)
    {
        $closure = \Closure::fromCallable(function () {
        });
        $priority = 1;

        $resolver->addValidator($closure, $priority)
            ->shouldBeCalledTimes(1)
            ->willReturn($resolver);

        $this->beAnInstanceOf(Vector::class);
        $this->beConstructedThrough('make');

        $this->bind($resolver);
        $this->addValidator($closure, $priority);
    }

    public function it_can_add_a_typed_validator(Resolver $resolver)
    {
        $type = Type::STRING;
        $closure = \Closure::fromCallable(function () {
        });
        $priority = 1;

        $resolver->addTypedValidator($type, $closure, $priority)
            ->shouldBeCalledTimes(1)
            ->willReturn($resolver);

        $this->beAnInstanceOf(Vector::class);
        $this->beConstructedThrough('make');

        $this->bind($resolver);
        $this->addTypedValidator($type, $closure, $priority);
    }


    public function it_can_add_a_normalizer(Resolver $resolver)
    {
        $closure = \Closure::fromCallable(function () {
        });
        $priority = 1;

        $resolver->addNormalizer($closure, $priority)
            ->shouldBeCalledTimes(1)
            ->willReturn($resolver);

        $this->beAnInstanceOf(Vector::class);
        $this->beConstructedThrough('make');

        $this->bind($resolver);
        $this->addNormalizer($closure, $priority);
    }


    public function it_can_add_a_typed_normalizer(Resolver $resolver)
    {
        $type = Type::STRING;
        $closure = \Closure::fromCallable(function () {
        });
        $priority = 1;

        $resolver->addTypedNormalizer($type, $closure, $priority)
            ->shouldBeCalledTimes(1)
            ->willReturn($resolver);

        $this->beAnInstanceOf(Vector::class);
        $this->beConstructedThrough('make');

        $this->bind($resolver);
        $this->addTypedNormalizer($type, $closure, $priority);
    }

    public function it_throws_an_exception_when_add_an_invalid_value()
    {

        $this->beAnInstanceOf(Vector::class);
        $this->beConstructedThrough('make');

        $this->addValidator(function () {
            return false;
        });

        $this->shouldThrow(InvalidArgumentException::class)->duringPush('A');
    }

    public function it_catch_an_exception_throwed_during_resolve()
    {

        $this->beAnInstanceOf(Vector::class);
        $this->beConstructedThrough('make');

        $this->addNormalizer(function ($value) {
            throw new \Exception('xxx');

            return $value;
        });


        $this->shouldThrow(InvalidArgumentException::class)->duringPush('A');
    }

    public function it_can_make_a_typed_collection()
    {
        $this->beAnInstanceOf(Vector::class);
        $this->beConstructedThrough('typed', [Type::STRING]);

        $this->getInnerType()->shouldReturn(Type::STRING);
    }

    public function it_throw_an_exception_when_add_an_invalid_type_value()
    {

        $this->beAnInstanceOf(Vector::class);
        $this->beConstructedThrough('typed', [Type::STRING]);

        $this->shouldThrow(InvalidArgumentException::class)->duringPush(125);
        $this->shouldNotThrow(InvalidArgumentException::class)->duringPush(self::VALUE_A);
    }


    public function it_throw_an_exception_when_add_an_invalid_type_value_on_a_duplicated_collection()
    {

        $this->beAnInstanceOf(Vector::class);
        $this->beConstructedThrough('typed', [Type::STRING, [
            self::VALUE_C,
            self::VALUE_B,
            self::VALUE_A,
        ]]);

        $this->shouldThrow(InvalidArgumentException::class)->duringPush(125);

        $sorted = $this->sorted();

        $sorted->shouldThrow(InvalidArgumentException::class)->duringPush(125);
        $sorted->shouldNotThrow(InvalidArgumentException::class)->duringPush(self::VALUE_A);

    }

    public function it_throw_an_exception_when_add_a_rule_on_a_not_empty_collection()
    {

        $this->beAnInstanceOf(Vector::class);
        $this->beConstructedThrough('typed', [Type::STRING, [
            self::VALUE_C,
            self::VALUE_B,
            self::VALUE_A,
        ]]);


        $exception = ReconfigurePopulatedCollectionException::make();

        $this->shouldThrow($exception)->duringBind(Resolver::make());

        $this->shouldThrow($exception)->duringAddFilter(function () {
        });

        $this->shouldThrow($exception)->duringAddTypedFilter(Type::STRING, function () {
        });

        $this->shouldThrow($exception)->duringAddConverter(Type::STRING, function () {
        });

        $this->shouldThrow($exception)->duringAddValidator(function () {
        });

        $this->shouldThrow($exception)->duringAddTypedValidator(Type::STRING, function () {
        });

        $this->shouldThrow($exception)->duringAddNormalizer(function () {
        });

        $this->shouldThrow($exception)->duringAddTypedNormalizer(Type::STRING, function () {
        });

    }

    public function it_throw_an_exception_when_initalize_with_invalid_type_values()
    {
        $this->beAnInstanceOf(Vector::class);
        $this->beConstructedThrough('typed', [Type::STRING, [
            self::VALUE_C,
            2342,
            self::VALUE_A,
        ]]);

        $this->shouldThrow(InvalidArgumentException::class)->duringInstantiation();
    }

    public function it_throw_an_exception_when_make_a_typed_collection_with_an_invalid_type()
    {
        $this->beAnInstanceOf(Vector::class);
        $this->beConstructedThrough('typed', ['FAKE_TYPE']);

        $this->shouldThrow(AssertException::class)->duringInstantiation();
    }

    public function it_make_a_typed_collection_from_an_array_of_values()
    {
        $this->beAnInstanceOf(Vector::class);
        $this->beConstructedThrough('like', [[
            self::VALUE_A,
            self::VALUE_B,
            self::VALUE_C
        ]]);


        $this->getInnerType()->shouldReturn(Type::STRING);
        $this->count()->shouldReturn(3);
    }

    public function it_make_a_typed_collection_from_an_empty_array()
    {
        $this->beAnInstanceOf(Vector::class);
        $this->beConstructedThrough('like', []);

        $this->getInnerType()->shouldReturn(null);
        $this->count()->shouldReturn(0);
    }
}
