<?php

namespace spec\PlanB\Type\Text;

use PhpSpec\ObjectBehavior;
use PlanB\DS\Exception\InvalidArgumentException;
use PlanB\DS\Resolver\Resolver;
use PlanB\DS\Vector\Vector;
use PlanB\Type\DataType\DataType;
use PlanB\Type\Text\Text;
use PlanB\Type\Text\TextVector;


class TextVectorSpec extends ObjectBehavior
{
    private const ENTRY = 421429;
    private const KEY = 'a';
    private const KEY2 = 'b';

    private const VALUE = '421429';
    private const BLANK_TEXT = '     ';
    private const EMPTY_TEXT = '';
    private const NULL_TEXT = null;

    private const PIECES = [
        'piece A',
        'piece B',
        'piece C'
    ];

    private const CONCATENADED_TEXT = 'piece A piece B piece C';

    public function let()
    {
        $this->beConstructedThrough('make', []);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TextVector::class);
    }

    public function it_has_inner_type_text()
    {
        $this->getInnerType()->shouldBeLike(DataType::create(Text::class));
    }

    public function it_can_add_values()
    {
        $this->push(self::ENTRY);

        $this->get(0)->shouldHaveType(Text::class);
        $this->get(0)->stringify()->shouldReturn(self::VALUE);
    }

    public function it_cannt_add_invald_values(\stdClass $noScalar)
    {
        $this->shouldThrow(InvalidArgumentException::class)->duringPush($noScalar);
    }

    public function it_can_add_validator()
    {
        $resolver = Resolver::make()
            ->addValidator(function (Text $text) {
                return !$text->isBlank();
            });

        $this->beConstructedThrough('make', [[], $resolver]);

        $this->push(self::ENTRY);

        $this->get(0)->shouldHaveType(Text::class);
        $this->get(0)->stringify()->shouldReturn(self::VALUE);

        $this->shouldThrow(InvalidArgumentException::class)->duringPush(self::BLANK_TEXT);

    }

    public function it_can_concat_its_items()
    {
        $this->beConstructedThrough('make', [self::PIECES]);

        $this->concat()
            ->stringify()
            ->shouldReturn(self::CONCATENADED_TEXT);
    }

    public function it_can_be_converted_to_array_of_strings()
    {
        $this->beConstructedThrough('make', [self::PIECES]);

        $this->toArrayOfStrings()
            ->shouldIterateAs(self::PIECES);
    }
}
