<?php

namespace spec\PlanB\Beautifier\Format;


use PhpSpec\ObjectBehavior;
use PlanB\Beautifier\Format\CountableFormat;
use PlanB\Beautifier\Format\DataObjectFormat;
use PlanB\Beautifier\Format\ExceptionFormat;
use PlanB\Beautifier\Format\FormatFactory;
use PlanB\Beautifier\Format\HashableFormat;
use PlanB\Beautifier\Format\ObjectFormat;
use PlanB\Beautifier\Format\ScalarFormat;
use PlanB\Type\Data\Data;
use PlanB\Type\Number\Number;
use Prophecy\Argument;
use Symfony\Component\DependencyInjection\Tests\Compiler\D;

class FormatFactorySpec extends ObjectBehavior
{

    public function it_is_initializable()
    {
        $this->shouldHaveType(FormatFactory::class);
    }

    public function build($value)
    {
        $this->beConstructedThrough('factory', [$value]);
    }

    public function it_retrieve_a_countable_format()
    {
        $this->build([1, 2, 3]);
        $this->shouldHaveType(CountableFormat::class);


        $this->getType()->shouldReturn('array');
        $this->getKey()->shouldReturn('count');
        $this->getValue()->shouldReturn("3");
    }


    public function it_retrieve_an_exception_format()
    {
        $this->build(new \Exception());
        $this->shouldHaveType(ExceptionFormat::class);

//        $this->getValue()->shouldReturn(Exception::class);
    }

    public function it_retrieve_a_scalar_format()
    {
        $this->build('asdad');
        $this->shouldHaveType(ScalarFormat::class);

        $this->getType()->shouldReturn('string');
        $this->getKey()->shouldReturn('');
        $this->getValue()->shouldReturn('asdad');
    }

    public function it_retrieve_a_hashable_format()
    {
        $this->build(Number::make(6454));
        $this->shouldHaveType(HashableFormat::class);

        $this->getType()->shouldReturn(Number::class);
        $this->getKey()->shouldReturn('value');
        $this->getValue()->shouldReturn('6454');
    }

    public function it_retrieve_a_data_object_format()
    {
        $this->build(Data::make('adasad'));
        $this->shouldHaveType(DataObjectFormat::class);

        $this->getType()->shouldReturn(Data::class);
        $this->getKey()->shouldReturn('string');
        $this->getValue()->shouldReturn('adasad');
    }


    public function it_retrieve_a_object_format()
    {
        $this->build(new \stdClass());
        $this->shouldHaveType(ObjectFormat::class);

        $this->getType()->shouldReturn('object');
        $this->getKey()->shouldReturn('class');
        $this->getValue()->shouldReturn(\stdClass::class);
    }
}
