<?php

namespace spec\PlanB\DS\ItemList;

use PlanB\DS\ItemList\Item;
use PhpSpec\ObjectBehavior;
use PlanB\Type\DataType\Type;
use PlanB\Type\Value\Value;
use PlanB\Type\DataType\DataType;
use Prophecy\Argument;

class ItemSpec extends ObjectBehavior
{

    private const VALUE = 'value';

    private const KEY = 'key';

    private const NEW_VALUE = 'nuevo-valor';

    private const NEW_KEY = 'nueva-key';

    private const NUMBER = 234242;

    private const ARRAY = [];

    private const SERIALIZED_NUMBER = '<fg=cyan>Value</>: <fg=yellow>[integer: 234242]</>';
    private const SERIALIZED_ARRAY = '<fg=cyan>Value</>: <fg=yellow>[array(0)]</>';

    private const SERIALIZED_KEY = '<fg=cyan>Key</>: <fg=yellow>[string: "key"]</>';
    private const SERIALIZED_VALUE = '<fg=cyan>Value</>: <fg=yellow>[string: "value"]</>';

    public function let()
    {
        $this->beConstructedFromValue(self::VALUE);
    }

    public function it_is_initializable_from_value()
    {
        $this->shouldHaveType(Item::class);
        $this->hasKey()->shouldReturn(false);
    }

    public function it_is_initializable_from_item()
    {
        $this->beConstructedFromKeyValue(self::KEY, self::VALUE);
        $this->shouldHaveType(Item::class);
        $this->hasKey()->shouldReturn(true);
    }

    public function it_can_retrive_value()
    {
        $this->getValue()->shouldReturn(self::VALUE);
    }


    public function it_check_type_of()
    {
        $this->isTypeOf('string')->shouldReturn(true);
        $this->isTypeOf('float')->shouldReturn(false);
    }


    public function it_can_retrive_the_typename()
    {
        $this->getType()->shouldReturn(Type::STRING);
    }

    public function it_can_retrive_key()
    {
        $this->beConstructedFromKeyValue(self::KEY, self::VALUE);
        $this->getKey()->shouldReturn(self::KEY);
    }


    public function it_retrive_null_if_has_not_key()
    {
        $this->getKey()->shouldReturn(null);
    }

    public function it_can_sets_a_new_value()
    {
        $this->setValue(self::NEW_VALUE)
            ->getValue()
            ->shouldReturn(self::NEW_VALUE);

    }

    public function it_can_sets_a_new_key()
    {
        $this->setKey(self::NEW_KEY)
            ->getKey()
            ->shouldReturn(self::NEW_KEY);

    }

    public function it_can_convert_to_string()
    {
        $this->beConstructedFromKeyValue(self::KEY, self::VALUE);

        $this->__toString()->shouldContain(self::SERIALIZED_KEY);
        $this->__toString()->shouldContain(self::SERIALIZED_VALUE);

        $item = $this->setValue(self::NUMBER);
        $item->__toString()->shouldContain(self::SERIALIZED_NUMBER);


        $item = $this->setValue(self::ARRAY);
        $item->__toString()->shouldContain(self::SERIALIZED_ARRAY);
    }

}
