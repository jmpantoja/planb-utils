<?php

namespace spec\PlanB\Console\Message\Style;


use PlanB\Console\Message\Style\Attributes;
use PhpSpec\ObjectBehavior;
use PlanB\Console\Message\Style\Color;
use PlanB\Console\Message\Style\Option;
use PlanB\Type\Text\Text;
use Prophecy\Argument;

class AttributesSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('create');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Attributes::class);
    }

    public function it_has_foreground_color_by_default()
    {
        $this->getForegroundColor()->shouldReturn(Color::DEFAULT());
    }

    public function it_has_backround_color_by_default()
    {
        $this->getBackgroundColor()->shouldReturn(Color::DEFAULT());
    }

    public function it_has_an_empty_options_list_by_default()
    {
        $this->getOptions()->isEmpty()->shouldReturn(true);
    }

    public function it_is_empty_by_default()
    {
        $this->isEmpty()->shouldReturn(true);
    }

    public function it_retrieve_tag_content_by_default()
    {
        $this->stringify()->shouldReturn(Text::EMPTY_TEXT);
    }

    public function it_retrieve_tag_content_with_one_option()
    {

        $this->addOption(Option::UNDERSCORE);
        $this->stringify()->shouldReturn('options=underscore');
    }

    public function it_retrieve_tag_content_with_two_options()
    {

        $this->addOption(Option::UNDERSCORE);
        $this->addOption(Option::BOLD);

        $this->stringify()->shouldReturn('options=underscore,bold');
    }


    public function it_retrieve_tag_content_with_colors_and_two_options()
    {

        $this->setForegroundColor(Color::RED());
        $this->setBackGroundColor(Color::BLUE());

        $this->addOption(Option::UNDERSCORE);
        $this->addOption(Option::BOLD);

        $this->stringify()->shouldReturn('fg=red;bg=blue;options=underscore,bold');
    }

    public function it_can_be_merge_foreground_color()
    {
        $attributes = $this->getAttributesToMerge();

        $this->setForegroundColor(Color::RED());
        $this->merge($attributes)
            ->stringify()->shouldReturn('fg=red;bg=white;options=bold');
    }

    public function it_can_be_merge_background_color()
    {
        $attributes = $this->getAttributesToMerge();

        $this->setBackgroundColor(Color::RED());

        $this->merge($attributes)
            ->stringify()->shouldReturn('fg=green;bg=red;options=bold');
    }


    public function it_can_be_merge_options()
    {
        $attributes = $this->getAttributesToMerge();

        $this->addOption(Option::REVERSE());

        $this->merge($attributes)
            ->stringify()->shouldReturn('fg=green;bg=white;options=bold,reverse');
    }

    public function it_can_be_created_from_string()
    {
        $this->beConstructedThrough('fromString', ['options=bold,underscore;fg=red;bg=blue']);

        $this->stringify()
            ->shouldReturn('fg=red;bg=blue;options=bold,underscore');
    }


    /**
     * @return Attributes
     */
    protected function getAttributesToMerge(): Attributes
    {
        $attributes = Attributes::create()
            ->setForegroundColor(Color::GREEN())
            ->setBackgroundColor(Color::WHITE())
            ->addOption(Option::BOLD());
        return $attributes;
    }
}
