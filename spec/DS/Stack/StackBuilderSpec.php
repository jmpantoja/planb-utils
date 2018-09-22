<?php

namespace spec\PlanB\DS\Stack;

use PlanB\DS\Stack\Stack;
use PlanB\DS\Stack\StackBuilder;
use PhpSpec\ObjectBehavior;
use PlanB\Type\Text\Text;
use Prophecy\Argument;
use spec\PlanB\DS\Traits\TraitBuilder;

class StackBuilderSpec extends ObjectBehavior
{
    protected const VALUE_A = 'value A';
    protected const VALUE_B = 'value B';
    protected const VALUE_C = 'value C';
    protected const VALUE_D = 'value D';

    protected const TARGET_CLASSNAME = Stack::class;

    use TraitBuilder;

    function it_is_initializable()
    {
        $this->shouldHaveType(StackBuilder::class);
    }

    /**
     * @return array
     */
    private function getResponseWithText(): array
    {
        return [
            Text::create(self::VALUE_C),
            Text::create(self::VALUE_B),
            Text::create(self::VALUE_A),
        ];
    }

    /**
     * @return array
     */
    private function getResponse(): array
    {
        return [
            self::VALUE_C,
            self::VALUE_B,
            self::VALUE_A,
        ];
    }
}
