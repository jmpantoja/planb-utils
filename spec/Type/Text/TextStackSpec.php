<?php

namespace spec\PlanB\Type\Text;

use PhpSpec\ObjectBehavior;
use PlanB\Type\Text\TextStack;
use spec\PlanB\Type\Text\Traits\TextListTrait;

class TextStackSpec extends ObjectBehavior
{
    use TextListTrait;

    private const CLASSNAME = TextStack::class;

    protected const ENTRY_KEY = 0;
    protected const ENTRY = 421429;
    protected const VALUE = '421429';

    protected const PIECES = [
        'piece A',
        'piece B',
        'piece C'
    ];

    protected const RETURNED_PIECES = [
        'piece C',
        'piece B',
        'piece A',
    ];

    protected const CONCATENADED_TEXT = 'piece C piece B piece A';

}
