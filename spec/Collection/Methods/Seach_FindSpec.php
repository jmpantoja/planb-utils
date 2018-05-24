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
use PlanB\Utils\Collection\Exception\ItemNotFoundException;
use spec\PlanB\Utils\Collection\CollectionSpec;
use spec\PlanB\Utils\Collection\Stub\Word;


class Seach_FindSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beAnInstanceOf(Collection::class);
        $this->beConstructedWith(Word::class);
    }

    public function it_search_method_return_null_on_empty()
    {
        $this->itemSearch(function (Word $word) {
            return $word->length() > 3;
        })->shouldReturn(null);
    }


    public function it_search_method_return_null_if_nothing_is_found()
    {
        $this->addSomeElements();

        $this->itemSearch(function (Word $word) {
            return $word->length() > 10;
        })->shouldReturn(null);
    }

    public function it_search_method_return_an_element()
    {
        $this->addSomeElements();
        $response = $this->itemSearch(function (Word $word) {
            return $word->length() > 3;
        });

        $response->shouldHaveType(Word::class);
        $response->__toString()->shouldReturn('tres');
    }


    public function it_find_method_throws_an_exception_on_empty()
    {
        $this->shouldThrow(ItemNotFoundException::class)
            ->duringItemFind(function (Word $word) {
                return $word->length() > 3;
            });
    }

    public function it_find_method_throws_an_exception_if_nothing_is_found()
    {
        $this->addSomeElements();
        $this->shouldThrow(ItemNotFoundException::class)
            ->duringItemFind(function (Word $word) {
                return $word->length() > 10;
            });
    }


    public function it_find_method_return_an_element()
    {
        $this->addSomeElements();
        $response = $this->itemFind(function (Word $word) {
            return $word->length() > 3;
        });

        $response->shouldHaveType(Word::class);
        $response->__toString()->shouldReturn('tres');
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