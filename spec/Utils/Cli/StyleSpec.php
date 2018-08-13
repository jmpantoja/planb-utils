<?php

namespace spec\PlanB\Utils\Cli;

use PlanB\Utils\Cli\Align;
use PlanB\Utils\Cli\Color;
use PlanB\Utils\Cli\Line;
use PlanB\Utils\Cli\Option;
use PlanB\Utils\Cli\Style;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StyleSpec extends ObjectBehavior
{

    private const CONTENT = 'LINE #A';
    private const LEFT_CONTENT = 'LINE #A             ';
    private const CENTER_CONTENT = '      LINE #A       ';

    private const PATTERN = '|<(.*)>\s*%s\s*</>|';

    private const TAGGED_LENGTH = 20;

    private function parse(string $subject): ?array
    {
        $pattern = sprintf(self::PATTERN, self::CONTENT);


        if (preg_match($pattern, $subject, $matches)) {

            $all = [
                'fg' => null,
                'bg' => null,
                'options' => null
            ];
            $pieces = explode(';', $matches[1]);

            foreach ($pieces as $piece) {
                parse_str($piece, $args);
                $all = array_replace($all, $args);
            }
            $options = $all['options'] ?? '';

            $all['options'] = array_filter(explode(',', $options));

            return $all;
        }

        return null;
    }

    public function getMatchers(): array
    {

        return [
            'haveStyle' => function (string $subject) {
                $pattern = sprintf(self::PATTERN, self::CONTENT);
                return preg_match($pattern, $subject);
            },
            'haveForeGround' => function (string $subject, string $color = null) {

                $parsed = $this->parse($subject);

                if (is_null($color)) {
                    return !is_null($parsed['fg']);
                }

                return $parsed['fg'] == $color;

            },
            'haveBackGround' => function (string $subject, string $color = null) {
                $parsed = $this->parse($subject);

                if (is_null($color)) {
                    return !is_null($parsed['bg']);
                }

                return $parsed['bg'] == $color;
            },
            'haveOption' => function (string $subject, ?string $option = null) {
                $parsed = $this->parse($subject);

                if (is_null($parsed)) {
                    return false;
                }

                return in_array($option, $parsed['options']);
            }

        ];
    }


    public function let(Line $line)
    {
        $line->getText()->willReturn(self::CONTENT);
        $line->taggedTextLength()->willReturn(self::TAGGED_LENGTH);

        $this->beConstructedThrough('create');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Style::class);
    }

    public function it_can_render_simple_content_with_ajust(Line $line)
    {
        $this->decorate($line)->shouldReturn(self::LEFT_CONTENT);
    }


    public function it_can_render_simple_content_with_foreground_color(Line $line)
    {
        $this->foregroundColor(Color::RED());
        $this->decorate($line)->shouldHaveForeGround(Color::RED);
    }

    public function it_can_render_simple_content_with_background_color(Line $line)
    {
        $this->backgroundColor(Color::BLUE());
        $this->decorate($line)->shouldHaveBackGround(Color::BLUE);
    }

    public function it_can_render_simple_content_with_options(Line $line)
    {

        $this->option(Option::BLINK());
        $this->option(Option::UNDERSCORE());

        $decorated = $this->decorate($line);

        $decorated->shouldHaveOption(Option::BLINK);
        $decorated->shouldHaveOption(Option::UNDERSCORE);
    }

    public function it_can_render_simple_content_with_align(Line $line)
    {
        $this->align(Align::CENTER());
        $this->decorate($line)->shouldReturn(self::CENTER_CONTENT);

        $this->align(Align::LEFT());
        $this->decorate($line)->shouldReturn(self::LEFT_CONTENT);
    }

}
