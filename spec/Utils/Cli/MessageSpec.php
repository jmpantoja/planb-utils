<?php

namespace spec\PlanB\Utils\Cli;

use PlanB\DS\ItemList\TypableInterface;
use PlanB\DS\ItemList\TypedList;
use PlanB\Utils\Cli\Align;
use PlanB\Utils\Cli\Block;
use PlanB\Utils\Cli\Color;
use PlanB\Utils\Cli\Line;
use PlanB\Utils\Cli\Option;
use PlanB\Utils\Cli\OutputAggregate;
use PlanB\Utils\Cli\ComposedOutput;
use PlanB\Utils\Cli\Message;
use PhpSpec\ObjectBehavior;
use PlanB\Utils\Cli\Paragraph;
use PlanB\ValueObject\Stringifable;
use PlanB\ValueObject\Text\Text;
use Prophecy\Argument;


class MessageSpec extends ObjectBehavior
{

    public function let()
    {
        $this->beConstructedThrough('create');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Message::class);
    }

    public function it_count_zero_on_default()
    {
        $this->count()->shouldReturn(0);
    }

    public function it_return_an_empty_string_by_default()
    {
        $this->stringify()->shouldReturn('');
        $this->__toString()->shouldReturn('');
    }

    public function it_can_add_a_block()
    {
        $this->block('')->shouldHaveType(Paragraph::class);
        $this->count()->shouldReturn(1);
    }

    public function it_can_set_parent_of_added_child()
    {
        $this->block('first block')->end()->shouldReturn($this);
    }

    public function it_retrieve_empty_text_when_is_empty()
    {

        $this->stringify()
            ->shouldReturn(Text::EMPTY_TEXT);
    }

    public function it_can_render_blocks()
    {
        $message = $this->block('first block')->end()
            ->block('second block')->end();

        $message->stringify()
            ->shouldReturn("first block \nsecond block");
    }


    public function it_can_calcule_max_length()
    {
        $message = $this
            ->block('1234567')->end()
            ->block('1234')->end()
            ->block('12345678')->end()
            ->block('123')->end();

        $message->getMaxLenght()
            ->shouldReturn(8);
    }

    public function it_return_it_self_on_end()
    {
        $this->end()->shouldReturn($this);
    }

}