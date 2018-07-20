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
            ->stringify()
            ->shouldReturn('text');

        $this->stringify()
            ->shouldReturn($original);

    }

    public function it_can_strip_any_character_from_begin_and_end_of_a_string()
    {

        $original = '  text   ';
        $this->beConstructedThrough('create', [$original]);

        $this->trim(' t')
            ->stringify()
            ->shouldReturn('ex');

        $this->stringify()
            ->shouldReturn($original);

    }

    public function it_can_strip_whitespaces_from_end_of_a_string()
    {

        $original = '  text   ';
        $this->beConstructedThrough('create', [$original]);

        $this->rtrim()
            ->stringify()
            ->shouldReturn('  text');

        $this->stringify()
            ->shouldReturn($original);

    }

    public function it_can_strip_any_character_from_end_of_a_string()
    {

        $original = '  text   ';
        $this->beConstructedThrough('create', [$original]);

        $this->rtrim(' t')
            ->stringify()
            ->shouldReturn('  tex');

        $this->stringify()
            ->shouldReturn($original);

    }


    public function it_can_strip_whitespaces_from_begin_of_a_string()
    {

        $original = '  text  ';
        $this->beConstructedThrough('create', [$original]);

        $this->ltrim()
            ->stringify()
            ->shouldReturn('text  ');

        $this->stringify()
            ->shouldReturn($original);

    }

    public function it_can_strip_any_character_from_begin_of_a_string()
    {

        $original = '  text  ';
        $this->beConstructedThrough('create', [$original]);

        $this->ltrim(' t')
            ->stringify()
            ->shouldReturn('ext  ');

        $this->stringify()
            ->shouldReturn($original);

    }

    public function it_can_convert_a_string_to_camelcase()
    {
        $this->beConstructedThrough('create', ['esto    9    deberia_ser-camel|case']);

        $this->toCamelCase()
            ->stringify()
            ->shouldReturn('esto9DeberiaSerCamelCase');
    }


    public function it_can_convert_a_string_to_snakecase()
    {
        $this->beConstructedThrough('create', ['esto |  Deberia - SerSnake-_Case']);

        $this->toSnakeCase()
            ->stringify()
            ->shouldReturn('esto_deberia_ser_snake_case');
    }

    public function it_can_convert_a_string_to_snakecase_with_custom_separator()
    {
        $this->beConstructedThrough('create', ['esto |  Deberia - SerSnake-_Case']);

        $this->toSnakeCase('-')
            ->stringify()
            ->shouldReturn('esto-deberia-ser-snake-case');
    }
}
