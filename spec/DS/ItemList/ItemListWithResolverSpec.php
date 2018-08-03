<?php

declare(strict_types=1);

namespace spec\PlanB\DS\ItemList;


use PhpSpec\ObjectBehavior;
use PlanB\DS\ItemList\ItemList;
use PlanB\DS\ItemList\Exception\ReconfigureFullyListException;
use PlanB\DS\ItemList\Resolver\Exception\InvalidResolverException;
use PlanB\DS\ItemResolver\Exception\InvalidValueTypeException;
use PlanB\DS\ItemResolver\ItemResolver;
use spec\PlanB\DS\ItemList\Stub\Word;

class ItemListWithResolverSpec extends ObjectBehavior
{

    public function let()
    {
        $this->beAnInstanceOf(ItemList::class);
        $this->beConstructedThrough('create');
    }

    public function it_can_add_a_custom_resolver()
    {
        $this->addResolver(function ($value) {
            //no hace nada
        })->shouldReturn($this);


        $this->add('cadena');
        $this->get(0)->shouldReturn('cadena');
    }


    public function it_refuse_add_a_custom_resolver_on_fully_list()
    {
        $values = ['a' => 1, 'b' => 2, 'c' => 3];
        $this->beConstructedThrough('create', [$values]);

        $this->shouldThrow(ReconfigureFullyListException::class)->duringAddResolver(function () {
        });
    }

    public function it_can_ignore_a_value()
    {
        $this
            ->ignoreOnInvalid()
            ->addResolver(function ($value) {
                $this->markAsInvalid();
            })
            ->addResolver(function () {
                throw new \Exception('Nunca deberia entrar por aqui');
            });

        $this->add('cadena');
        $this->count()->shouldReturn(0);
    }


    public function it_can_normalize_a_value()
    {
        $this->addResolver(function ($value) {
            return strtoupper($value);
        });

        $this->add('cadena');
        $this->get(0)->shouldReturn('CADENA');
    }


    public function it_can_normalize_a_key()
    {
        $this->addResolver(function ($value, $key) {
            $this->setKey(strtoupper($key));
            return $value;

        });

        $this->set('a', 'cadena');

        $this->has('a')->shouldReturn(false);
        $this->get('A')->shouldReturn('cadena');
    }

    public function it_can_set_null_value()
    {
        $this->addResolver(function ($value, $key) {
            $value = null;
            $this->setValue($value);
            return $value;
        });

        $this->set('a', 'cadena');
        $this->get('a')->shouldReturn(null);
    }

    public function it_can_normalize_key_and_value()
    {
        $this->addResolver(function ($value, $key) {
            $value = strtoupper($value);
            $key = strtoupper($key);

            $this->setPair($key, $value);
            return $value;

        });

        $this->set('a', 'cadena');

        $this->has('a')->shouldReturn(false);
        $this->get('A')->shouldReturn('CADENA');
    }


    public function it_can_normalize_a_value_using_context()
    {
        $this->addResolver(function (string $value, $key, ItemList $context) {
            $ordinal = $context->count() + 1;
            return sprintf('Entry #%d => %s', $ordinal, $value);
        });

        $this->add('juan');
        $this->add('maria');
        $this->add('luisa');

        $this->get(0)->shouldReturn('Entry #1 => juan');
        $this->get(1)->shouldReturn('Entry #2 => maria');
        $this->get(2)->shouldReturn('Entry #3 => luisa');
    }


    public function it_refuse_an_invalid_resolver()
    {
        $resolver= new class {
            public function __invoke()
            {

            }
        };

        $this->shouldThrow(InvalidResolverException::class)->duringAddResolver($resolver);
    }

}
