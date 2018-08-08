<?php

declare(strict_types=1);

namespace spec\PlanB\DS\ItemList;


use PhpSpec\ObjectBehavior;
use PlanB\DS\ItemList\Exception\InvalidItemException;
use PlanB\DS\ItemList\Item;
use PlanB\DS\ItemList\ItemList;
use PlanB\ValueObject\Text\Text;

class ItemListWithResolverSpec extends ObjectBehavior
{

    private const UPPER_VALUE = 'ABC';

    private const LOWER_VALUE = 'abc';

    private const KEY = 'a';

    private const UPPER_KEY = 'A';

    private const LAST_ORDER = 2;

    private const FIRST_ORDER = 1;

    public function let()
    {
        $this->beAnInstanceOf(ItemList::class);
        $this->beConstructedThrough('create');
    }

    public function it_can_validate()
    {
        $onlyUpperCase = function ($value) {
            return preg_match('/^[A-Z]*$/', $value);
        };

        $this->addValidator($onlyUpperCase);

        $this->add(self::UPPER_VALUE);
        $this->count()->shouldReturn(1);

        $this->shouldThrow(InvalidItemException::class)->duringAdd(self::LOWER_VALUE);

        $this->count()->shouldReturn(1);

    }

    public function it_can_normalize_value()
    {
        $toUpperCase = function ($value) {
            return strtoupper($value);
        };

        $this->addNormalizer($toUpperCase);

        $this->add(self::LOWER_VALUE);
        $this->get(0)->shouldReturn(self::UPPER_VALUE);
    }

    public function it_can_normalize_key()
    {
        $toUpperCase = function ($key) {
            return strtoupper($key);
        };

        $this->addKeyNormalizer($toUpperCase);

        $this->set(self::KEY, self::UPPER_VALUE);
        $this->get(self::UPPER_KEY)->shouldReturn(self::UPPER_VALUE);

        $this->has(self::KEY)->shouldReturn(false);
    }

    public function it_can_chain_resolvers()
    {
        $toText = function (string $value) {
            return Text::create($value);
        };

        $noBlank = function (Text $value) {
            return !$value->isBlank();
        };

        $this
            ->addNormalizer($toText)
            ->addValidator($noBlank);

        $this->set(self::KEY, self::UPPER_VALUE);
        $this->get(self::KEY)
            ->shouldHaveType(Text::class);

        $this->get(self::KEY)
            ->stringify()
            ->shouldReturn(self::UPPER_VALUE);

    }


    public function it_can_chain_resolvers_with_priority()
    {
        $toText = function (string $value) {
            return Text::create($value);
        };

        $noBlank = function (Text $value) {
            return !$value->isBlank();
        };

        $this
            ->addValidator($noBlank, self::LAST_ORDER)
            ->addNormalizer($toText, self::FIRST_ORDER);

        $this->set(self::KEY, self::UPPER_VALUE);
        $this->get(self::KEY)
            ->shouldHaveType(Text::class);

        $this->get(self::KEY)
            ->stringify()
            ->shouldReturn(self::UPPER_VALUE);

    }

    public function it_can_silent_the_invalid_item_exception(Item $item)
    {
        $validator = function () {
            return false;
        };

        $this->silentExceptions();
        $this->addValidator($validator);

        $this->shouldNotThrow(InvalidItemException::class)->duringAdd(self::LOWER_VALUE);
    }

    public function it_add_a_hydrator(Item $item)
    {
        $normalizer = function (array $data) {

        };

        $this->addHydrator('array', $normalizer);

        $this->shouldNotThrow(InvalidItemException::class)->duringAdd(self::LOWER_VALUE);
    }


}
