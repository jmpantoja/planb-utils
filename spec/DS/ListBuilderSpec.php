<?php

/**
 * This file is part of the planb project.
 *
 * (c) jmpantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\PlanB\DS;

use PhpSpec\ObjectBehavior;
use PlanB\DS\AbstractBuilder;
use PlanB\DS\Deque\Deque;
use PlanB\DS\Exception\InvalidArgumentException;
use PlanB\DS\ListBuilder;
use PlanB\DS\Map\Map;
use PlanB\DS\PriorityQueue\PriorityQueue;
use PlanB\DS\Queue\Queue;
use PlanB\DS\Resolver\Input;
use PlanB\DS\Resolver\Resolver;
use PlanB\DS\Set\Set;
use PlanB\DS\Stack\Stack;
use PlanB\DS\Vector\Vector;
use PlanB\Type\Data\Data;
use PlanB\Type\DataType\DataType;
use PlanB\Type\DataType\Type;

class ListBuilderSpec extends ObjectBehavior
{

    protected const VALUE_A = 'value A';
    protected const VALUE_B = 'value B';
    protected const VALUE_C = 'value C';
    protected const VALUE_D = 'value D';
    protected const VALUE_E = 'value E';
    protected const VALUE_F = 'value F';


    public function let()
    {
        $this->beConstructedThrough('make');
    }

    public function it_retrieve_a_collection()
    {
        $this->shouldHaveType(ListBuilder::class);
        $this->vector()->shouldHaveType(Vector::class);
        $this->deque()->shouldHaveType(Deque::class);
        $this->stack()->shouldHaveType(Stack::class);
        $this->queue()->shouldHaveType(Queue::class);
        $this->priorityQueue()->shouldHaveType(PriorityQueue::class);
        $this->set()->shouldHaveType(Set::class);
        $this->map()->shouldHaveType(Map::class);

    }

    public function it_can_build_with_values()
    {
        $this->values([
            self::VALUE_A,
            self::VALUE_B,
            self::VALUE_C,
        ]);

        $this->assertResponse();
    }


    public function it_can_add_a_rule()
    {
        $this
            ->rule(function ($value, Input $input) {
                $isString = Data::make($value)->isConvertibleToString();
                if (!$isString) {
                    $input->ignore();
                }
            })
            ->values([
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C,
                [self::VALUE_A, self::VALUE_B],
                new \stdClass(),

            ]);

        $this->assertInnerType(null);
        $this->assertResponse();
    }

    public function it_can_add_a_loader(InvokerMock $invoker)
    {
        $target = $invoker->getWrappedObject();

        $this
            ->loader(function ($value) use ($target) {
                $target->__invoke($value);
            })
            ->values([
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C,
            ])
            ->vector();

        $invoker->__invoke(self::VALUE_A)->shouldBeCalledTimes(1);
        $invoker->__invoke(self::VALUE_B)->shouldBeCalledTimes(1);
        $invoker->__invoke(self::VALUE_C)->shouldBeCalledTimes(1);

    }

    public function it_can_add_a_filter()
    {
        $this
            ->filter(function ($value) {
                return Data::make($value)->isConvertibleToString();
            })
            ->values([
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C,
                [self::VALUE_A, self::VALUE_B],
                new \stdClass(),
            ]);

        $this->assertInnerType(null);
        $this->assertResponse();

    }

    public function it_can_add_a_typed_filter()
    {
        $this
            ->filter(function (string $value) {
                return $value != self::VALUE_D;
            }, Type::STRING)
            ->values([
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C,
                self::VALUE_D,
            ]);

        $this->assertResponse();
    }


    public function it_can_add_a_converter()
    {
        $this
            ->converter(function (array $value) {
                return self::VALUE_B;
            }, Type::ARRAY)
            ->values([
                self::VALUE_A,
                [self::VALUE_A, self::VALUE_B],
                self::VALUE_C,
            ]);

        $this->assertResponse();
    }

    public function it_can_add_a_validator()
    {
        $this
            ->validator(function (string $value) {
                return in_array($value, [
                    self::VALUE_A,
                    self::VALUE_B,
                    self::VALUE_C,
                ]);
            })
            ->values([
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C,
            ]);

        $this->assertResponse();

    }
    public function it_throws_an_exception_when_values_are_invalid()
    {
        $this
            ->validator(function (string $value) {
                return in_array($value, [
                    self::VALUE_A,
                    self::VALUE_B,
                    self::VALUE_C,
                ]);
            })
            ->values([
                self::VALUE_A,
                'XXXX',
                self::VALUE_B,
                self::VALUE_C,
            ]);

        $this->assertException();
    }


    public function it_can_add_a_typed_validator()
    {
        $this
            ->validator(function (string $value) {
                return in_array($value, [
                    self::VALUE_A,
                    self::VALUE_B,
                    self::VALUE_C,
                ]);
            }, Type::STRING)
            ->values([
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C,
            ]);

        $this->assertResponse();
    }

    public function it_throws_an_exception_when_values_are_invalid_for_typed_validator()
    {
        $this
            ->validator(function (string $value) {
                return in_array($value, [
                    self::VALUE_A,
                    self::VALUE_B,
                    self::VALUE_C,
                ]);
            }, Type::STRING)
            ->values([
                self::VALUE_A,
                'XXXX',
                self::VALUE_B,
                self::VALUE_C,
            ]);

        $this->assertException();
    }


    public function it_can_set_a_type()
    {
        $this->beConstructedThrough('typed', [Type::STRING]);

        $this
            ->values([
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C,
            ]);

        $this->assertInnerType(Type::STRING);
        $this->assertResponse();
    }

    public function it_throws_an_exception_when_build_with_invalid_type_values()
    {

        $this->beConstructedThrough('typed', [Type::STRING]);

        $this
            ->values([
                self::VALUE_A,
                [self::VALUE_A, self::VALUE_B],
                self::VALUE_B,
                self::VALUE_C,
            ]);

        $this->assertException();
    }


    public function it_can_bind_a_resolver()
    {
        $resolver = Resolver::typed(Type::STRING);
        $this->beConstructedThrough('bind', [$resolver]);

        $this
            ->values([
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C,
            ]);

        $this->assertInnerType(Type::STRING);
        $this->assertResponse();
    }

    public function it_throws_an_exception_on_a_bind_resolver()
    {
        $resolver = Resolver::typed(Type::STRING);
        $this->beConstructedThrough('bind', [$resolver]);

        $this
            ->values([
                self::VALUE_A,
                [self::VALUE_A, self::VALUE_B],
                self::VALUE_C,
            ]);

        $this->assertException();
    }


    /**
     * @return array
     */
    private function getResponse(): array
    {
        return [
            self::VALUE_A,
            self::VALUE_B,
            self::VALUE_C
        ];
    }

    /**
     * @return array
     */
    private function getInverseResponse(): array
    {
        return [
            self::VALUE_C,
            self::VALUE_B,
            self::VALUE_A
        ];
    }

    private function assertResponse(): void
    {
        $this->vector()->shouldIterateLike($this->getResponse());
        $this->deque()->shouldIterateLike($this->getResponse());
        $this->stack()->shouldIterateLike($this->getInverseResponse());
        $this->queue()->shouldIterateLike($this->getResponse());
        $this->priorityQueue()->shouldIterateLike($this->getResponse());
        $this->set()->shouldIterateLike($this->getResponse());
        $this->map()->shouldIterateLike($this->getResponse());
    }

    private function assertInnerType($type): void
    {
        if (!is_null($type)) {
            $type = DataType::make($type);
        }

        $this->vector()->getInnerType()->shouldBeLike($type);
        $this->deque()->getInnerType()->shouldBeLike($type);
        $this->stack()->getInnerType()->shouldBeLike($type);
        $this->queue()->getInnerType()->shouldBeLike($type);
        $this->priorityQueue()->getInnerType()->shouldBeLike($type);
        $this->set()->getInnerType()->shouldBeLike($type);
        $this->map()->getInnerType()->shouldBeLike($type);
    }

    private function assertException(): void
    {
        $this->shouldThrow(InvalidArgumentException::class)->during('vector');
        $this->shouldThrow(InvalidArgumentException::class)->during('deque');
        $this->shouldThrow(InvalidArgumentException::class)->during('stack');
        $this->shouldThrow(InvalidArgumentException::class)->during('queue');
        $this->shouldThrow(InvalidArgumentException::class)->during('priorityQueue');
        $this->shouldThrow(InvalidArgumentException::class)->during('set');
        $this->shouldThrow(InvalidArgumentException::class)->during('map');
    }

}
