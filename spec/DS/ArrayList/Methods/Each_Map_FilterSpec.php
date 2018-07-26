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

namespace spec\PlanB\DS\ArrayList\Methods;


use PhpSpec\ObjectBehavior;
use PlanB\DS\ArrayList\ArrayList;
use spec\PlanB\DS\Stub\Word;


class Each_Map_FilterSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beAnInstanceOf(ArrayList::class);
    //    $this->beConstructedWith(Word::class);
    }

    public function it_each_method_return_instance_on_empty()
    {
        $this->each(function (Word $word, int $key, string $userdata) {
            $word->toUpper();
        })->shouldReturn($this);
    }

    public function it_each_element_is_passed_to_callable()
    {
        $this->addSomeElements();

        $this->each(function (Word $word, int $key, string $sufixA, string $sufixB): string {
            return $word->concatAll((string)$key, $sufixA, $sufixB)->__toString();
        }, '<', '=');


        $this->shouldReturn($this);
        $this->get(0)->__toString()->shouldReturn('uno/0/</=');
        $this->get(1)->__toString()->shouldReturn('dos/1/</=');
        $this->get(2)->__toString()->shouldReturn('tres/2/</=');

        $this->count()->shouldReturn(3);
    }


    public function it_map_method_returns_instance_on_empty()
    {
        $response = $this->map(function (Word $word) {
            $word->toUpper();
        });

        $response->shouldNotReturn($this);
        $response->shouldHaveType(ArrayList::class);
    //    $response->getType()->shouldReturn(Word::class);
        $response->count()->shouldReturn(0);
    }


    public function it_map_method_returns_mapped_collection()
    {
        $this->addSomeElements();

        $response = $this->map(function (Word $word, int $key, string $sufixA, string $sufixB): string {
            return $word->concatAll((string)$key, $sufixA, $sufixB)->__toString();
        }, '<', '=');


        $response->shouldNotReturn($this);

        $response->shouldHaveType(ArrayList::class);

        $response->get(0)->shouldReturn('uno/0/</=');
        $response->get(1)->shouldReturn('dos/1/</=');
        $response->get(2)->shouldReturn('tres/2/</=');

        $response->count()->shouldReturn(3);
    }

    public function it_filter_method_returns_instance_on_empty()
    {
        $response = $this->filter(function (Word $word) {
            return true;
        });

        $response->shouldNotReturn($this);
        $response->shouldHaveType(ArrayList::class);
        //     $response->getType()->shouldReturn(Word::class);
        $response->count()->shouldReturn(0);
    }


    public function it_filter_method_returns_filtered_collection()
    {
        $this->addSomeElements();

        $response = $this->filter(function (Word $word) {
            return $word->length() > 3;
        });

        $response->shouldNotReturn($this);
        $response->shouldHaveType(ArrayList::class);
     //   $response->getType()->shouldReturn(Word::class);

        $response->count()->shouldReturn(1);
        $response->get(2)->__toString()->shouldReturn('tres');
    }

    protected function addSomeElements()
    {
        $this->addAll([
            Word::fromString('uno'),
            Word::fromString('dos'),
            Word::fromString('tres')

        ]);
    }

}
