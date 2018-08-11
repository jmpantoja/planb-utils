<?php

namespace spec\PlanB\Utils\Cli;

use PlanB\Utils\Cli\Message;
use PlanB\Utils\Cli\OutputAggregate;
use PlanB\Utils\Cli\Output;
use PlanB\Utils\Cli\Line;
use PhpSpec\ObjectBehavior;
use PlanB\Utils\Cli\Style;
use PlanB\Utils\Cli\Word;
use PlanB\ValueObject\Stringifable;
use Prophecy\Argument as p;


class LineSpec extends ObjectBehavior
{
    public const ONE_WORD = 'WORD #1';
    public const TWO_WORDS = 'WORD #1 WORD #2';

    public function let()
    {
        $this->beConstructedThrough('create');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Line::class);
    }

    public function it_extends_from_block()
    {
        $this->shouldHaveType(Output::class);
    }

    public function it_is_aggregable()
    {
        $this->shouldHaveType(OutputAggregate::class);
    }

    public function it_is_stringifable()
    {
        $this->shouldHaveType(Stringifable::class);
    }

    public function it_can_be_created_with_a_word()
    {
        $this->beConstructedThrough('create', [WordSpec::FORMAT, 1]);
        $this->count()->shouldReturn(1);

    }

    public function it_can_be_added_to_message(Message $message)
    {
        $this->parent($message)->shouldReturn($this);
        $this->end()->shouldReturn($message);
    }

    public function it_refuse_be_added_to_other_line(Line $line)
    {
        $this->shouldThrow(\TypeError::class)->duringParent($line);
    }

    public function it_can_add_a_word()
    {
        $word = $this->word(WordSpec::FORMAT, 1);
        $word->shouldHaveType(Word::class);

        $word->end()->shouldReturn($this);

        $this->count()->shouldReturn(1);

    }

    public function it_can_compose_a_single_word_message()
    {
        $this->word(WordSpec::FORMAT, 1);

        $this->stringify()->shouldReturn(self::ONE_WORD);
    }


    public function it_can_compose_a_multile_words_message()
    {
        $this->word(WordSpec::FORMAT, 1);
        $this->word(WordSpec::FORMAT, 2);

        $this->stringify()->shouldReturn(self::TWO_WORDS);
    }

}
