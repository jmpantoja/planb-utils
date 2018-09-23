<?php

namespace spec\PlanB\Type\Text;

use PlanB\Type\Assurance\Assurance;
use PlanB\Type\Assurance\Exception\AssertException;
use PlanB\Type\Path\Path;
use PlanB\Type\Text\Text;
use PlanB\Type\Text\TextAssurance;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TextAssuranceSpec extends ObjectBehavior
{
    private const SOME_TEXT = 'cadena de texto';

    public function let(Text $text)
    {
        $text->stringify()->willReturn(self::SOME_TEXT);
        $text->__toString()->willReturn(self::SOME_TEXT);

        $this->beConstructedThrough('fromText', [$text]);
    }

    public function it_is_initializable_from_string()
    {
        $this->beConstructedThrough('make', [self::SOME_TEXT]);
        $this->shouldHaveType(TextAssurance::class);

        $this->stringify()
            ->shouldReturn(self::SOME_TEXT);
    }

    public function it_is_initializable_from_stringifable(Path $path)
    {
        $path->stringify()->willReturn('/tmp');

        $this->beConstructedThrough('fromStringifable', [$path]);
        $this->shouldHaveType(TextAssurance::class);

        $this->stringify()
            ->shouldReturn('/tmp');
    }

    public function it_is_initializable_from_stringifable_passing_a_text()
    {
        $text = Text::make(self::SOME_TEXT);

        $this->beConstructedThrough('fromStringifable', [$text]);
        $this->shouldHaveType(TextAssurance::class);

        $this->stringify()
            ->shouldReturn(self::SOME_TEXT);
    }

    public function it_is_initializable_from_text()
    {
        $text = Text::make(self::SOME_TEXT);

        $this->beConstructedThrough('fromText', [$text]);
        $this->shouldHaveType(TextAssurance::class);

        $this->stringify()
            ->shouldReturn(self::SOME_TEXT);
    }


    public function it_is_assurance()
    {
        $this->shouldHaveType(Assurance::class);
    }

    public function it_can_retrieve_the_text_object()
    {
        $this->beConstructedThrough('make', [self::SOME_TEXT]);


        $this->end()
            ->stringify()
            ->shouldReturn(self::SOME_TEXT);
    }

    public function it_can_retrieve_the_text_object_as_string()
    {
        $this->beConstructedThrough('make', [self::SOME_TEXT]);

        $this->__toString()
            ->shouldReturn(self::SOME_TEXT);

        $this->stringify()
            ->shouldReturn(self::SOME_TEXT);
    }

    public function it_can_ensure_that_a_text_is_not_empty(Text $text)
    {
        $text->isEmpty()
            ->willReturn(false);

        $this->isNotEmpty()->shouldReturn($this);
    }

    public function it_throw_an_exception_is_a_text_is_empty(Text $text)
    {
        $text->isEmpty()
            ->willReturn(true);

        $this->shouldThrow(AssertException::class)->duringIsNotEmpty();
    }


    public function it_can_ensure_that_a_text_is_not_blank(Text $text)
    {
        $text->isBlank()
            ->willReturn(false);

        $this->isNotBlank()->shouldReturn($this);
    }

    public function it_throw_an_exception_is_a_text_is_blank(Text $text)
    {
        $text->isBlank()
            ->willReturn(true);

        $this->shouldThrow(AssertException::class)->duringIsNotBlank();
    }
}
