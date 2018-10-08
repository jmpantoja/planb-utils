<?php

namespace spec\PlanB\Console\Beautifier;

use PlanB\Console\Beautifier\Beautifier;
use PhpSpec\ObjectBehavior;
use PlanB\Console\Beautifier\Format;
use PlanB\Console\Beautifier\Formatter\ValueFormatter;
use PlanB\Type\Data\Data;
use PlanB\Type\Number\Number;
use PlanB\Type\Text\Text;
use Prophecy\Argument;
use spec\PhpSpec\Wrapper\Subject\WrappedObjectSpec;

class BeautifierSpec extends ObjectBehavior
{
    protected const VALUE_TEXT = 'value';

    /**
     * Override this method to provide your own inline matchers
     *
     * @link http://phpspec.net/cookbook/matchers.html Matchers cookbook
     * @return array a list of inline matchers
     */
    public function getMatchers(): array
    {
        return [
            'beFullFormat' => function ($subject, $type, $key, $value) {

                if (is_object($type)) {
                    $type = get_class($type);
                }

                $value = beautify($value, Format::SIMPLE());

                if (!is_null($key)) {
                    $expected = sprintf(ValueFormatter::FULL_WITH_KEY, $type, $key, $value);
                } else {
                    $expected = sprintf(ValueFormatter::FULL_WITHOUT_KEY, $type, $value);
                }

                if ($expected !== $subject) {
                    dump(" subject: $subject", "expected: $expected");
                    return false;
                }

                return true;
            },
            'beNumericFormat' => function ($subject, $value) {

                $expected = sprintf(ValueFormatter::NUMERIC, $value);

                if ($expected !== $subject) {
                    dump(" subject: $subject", "expected: $expected");
                    return false;
                }

                return true;
            },
            'beObjectFormat' => function ($subject, $value) {

                $expected = sprintf(ValueFormatter::CLASSNAME, $value);

                if ($expected !== $subject) {
                    dump(" subject: $subject", "expected: $expected");
                    return false;
                }

                return true;
            },
            'beTextFormat' => function ($subject, $value) {

                $expected = sprintf(ValueFormatter::TEXT, $value);

                if ($expected !== $subject) {
                    dump(" subject: $subject", "expected: $expected");
                    return false;
                }

                return true;
            }
        ];
    }


    public function let($value)
    {
        $this->beConstructedThrough('make');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Beautifier::class);
    }

    public function it_retrieve_a_beauty_array()
    {
        $this->full(['a', 'b', 'c'])
            ->shouldBeFullFormat('array', 'count', '3');

        $this->simple(['a', 'b', 'c'])
            ->shouldBeNumericFormat('array(3)');
    }

    public function it_retrieve_a_beauty_countable(\Countable $countable)
    {
        $countable->count()->willReturn(1);
        $expected = sprintf('%s(%s)', get_class($countable->getWrappedObject()), 1);

        $this->full($countable)
            ->shouldBeFullFormat($countable, 'count', 1);

        $this->simple($countable)
            ->shouldBeObjectFormat($expected);

    }

    public function it_retrieve_a_beauty_text(Text $text)
    {
        $text->__toString()->willReturn('hola');

        $this->full($text)
            ->shouldBeFullFormat($text, 'text', 'hola');

        $this->simple($text)
            ->shouldBeTextFormat('hola');

    }

    public function it_retrieve_a_beauty_string()
    {
        $text = 'hola';

        $this->full($text)
            ->shouldBeFullFormat('string', null, 'hola');

        $this->simple($text)
            ->shouldBeTextFormat('hola');

    }

    public function it_retrieve_a_beauty_number()
    {
        $this->full(14)
            ->shouldBeFullFormat('integer', null, 14);

        $this->simple(14)
            ->shouldBeNumericFormat(14);

    }

    public function it_retrieve_a_beauty_object()
    {
        $obj = new \stdClass();

        $this->full($obj)
            ->shouldBeFullFormat('object', 'class', 'stdClass');

        $this->simple($obj)
            ->shouldBeObjectFormat(\stdClass::class);
    }

    public function it_retrieve_a_beauty_hashable()
    {
        $number = Number::make(3);

        $this->full($number)
            ->shouldBeFullFormat($number, 'value', 3);

        $this->simple($number)
            ->shouldBeNumericFormat(3);
    }

    public function it_retrieve_a_beauty_typename()
    {
        $this->type(Text::class)
            ->shouldBeObjectFormat(Text::class);
    }

    public function it_retrieve_a_beauty_data_wrapping_a_scalar()
    {
        $number = 3;
        $data = Data::make($number);

        $this->full($data)
            ->shouldBeFullFormat($data, 'value', 3);

        $this->simple($data)
            ->shouldBeNumericFormat(3);
    }

    public function it_retrieve_a_beauty_data_wrapping_a_hashable()
    {
        $number = Number::make(3);
        $data = Data::make($number);

        $this->full($data)
            ->shouldBeFullFormat($data, Number::class, 3);

        $this->simple($data)
            ->shouldBeNumericFormat(3);
    }

    public function it_retrieve_a_beauty_data_wrapping_a_regular_object()
    {
        $obj = new \stdClass();
        $data = Data::make($obj);

        $this->full($data)
            ->shouldBeFullFormat($data, 'class', $obj);

        $this->simple($data)
            ->shouldBeObjectFormat(\stdClass::class);
    }

    public function it_retrieve_a_beauty_exception()
    {
        $response = $this->simple(new \Exception('message'));

        $response->shouldContain('[Exception]');
        $response->shouldContain(__FILE__);
        $response->shouldContain('message');
    }


    public function it_retrieve_a_beauty_exception_with_trace()
    {
        $response = $this->full(new \Exception('message'));

        $response->shouldContain('[Exception]');
        $response->shouldContain(__FILE__);
        $response->shouldContain('message');
        $response->shouldContain('#0');
    }

}
