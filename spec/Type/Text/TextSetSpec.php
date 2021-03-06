<?php

namespace spec\PlanB\Type\Text;

use PlanB\Type\Text\TextSet;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\PlanB\Type\Text\Traits\TextListTrait;

class TextSetSpec extends ObjectBehavior
{
    private const CLASSNAME = TextSet::class;
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

    use TextListTrait;
}
