<?php

namespace spec\PlanB\DS\Map;

use PlanB\DS\AbstractBuilder;
use PlanB\DS\Exception\InvalidArgumentException;
use PlanB\DS\Map\Map;
use PlanB\DS\Map\MapBuilder;
use PlanB\DS\Stack;
use PlanB\DS\StackBuilder;
use PhpSpec\ObjectBehavior;
use PlanB\Type\DataType\Type;
use PlanB\Type\Text\Text;
use PlanB\Type\Value\Value;
use Prophecy\Argument;
use spec\PlanB\DS\Traits\TraitBuilder;

class MapBuilderSpec extends ObjectBehavior
{
    protected const VALUE_A = 'value A';
    protected const VALUE_B = 'value B';
    protected const VALUE_C = 'value C';
    protected const VALUE_D = 'value D';

    protected const TARGET_CLASSNAME = Map::class;

    public function let()
    {
        $this->beConstructedThrough('make');
    }

    public function it_retrieve_a_collection()
    {
        $this->shouldHaveType(MapBuilder::class);
        $this->build()->shouldHaveType(self::TARGET_CLASSNAME);
    }

    public function it_can_build_with_values()
    {
        $target = $this->values([
            'a' => self::VALUE_A,
            'b' => self::VALUE_B,
            'c' => self::VALUE_C,
        ])->build();

        $target->shouldIterateLike($this->getResponse());
    }

    public function it_can_set_a_type()
    {
        $this->beConstructedThrough('typed', [Type::STRING]);

        $target = $this
            ->values([
                'a' => self::VALUE_A,
                'b' => self::VALUE_B,
                'c' => self::VALUE_C,
            ])->build();

        $target->shouldIterateLike($this->getResponse());
    }

    public function it_throws_an_exception_when_build_with_invalid_type_values()
    {
        $this->beConstructedThrough('typed', [Type::STRING]);

        $this
            ->values([
                'a' => self::VALUE_A,
                'x' => [self::VALUE_A, self::VALUE_B],
                'b' => self::VALUE_B,
                'c' => self::VALUE_C,
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
                'a' => self::VALUE_A,
                'x' => [self::VALUE_A, self::VALUE_B],
                'b' => self::VALUE_B,
                'y' => new \stdClass(),
                'c' => self::VALUE_C,
            ])
            ->build();

        $target->shouldIterateLike($this->getResponse());

    }

    public function it_can_add_a_typed_filter()
    {
        $target = $this
            ->addTypedFilter(Type::STRING, function (string $value) {
                return $value != self::VALUE_D;
            })
            ->values([
                'a' => self::VALUE_A,
                'b' => self::VALUE_B,
                'c' => self::VALUE_C,
                'd' => self::VALUE_D,
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
                'a' => self::VALUE_A,
                'b' => [self::VALUE_A, self::VALUE_B],
                'c' => self::VALUE_C,
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
                'a' => self::VALUE_A,
                'b' => self::VALUE_B,
                'c' => self::VALUE_C,
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
                'a' => self::VALUE_A,
                'x' => 'XXXX',
                'b' => self::VALUE_B,
                'c' => self::VALUE_C,
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
                'a' => self::VALUE_A,
                'b' => self::VALUE_B,
                'c' => self::VALUE_C,
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
                'a' => self::VALUE_A,
                'x' => 'XXXX',
                'b' => self::VALUE_B,
                'c' => self::VALUE_C,
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
                'a' => self::VALUE_A,
                'b' => self::VALUE_B,
                'c' => self::VALUE_C,
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
                'a' => self::VALUE_A,
                'b' => self::VALUE_B,
                'c' => self::VALUE_C,
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
            'a' => Text::make(self::VALUE_A),
            'b' => Text::make(self::VALUE_B),
            'c' => Text::make(self::VALUE_C),
        ];
    }

    /**
     * @return array
     */
    private function getResponse(): array
    {
        return [
            'a' => self::VALUE_A,
            'b' => self::VALUE_B,
            'c' => self::VALUE_C,
        ];
    }
}
