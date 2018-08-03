<?php

namespace spec\PlanB\DS\ItemList\Resolver;

use PlanB\DS\ItemList\Exception\InvalidItemException;
use PlanB\DS\ItemList\Exception\ReconfigureFullyListException;
use PlanB\DS\ItemList\KeyValue;
use PlanB\DS\ItemList\ListInterface;
use PlanB\DS\ItemList\Resolver\AbstractResolver;
use PlanB\DS\ItemList\Resolver\Exception\InvalidResolverException;
use PlanB\DS\ItemList\Resolver\ResolverBag;
use PhpSpec\ObjectBehavior;
use PlanB\DS\ItemList\Resolver\ResolverInterface;
use Prophecy\Argument;

class ResolverBagSpec extends ObjectBehavior
{
    public function let(KeyValue $pair)
    {
        $pair->isInvalid()->willReturn(false);
        $pair->getValue()->willReturn('value');
        $pair->getKey()->willReturn(null);
        $pair->__toString()->willReturn('key=>value');

        $pair->markAsInvalid()->willReturn($pair);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ResolverBag::class);
    }

    public function it_is_countable()
    {
        $this->shouldHaveType(\Countable::class);
    }

    public function it_can_add_a_callable_resolver(KeyValue $pair, ListInterface $context)
    {
        $pair->setValueIfNotNull('VALUE')->shouldBeCalled();

        $this->addResolver(function ($value) {
            return strtoupper($value);
        });

        $this->resolve($pair, $context);
        $this->count()->shouldReturn(1);
    }

    public function it_can_add_a_class_resolver(KeyValue $pair, ListInterface $context)
    {
        $pair->setValueIfNotNull('VALUE')->shouldBeCalled();

        $resolver = $this->getResolver();
        $this->addResolver($resolver);

        $this->resolve($pair, $context);
        $this->count()->shouldReturn(1);
    }

    public function it_can_chain_two_resolvers(ListInterface $context)
    {
        $pair = KeyValue::fromValue('value');

        $this
            ->addResolver(function ($value) {
                return sprintf('%s-1', $value);
            })
            ->addResolver(function ($value) {
                return sprintf('%s-2', $value);
            });

        $this->resolve($pair, $context)->getValue()->shouldReturn('value-1-2');
        $this->count()->shouldReturn(2);
    }


    public function it_refuse_an_invalid_resolver(KeyValue $pair, ListInterface $context)
    {
        $resolver = $this->getInvalidResolver();
        $this->shouldThrow(InvalidResolverException::class)->duringAddResolver($resolver);
    }

    public function it_throw_an_exception_when_resolve_an_invalid_pair(KeyValue $pair, ListInterface $context)
    {
        $pair->isInvalid()->willReturn(false, true);

        $this
            ->addResolver(function ($value) {
                $this->markAsInvalid();
            });

        $exception = new InvalidItemException("Element key=>value is not valid");

        $this->shouldThrow($exception)->duringResolve($pair, $context);
        $this->count()->shouldReturn(1);
    }

    public function it_ignore_element_when_resolve_an_invalid_pair(KeyValue $pair, ListInterface $context)
    {
        $pair->isInvalid()->willReturn(false, true);

        $this->ignoreOnInvalid();
        $this
            ->addResolver(function ($value) {
                $this->markAsInvalid();
            });

        $this->shouldNotThrow()->duringResolve($pair, $context);
        $this->count()->shouldReturn(1);
    }


    public function it_throw_an_exception_when_change_config_after_resolve(KeyValue $pair, ListInterface $context, ResolverInterface $resolver)
    {
        $this->addResolver($resolver);
        $this->resolve($pair, $context);

        $exception = new ReconfigureFullyListException("You cann't change the configuration on a fully ItemList");
        $this->shouldThrow($exception)->duringAddResolver($resolver);
        $this->count()->shouldReturn(1);
    }

    public function it_can_lock_config_manually(ResolverInterface $resolver)
    {
        $this->lockResolvers();

        $exception = new ReconfigureFullyListException("You cann't change the configuration on a fully ItemList");
        $this->shouldThrow($exception)->duringAddResolver($resolver);
        $this->count()->shouldReturn(0);
    }


    /**
     * @return ResolverInterface
     */
    private function getResolver(): ResolverInterface
    {
        return new class extends AbstractResolver
        {
            public function resolve($value, $key, ListInterface $context)
            {
                return strtoupper($value);
            }
        };
    }

    /**
     * @return ResolverInterface
     */
    private function getInvalidResolver(): callable
    {
        return new class
        {
            public function __invoke($value, $key, ListInterface $context)
            {
                return strtoupper($value);
            }
        };
    }
}
