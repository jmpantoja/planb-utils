<?php

namespace spec\PlanB\Utils\TypeName;

use PhpSpec\Wrapper\ObjectWrapper;
use PlanB\Utils\TypeName\TypeName;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NativeNameSpec extends ObjectBehavior
{

    private const NATIVES = [
        'array',
        'bool',
        'callable',
        'countable',
        'double',
        'float',
        'int',
        'integer',
        'iterable',
        'long',
        'null',
        'numeric',
        'object',
        'real',
        'resource',
        'scalar',
        'string'
    ];

    public function let()
    {
        $this->beAnInstanceOf(TypeName::class);
        $this->beConstructedThrough('create', ['string']);
    }

    public function it_can_show_if_typename_is_a_native()
    {
        foreach (self::NATIVES as $native) {
            $this->overwite($native);

            $this->isNativeTypeName()
                ->shouldReturn(true);
        }
    }

    public function it_can_show_if_is_typeof()
    {
        $this->beConstructedThrough('create', ['string']);

        $this->isTypeOf('string', 'array')
            ->shouldReturn(true);

    }

    public function it_can_show_if_is_not_typeof()
    {
        $this->beConstructedThrough('create', ['string']);

        $this->isTypeOf('int', 'array')
            ->shouldReturn(false);

    }

    public function it_can_show_if_typename_is_not_a_native()
    {
        $this->overwite('fake value');
        $this->isNativeTypeName()
            ->shouldReturn(true);
    }

    public function it_can_show_if_typename_is_a_class_or_interfacename()
    {
        $this->isClassOrInterfaceName()
            ->shouldReturn(false);
    }

    public function it_gets_a_list_of_native_types()
    {
        $this->getNativeTypes()
            ->shouldReturn(self::NATIVES);
    }

    public function it_can_show_if_typename_is_valid()
    {
        $this->isValid()
            ->shouldReturn(true);
    }

    public function it_can_convert_to_string()
    {
        $this->__toString()
            ->shouldReturn('string');
    }

}
