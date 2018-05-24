<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\PlanB\Utils\Collection\Methods;


use PhpSpec\ObjectBehavior;
use PlanB\Utils\Collection\Collection;
use spec\PlanB\Utils\Collection\Stub\Word;


class ReduceSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beAnInstanceOf(Collection::class);
        $this->beConstructedWith(Word::class);
    }

    public function it_reduce_method_return_null_on_empty_if_not_initial_passed()
    {
        $this->reduce(function (Word $word, $initial) {
            return sprintf('%s/%s', $initial, $word->__toString());
        })->shouldReturn(null);
    }

    public function it_reduce_method_return_initial_on_empty()
    {
        $this->reduce(function (Word $word, $initial) {
            return sprintf('%s/%s', $initial, $word->__toString());
        }, '==>')->shouldReturn('==>');
    }

    public function it_reduce_method_return_a_single_value()
    {
        $this->addSomeElements();

        $this->reduce(function (Word $word, $initial) {


            return sprintf('%s/%s', $initial, $word->__toString());

        }, '==>')->shouldReturn('==>/uno/dos/tres');


    }


    protected function addSomeElements()
    {
        $this->itemAppendAll([
            Word::fromString('uno'),
            Word::fromString('dos'),
            Word::fromString('tres')

        ]);
    }

}