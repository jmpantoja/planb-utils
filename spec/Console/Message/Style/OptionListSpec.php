<?php

namespace spec\PlanB\Console\Message\Style;

use PlanB\Console\Message\Style\Option;
use PlanB\Console\Message\Style\OptionList;
use PhpSpec\ObjectBehavior;
use PlanB\DS\ItemList\Exception\InvalidItemException;
use PlanB\Type\Text\Text;
use PlanB\Type\Text\TextList;
use Prophecy\Argument;

class OptionListSpec extends ObjectBehavior
{

    private const FAKE_OPTION = 'fake option';

    private const KEY = 'options';

    public function let()
    {
        $this->beConstructedThrough('create');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(OptionList::class);
    }

    public function it_is_text_list()
    {
        $this->shouldHaveType(TextList::class);
    }

    public function it_can_append_a_option()
    {
        $this->add(Option::BOLD());
        $this->get('bold')->stringify()->shouldReturn('bold');
    }

    public function it_can_ignore_a_invalid_option(){
        $this->addIfIsValid(Option::BOLD);

        $this->shouldNotThrow()->duringAddIfIsValid('FAKE-OPTION');

        $this->count()->shouldReturn(1);

    }

    public function it_can_append_a_string()
    {
        $this->add(Option::BOLD);
        $this->get('bold')->stringify()->shouldReturn('bold');
    }

    public function it_throws_an_exception_when_append_an_invalid_string()
    {
        $this->shouldThrow(InvalidItemException::class)->duringAdd(self::FAKE_OPTION);
    }

    public function it_can_retrieve_the_attribute_format_by_default()
    {

        $this->toAttributeFormat(self::KEY)->stringify()->shouldReturn(Text::EMPTY_TEXT);
    }

    public function it_can_retrieve_the_custom_attribute_format()
    {
        $this->add(Option::BOLD());
        $this->add(Option::UNDERSCORE);

        $this->toAttributeFormat(self::KEY)->stringify()->shouldReturn('options=bold,underscore');
    }

    public function it_can_ignore_the_duplicate_options()
    {
        $this->add(Option::BOLD());
        $this->add(Option::UNDERSCORE);
        $this->add(Option::BOLD);
        $this->add(Option::UNDERSCORE());

        $this->toAttributeFormat(self::KEY)->stringify()->shouldReturn('options=bold,underscore');
    }

    public function it_can_be_mergered()
    {
        $list = OptionList::create();
        $list->add(Option::REVERSE());

        $this->add(Option::BOLD());
        $this->add(Option::UNDERSCORE);

        $merged = $this->merge($list);

        $merged->toAttributeFormat(self::KEY)->stringify()->shouldReturn('options=reverse,bold,underscore');
    }

    public function it_can_be_mergered_with_empty_list()
    {
        $list = OptionList::create();

        $this->add(Option::BOLD());
        $this->add(Option::UNDERSCORE);

        $merged = $this->merge($list);

        $merged->toAttributeFormat(self::KEY)->stringify()->shouldReturn('options=bold,underscore');
    }
}
