<?php

namespace spec\PlanB\Type\Text;

use PlanB\Type\Text\Text;
use PlanB\Type\Text\TextDeque;
use PlanB\Type\Text\TextListBuilder;
use PhpSpec\ObjectBehavior;
use PlanB\Type\Text\TextMap;
use PlanB\Type\Text\TextPriorityQueue;
use PlanB\Type\Text\TextQueue;
use PlanB\Type\Text\TextSet;
use PlanB\Type\Text\TextStack;
use PlanB\Type\Text\TextVector;
use Prophecy\Argument;

class TextListBuilderSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('make');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TextListBuilder::class);
    }

    public function it_build_a_text_vector()
    {
        $this->vector()->shouldHaveType(TextVector::class);
    }

    public function it_build_a_text_deque()
    {
        $this->deque()->shouldHaveType(TextDeque::class);
    }

    public function it_build_a_text_stack()
    {
        $this->stack()->shouldHaveType(TextStack::class);
    }

    public function it_build_a_text_queue()
    {
        $this->queue()->shouldHaveType(TextQueue::class);
    }


    public function it_build_a_text_priority_queue()
    {
        $this->priorityQueue()->shouldHaveType(TextPriorityQueue::class);
    }


    public function it_build_a_text_map()
    {
        $this->map()->shouldHaveType(TextMap::class);
    }


    public function it_build_a_text_set()
    {
        $this->set()->shouldHaveType(TextSet::class);
    }

    public function it_can_be_configured_for_ignore_blank_text()
    {
        $this->ignoreBlank()
            ->values([
                'value_A',
                Text::EMPTY_TEXT,
                Text::BLANK_TEXT,
                Text::create(Text::EMPTY_TEXT),
                Text::create(Text::BLANK_TEXT),

            ]);

        $expected = ['value_A'];

        $this->vector()->toArrayOfStrings($expected);
        $this->deque()->toArrayOfStrings($expected);
        $this->stack()->toArrayOfStrings($expected);
        $this->queue()->toArrayOfStrings($expected);
        $this->priorityQueue()->toArrayOfStrings($expected);
        $this->set()->toArrayOfStrings($expected);
        $this->map()->toArrayOfStrings($expected);
    }


    public function it_can_be_configured_for_ignore_empty_text()
    {
        $this->ignoreEmpty()
            ->values([
                'value_A',
                Text::EMPTY_TEXT,
                Text::BLANK_TEXT,
                Text::create(Text::EMPTY_TEXT),
                Text::create(Text::BLANK_TEXT),
            ]);

        $expected = ['value_A', Text::BLANK_TEXT, Text::BLANK_TEXT];

        $this->vector()->toArrayOfStrings($expected);
        $this->deque()->toArrayOfStrings($expected);
        $this->stack()->toArrayOfStrings($expected);
        $this->queue()->toArrayOfStrings($expected);
        $this->priorityQueue()->toArrayOfStrings($expected);
        $this->set()->toArrayOfStrings($expected);
        $this->map()->toArrayOfStrings($expected);
    }
}
