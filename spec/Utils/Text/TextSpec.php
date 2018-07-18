<?php

namespace spec\PlanB\Utils\Text;

use PlanB\Utils\Text\Text;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TextSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->beConstructedThrough('create', ['texto']);

        $this->shouldHaveType(Text::class);
    }

    public function it_can_recognize_if_a_string_is_empty()
    {
        $this->beConstructedThrough('create', ['']);

        $this->isEmpty()
            ->shouldReturn(true);

        $this
            ->overwite('  ')
            ->isEmpty()
            ->shouldReturn(false);

        $this
            ->overwite('0')
            ->isEmpty()
            ->shouldReturn(false);
    }

    public function it_can_recognize_if_a_string_is_blank()
    {
        $this->beConstructedThrough('create', ['']);

        $this->isBlank()
            ->shouldReturn(true);

        $this
            ->overwite('  ')
            ->isBlank()
            ->shouldReturn(true);

        $this
            ->overwite('0')
            ->isBlank()
            ->shouldReturn(false);
    }

    public function it_can_retrive_the_length_of_a_text()
    {
        $this->beConstructedThrough('create', ['']);

        $this->getLength()
            ->shouldReturn(0);

        $this
            ->overwite('  ')
            ->getLength()
            ->shouldReturn(2);

    }

    public function it_can_strip_whitespaces_from_begin_and_end_of_a_string()
    {

        $original = '  text   ';
        $this->beConstructedThrough('create', [$original]);

        $this->trim()
            ->toString()
            ->shouldReturn('text');

        $this->toString()
            ->shouldReturn($original);

    }

    public function it_can_strip_any_character_from_begin_and_end_of_a_string()
    {

        $original = '  text   ';
        $this->beConstructedThrough('create', [$original]);

        $this->trim(' t')
            ->toString()
            ->shouldReturn('ex');

        $this->toString()
            ->shouldReturn($original);

    }

    public function it_can_strip_whitespaces_from_end_of_a_string()
    {

        $original = '  text   ';
        $this->beConstructedThrough('create', [$original]);

        $this->rtrim()
            ->toString()
            ->shouldReturn('  text');

        $this->toString()
            ->shouldReturn($original);

    }

    public function it_can_strip_any_character_from_end_of_a_string()
    {

        $original = '  text   ';
        $this->beConstructedThrough('create', [$original]);

        $this->rtrim(' t')
            ->toString()
            ->shouldReturn('  tex');

        $this->toString()
            ->shouldReturn($original);

    }


    public function it_can_strip_whitespaces_from_begin_of_a_string()
    {

        $original = '  text  ';
        $this->beConstructedThrough('create', [$original]);

        $this->ltrim()
            ->toString()
            ->shouldReturn('text  ');

        $this->toString()
            ->shouldReturn($original);

    }

    public function it_can_strip_any_character_from_begin_of_a_string()
    {

        $original = '  text  ';
        $this->beConstructedThrough('create', [$original]);

        $this->ltrim(' t')
            ->toString()
            ->shouldReturn('ext  ');

        $this->toString()
            ->shouldReturn($original);

    }

    public function it_can_convert_a_string_to_camelcase()
    {
        $this->beConstructedThrough('create', ['esto    9    deberia_ser-camel|case']);

        $this->toCamelCase()
            ->toString()
            ->shouldReturn('esto9DeberiaSerCamelCase');
    }
}
