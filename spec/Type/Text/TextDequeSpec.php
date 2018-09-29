<?php

namespace spec\PlanB\Type\Text;

use PhpSpec\ObjectBehavior;
use PlanB\Type\Text\TextDeque;
use spec\PlanB\Type\Text\Traits\TextListTrait;

class TextDequeSpec extends ObjectBehavior
{
    use TextListTrait;

    private const CLASSNAME = TextDeque::class;

    protected const ENTRY_KEY = 0;
    protected const ENTRY = 421429;
    protected const VALUE = '421429';

    protected const PIECES = [
        'piece A',
        'piece B',
        'piece C'
    ];

    protected const RETURNED_PIECES = [
        'piece A',
        'piece B',
        'piece C',
    ];

    protected const CONCATENADED_TEXT = 'piece A piece B piece C';

}
