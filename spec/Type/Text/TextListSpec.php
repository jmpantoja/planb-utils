<?php

namespace spec\PlanB\Type\Text;

use PhpSpec\ObjectBehavior;
use PlanB\DS\ItemList\Exception\InvalidItemException;
use PlanB\DS\ItemList\ListInterface;
use PlanB\Type\Text\Text;
use PlanB\Type\Text\TextList;


class TextListSpec extends ObjectBehavior
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
        $this->beConstructedThrough('create', []);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TextList::class);
    }

    public function it_is_list()
    {
        $this->shouldHaveType(ListInterface::class);
    }

    public function it_has_inner_type_text()
    {
        $this->getInnerType()->shouldReturn(Text::class);
    }

    public function it_can_add_values()
    {
        $this->set(self::KEY, self::ENTRY);

        $this->get(self::KEY)->shouldHaveType(Text::class);
        $this->get(self::KEY)->stringify()->shouldReturn(self::VALUE);
    }

    public function it_cannt_add_invald_values(\stdClass $noScalar)
    {
        $this->shouldThrow(InvalidItemException::class)->duringAdd($noScalar);
    }

    public function it_can_add_validator()
    {
        $this->addValidator(function ($entry) {
            return !Text::create($entry)->isBlank();
        });

        $this->set(self::KEY, self::ENTRY);

        $this->get(self::KEY)->shouldHaveType(Text::class);
        $this->get(self::KEY)->stringify()->shouldReturn(self::VALUE);

        $this->shouldThrow(InvalidItemException::class)->duringAdd(self::BLANK_TEXT);

    }

    public function it_can_disallow_blank_text()
    {
        $this->disallowBlank();

        $this->set(self::KEY, self::ENTRY);
        $this->get(self::KEY)->stringify()->shouldReturn(self::VALUE);

        $this->shouldThrow(InvalidItemException::class)->duringAdd(self::BLANK_TEXT);
    }

    public function it_can_disallow_empty_text()
    {
        $this->disallowEmpty();

        $this->set(self::KEY, self::ENTRY);
        $this->get(self::KEY)->stringify()->shouldReturn(self::VALUE);

        $this->set(self::KEY2, self::BLANK_TEXT);
        $this->get(self::KEY2)->stringify()->shouldReturn(self::BLANK_TEXT);

        $this->shouldThrow(InvalidItemException::class)->duringAdd(self::NULL_TEXT);
        $this->shouldThrow(InvalidItemException::class)->duringAdd(self::EMPTY_TEXT);
    }

    public function it_can_concat_its_items()
    {
        $this->beConstructedThrough('create', [self::PIECES]);

        $this->concat()
            ->stringify()
            ->shouldReturn(self::CONCATENADED_TEXT);
    }

    public function it_can_be_converted_to_array_of_strings()
    {
        $this->beConstructedThrough('create', [self::PIECES]);

        $this->toArray()
            ->shouldIterateAs(self::PIECES);
    }
}
