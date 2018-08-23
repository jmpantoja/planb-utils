<?php

namespace spec\PlanB\DS\TypedList;

use PlanB\DS\ItemList\Exception\InvalidItemException;
use PlanB\DS\TypedList\TypedList;
use PhpSpec\ObjectBehavior;
use PlanB\Utils\Type\Type;
use PlanB\Type\Text\Text;
use Prophecy\Argument;
use spec\PlanB\DS\ItemList\Fake\Word;

class TypedListSpec extends ObjectBehavior
{
    private const STRING_A = 'primer elemento';
    private const STRING_B = 'segundo elemento';

    private const NUMBER_A = 4746545;

    public function let()
    {
        $this->beConstructedThrough('create', [Type::STRING]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TypedList::class);
    }


    public function it_can_add_same_type_elements()
    {
        $this->add(self::STRING_A);
        $this->add(self::STRING_B);
        $this->count()->shouldReturn(2);
    }

    public function it_can_be_created_from_type()
    {
        $this->getInnerType()->shouldReturn(Type::STRING);
    }

    public function it_refuse_add_different_type_elements_case_1()
    {
        $this->add(self::STRING_A);

        $this->shouldThrow(InvalidItemException::class)->duringAdd(self::NUMBER_A);
    }

    public function it_refuse_add_different_type_elements_case_2()
    {
        $this->beConstructedThrough('create', [Type::STRING]);
        $this->shouldThrow(InvalidItemException::class)->duringAdd(self::NUMBER_A);
    }

    public function it_retrieve_maximun()
    {
        $this->addSomeElements();
        $response = $this->max(function (Text $text) {
            return $text->getLength();
        });

        $response->shouldBeLike(8);
    }

    public function it_retrieve_null_as_maximum_on_empty()
    {
        $response = $this->max(function (Text $text) {
            return $text->getLength();
        });

        $response->shouldBeLike(null);
    }

    public function it_retrieve_minimum()
    {
        $this->addSomeElements();
        $response = $this->min(function (Text $text) {
            return $text->getLength();
        });

        $response->shouldBeLike(4);
    }

    public function it_retrieve_null_as_minimum_on_empty()
    {
        $response = $this->min(function (Text $text) {
            return $text->getLength();
        });

        $response->shouldBeLike(null);
    }


    protected function addSomeElements()
    {
        $this->beConstructedThrough('create', [Text::class]);
        $this->addAll([
            Text::create('xxxx'),
            Text::create('xxxxxxxx'),
            Text::create('xxxxxx')
        ]);
    }


}
