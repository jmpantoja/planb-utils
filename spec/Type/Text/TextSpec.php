<?php

namespace spec\PlanB\Type\Text;


use Ds\Hashable;
use PlanB\Type\Assurance\Exception\AssertException;
use PlanB\Type\Text\Text;
use PhpSpec\ObjectBehavior;
use PlanB\Type\Text\TextVector;
use Prophecy\Argument;

class TextSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->beConstructedThrough('create', ['texto']);

        $this->shouldHaveType(Text::class);
    }

    public function it_is_hashable()
    {
        $this->beConstructedThrough('create', ['texto']);

        $this->shouldHaveType(Hashable::class);
    }


    public function it_can_be_created_by_format_text()
    {
        $this->beConstructedThrough('format', ['hola %s y %s', 'pepe', 'juan']);

        $this->stringify()
            ->shouldReturn('hola pepe y juan');
    }

    public function it_can_be_created_by_concat_several_text()
    {
        $this->beConstructedThrough('concat', ['hola', 'pepe', 'y', 'juan']);

        $this->stringify()
            ->shouldReturn('hola pepe y juan');
    }

    public function it_can_be_created_by_join_several_text()
    {
        $this->beConstructedThrough('join', ['hola', 'pepe', 'y', 'juan']);

        $this->stringify()
            ->shouldReturn('holapepeyjuan');
    }


    public function it_throw_an_exception_when_create_with_invalid_value()
    {
        $this->beConstructedThrough('create', [new \stdClass()]);

        $this->shouldThrow(AssertException::class)->duringInstantiation();
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

    public function it_can_split_a_string_using_a_regex()
    {
        $this->beConstructedThrough('create', ['separa|por-espacios_o guiones']);


        $response = $this->split('/[_\s\W]+/');
        $response->shouldHaveType(TextVector::class);

        $response->get(0)->stringify()->shouldReturn('separa');
        $response->get(1)->stringify()->shouldReturn('por');
        $response->get(2)->stringify()->shouldReturn('espacios');
        $response->get(3)->stringify()->shouldReturn('o');
        $response->get(4)->stringify()->shouldReturn('guiones');
    }

    public function it_can_split_a_string_using_a_delimiter()
    {
        $this->beConstructedThrough('create', ['separa-por-guiones']);

        $response = $this->explode('-');
        $response->shouldHaveType(TextVector::class);

        $response->get(0)->stringify()->shouldReturn('separa');
        $response->get(1)->stringify()->shouldReturn('por');
        $response->get(2)->stringify()->shouldReturn('guiones');


    }

    public function it_can_convert_a_complete_string_to_lower_case()
    {
        $this->beConstructedThrough('create', ['TEXTO EN MAYUSCULAS']);

        $this->toLower()
            ->stringify()
            ->shouldReturn('texto en mayusculas');
    }


    public function it_can_convert_the_first_character_to_lower_case()
    {
        $this->beConstructedThrough('create', ['TEXTO EN MAYUSCULAS']);

        $this->toLowerFirst()
            ->stringify()
            ->shouldReturn('tEXTO EN MAYUSCULAS');
    }

    public function it_can_convert_a_complete_string_to_upper_case()
    {
        $this->beConstructedThrough('create', ['texto en minusculas']);

        $this->toUpper()
            ->stringify()
            ->shouldReturn('TEXTO EN MINUSCULAS');
    }

    public function it_can_convert_the_first_character_to_upper_case()
    {
        $this->beConstructedThrough('create', ['texto en minusculas']);

        $this->toUpperFirst()
            ->stringify()
            ->shouldReturn('Texto en minusculas');
    }

    public function it_can_append_a_string_to_another()
    {
        $this->beConstructedThrough('create', ['1 2 ']);

        $this->append('3 4')
            ->stringify()
            ->shouldReturn('1 2 3 4');
    }


    public function it_can_replace_a_part_of_string_by_another_one()
    {
        $this->beConstructedThrough('create', ['1palabras 2y 3numeros ']);

        $this->replace('/([0-9])(.*)\s/U', function ($num, $word) {
            return sprintf('%s(%s)', $num, $word);
        })
            ->stringify()
            ->shouldReturn('1(palabras)2(y)3(numeros)');
    }


    public function it_can_add_padding_to_text()
    {

        $this->beConstructedThrough('create', ['000']);

        $this->padding(7, '-', STR_PAD_BOTH)
            ->stringify()
            ->shouldReturn('--000--');
    }

    public function it_can_strip_tags()
    {

        $input = 'before <a href="#">content</a> after';
        $this->beConstructedThrough('create', [$input]);

        $this->stripTags()
            ->stringify()
            ->shouldReturn('before content after');

        $this->stripTags('<a>')
            ->stringify()
            ->shouldReturn($input);
    }


    public function it_has_hash()
    {
        $this->beConstructedThrough('create', ['texto']);

        $this->hash()->shouldReturn('texto');
    }

    public function it_determine_if_two_texts_are_equals()
    {
        $this->beConstructedThrough('create', ['texto']);

        $this->equals(Text::create('texto'))->shouldReturn(true);

        $this->equals(Text::create('otro texto'))->shouldReturn(false);

        $this->equals('texto')->shouldReturn(false);

    }

}
