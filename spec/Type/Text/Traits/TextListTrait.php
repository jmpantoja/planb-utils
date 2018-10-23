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

namespace spec\PlanB\Type\Text\Traits;


use PlanB\DS\Exception\InvalidArgumentException;
use PlanB\DS\Resolver\AbstractResolver;
use PlanB\DS\Resolver\Resolver;
use PlanB\Type\DataType\DataType;
use PlanB\Type\Text\Text;

trait TextListTrait
{
    public function let()
    {
        $this->beConstructedThrough('make', [self::PIECES]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(self::CLASSNAME);
    }

    public function it_has_inner_type_text()
    {
        $this->getInnerType()->shouldBeLike(DataType::make(Text::class));
    }

    public function it_throw_an_exception_when_add_an_invalid_value()
    {
        $noScalar = new \stdClass();

        $this->beConstructedThrough('make', [[
            self::ENTRY,
            self::VALUE,
            $noScalar
        ]]);

        $this->shouldThrow(InvalidArgumentException::class)->duringInstantiation();
    }

    public function it_can_concat_its_items()
    {
        $this->concat()
            ->stringify()
            ->shouldReturn(self::CONCATENADED_TEXT);
    }

    public function it_can_be_converted_to_array_of_strings()
    {
        $this->toArrayOfStrings()
            ->shouldIterateAs(self::RETURNED_PIECES);
    }

    public function it_can_add_validator()
    {
        $resolver = Resolver::make()
            ->validator(function (Text $text) {
                return !$text->isBlank();
            });


        $this->beConstructedWith([
            self::ENTRY,
            self::VALUE,
            Text::BLANK_TEXT
        ], $resolver);

        $this->shouldHaveType(self::CLASSNAME);

//        $this->shouldThrow(InvalidArgumentException::class)->duringInstantiation();

    }
}
