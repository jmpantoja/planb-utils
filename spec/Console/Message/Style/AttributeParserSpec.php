<?php

namespace spec\PlanB\Console\Message\Style;

use PlanB\Console\Message\Style\AttributeParser;
use PhpSpec\ObjectBehavior;
use PlanB\Console\Message\Style\Color;
use PlanB\Console\Message\Style\Option;
use PlanB\Type\Text\Text;
use Prophecy\Argument;

class AttributeParserSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('create', ['bg=blue;options=bold,underscore;fg=red']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(AttributeParser::class);
    }

    public function it_ignore_invalid_keys()
    {
        $this->beConstructedThrough('create', ['bg=blue;FAKE_KEY=value;options=bold,underscore;fg=red']);

        $this->getBackgroundColor()->shouldReturn(Color::BLUE());

        $this->getForegroundColor()->shouldReturn(Color::RED());

        $this->getOptions()->shouldIterateLike([
            Text::create(Option::BOLD),
            Text::create(Option::UNDERSCORE),
        ]);
    }

    public function it_retrieve_background_color()
    {

        $this->getBackgroundColor()->shouldReturn(Color::BLUE());
    }

    public function it_retrieve_default_background_color_when_dont_exists()
    {

        $this->beConstructedThrough('create', ['options=bold,underscore;fg=red']);
        $this->getBackgroundColor()->shouldReturn(Color::DEFAULT());
    }

    public function it_retrieve_default_background_color_when_is_invalid()
    {

        $this->beConstructedThrough('create', ['bg=FAKE-COLOR;options=bold,underscore;fg=red']);
        $this->getBackgroundColor()->shouldReturn(Color::DEFAULT());
    }

    public function it_retrieve_foreground_color()
    {
        $this->getForegroundColor()->shouldReturn(Color::RED());
    }

    public function it_retrieve_default_foreground_color_when_dont_exists()
    {

        $this->beConstructedThrough('create', ['bg=blue;options=bold,underscore']);
        $this->getForegroundColor()->shouldReturn(Color::DEFAULT());
    }

    public function it_retrieve_default_foreground_color_when_is_invalid()
    {

        $this->beConstructedThrough('create', ['bg=FAKE-COLOR;options=bold,underscore;fg=FAKE-COLOR']);
        $this->getForegroundColor()->shouldReturn(Color::DEFAULT());
    }

    public function it_retrieve_options_list()
    {
        $this->getOptions()->shouldIterateLike([
            Text::create(Option::BOLD),
            Text::create(Option::UNDERSCORE),
        ]);
    }

    public function it_retrieve_empty_options_list_when_dont_exists()
    {
        $this->beConstructedThrough('create', ['bg=blue;fg=red']);
        $this->getOptions()->shouldIterateLike([]);
    }

    public function it_retrieve_empty_options_list_when_is_invalid()
    {
        $this->beConstructedThrough('create', ['bg=blue;options=bold,underscore,FAKE-OPTION;fg=red']);

        $this->getOptions()->shouldIterateLike([
            Text::create(Option::BOLD),
            Text::create(Option::UNDERSCORE),
        ]);
    }


}
