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

namespace spec\PlanB\DS\Traits;

use PlanB\DS\AbstractBuilder;
use PlanB\DS\Exception\InvalidArgumentException;
use PlanB\Type\DataType\DataType;
use PlanB\Type\DataType\Type;
use PlanB\Type\Text\Text;
use PlanB\Type\Value\Value;

trait TraitBuilder
{

    public function let()
    {
        $this->beConstructedThrough('make');
    }

    public function it_retrieve_a_collection()
    {
        $this->shouldHaveType(AbstractBuilder::class);
        $this->build()->shouldHaveType(self::TARGET_CLASSNAME);
    }

    public function it_can_build_with_values()
    {
        $target = $this->values([
            self::VALUE_A,
            self::VALUE_B,
            self::VALUE_C,
        ])->build();

        $target->shouldIterateLike($this->getResponse());
    }

    public function it_can_set_a_type()
    {
        $this->beConstructedThrough('typed', [Type::STRING]);

        $target = $this
            ->values([
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C,
            ])->build();

        $target->getInnerType()->shouldBeLike(DataType::make(Type::STRING));
        $target->shouldIterateLike($this->getResponse());
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

        $this->shouldThrow(InvalidArgumentException::class)->duringBuild();
    }


    public function it_can_add_a_filter()
    {
        $target = $this
            ->addFilter(function ($value) {
                return Value::make($value)->isConvertibleToString();
            })
            ->values([
                self::VALUE_A,
                [self::VALUE_A, self::VALUE_B],
                self::VALUE_B,
                new \stdClass(),
                self::VALUE_C,
            ])
            ->build();

        $target->getInnerType()->shouldReturn(null);
        $target->shouldIterateLike($this->getResponse());

    }

    public function it_can_add_a_typed_filter()
    {
        $target = $this
            ->addTypedFilter(Type::STRING, function (string $value) {
                return $value != self::VALUE_D;
            })
            ->values([
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C,
                self::VALUE_D,
            ])
            ->build();


        $target->shouldIterateLike($this->getResponse());

    }


    public function it_can_add_a_converter()
    {
        $target = $this
            ->addConverter(Type::ARRAY, function (array $value) {
                return self::VALUE_B;
            })
            ->values([
                self::VALUE_A,
                [self::VALUE_A, self::VALUE_B],
                self::VALUE_C,
            ])
            ->build();

        $target->shouldIterateLike($this->getResponse());

    }

    public function it_can_add_a_validator()
    {
        $target = $this
            ->addValidator(function (string $value) {
                return $value != 'XXXX';
            })
            ->values([
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C,
            ])
            ->build();

        $target->shouldIterateLike($this->getResponse());

    }

    public function it_throws_an_exception_when_values_are_invalid()
    {
        $this
            ->addValidator(function (string $value) {
                return $value != 'XXXX';
            })
            ->values([
                self::VALUE_A,
                'XXXX',
                self::VALUE_B,
                self::VALUE_C,
            ]);

        $this->shouldThrow(InvalidArgumentException::class)->duringBuild();
    }


    public function it_can_add_a_typed_validator()
    {
        $target = $this
            ->addTypedValidator(Type::STRING, function (string $value) {
                return $value != 'XXXX';
            })
            ->values([
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C,
            ])
            ->build();

        $target->shouldIterateLike($this->getResponse());

    }

    public function it_throws_an_exception_when_values_are_invalid_for_typed_validator()
    {
        $this
            ->addTypedValidator(Type::STRING, function (string $value) {
                return $value != 'XXXX';
            })
            ->values([
                self::VALUE_A,
                'XXXX',
                self::VALUE_B,
                self::VALUE_C,
            ]);

        $this->shouldThrow(InvalidArgumentException::class)->duringBuild();
    }


    public function it_can_add_a_normalizer()
    {
        $target = $this
            ->addNormalizer(function ($value) {
                return Text::make($value);
            })
            ->values([
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C,
            ])
            ->build();

        $target->shouldIterateLike($this->getResponseWithText());
    }

    public function it_can_add_a_typed_normalizer()
    {
        $target = $this
            ->addTypedNormalizer(Type::STRING, function ($value) {
                return Text::make($value);
            })
            ->values([
                self::VALUE_A,
                self::VALUE_B,
                self::VALUE_C,
            ])
            ->build();

        $target->shouldIterateLike($this->getResponseWithText());
    }

    /**
     * @return array
     */
    private function getResponseWithText(): array
    {
        return [
            Text::make(self::VALUE_A),
            Text::make(self::VALUE_B),
            Text::make(self::VALUE_C),
        ];
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

}
