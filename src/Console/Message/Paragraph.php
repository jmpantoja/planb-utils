<?php

/**
 * This file is part of the planb project.
 *
 * (c) jmpantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace PlanB\Console\Message;

use PlanB\Console\Message\Style\Align;
use PlanB\Console\Message\Style\Color;
use PlanB\Console\Message\Style\Option;
use PlanB\Console\Message\Style\Style;
use PlanB\DS\Collection;
use PlanB\DS\Resolver\Resolver;
use PlanB\Type\DataType\Type;
use PlanB\Type\Text\Text;
use PlanB\Type\Text\TextListBuilder;
use PlanB\Type\Text\TextVector;

/**
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class Paragraph extends TextVector
{
    /**
     * @var \PlanB\Console\Message\Style\Style
     */
    private $style;

    /**
     * @inheritdoc
     */
    public function configure(Resolver $resolver): Collection
    {
        $resolver
            ->setType(LineWithStyle::class)
            ->addTypedFilter(Paragraph::class, function (Paragraph $paragraph) {
                $this->pushAll($paragraph->getLines());

                return false;
            })
            ->addConverter(Type::SCALAR, function ($value) {
                return Text::make($value);
            })->addConverter(Text::class, function (Text $text) {
                $line = Line::make($text);

                return LineWithStyle::make($line, $this->style->clone());
            });

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function __construct()
    {
        parent::__construct(null);
        $this->style = Style::make();
    }


    /**
     * Devuelve una lista con todas las lineas que componen el párrafo
     *
     * @return \PlanB\DS\Sequence
     */
    public function getLines(): \PlanB\DS\Sequence
    {
        return $this->map(function (LineWithStyle $line) {
            return $line->apply($this->style);
        });
    }

    /**
     * Devuelve el texto con el estilo aplicado
     *
     * @return \PlanB\Type\Text\Text
     */
    public function render(): Text
    {
        $width = $this->getWidth();

        $list = TextListBuilder::make()
            ->addTypedNormalizer(LineWithStyle::class, function (LineWithStyle $line) use ($width) {

                $this->style->expandTo($width);

                return $line->render($this->style);
            })
            ->values($this)
            ->build();

        return $list->concat(Text::LINE_BREAK);
    }

    /**
     * Añade la opción blink al texto
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public function blink(): self
    {
        $this->style->option(Option::BLINK());

        return $this;
    }

    /**
     * Añade la opción bold al texto
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public function bold(): self
    {
        $this->style->option(Option::BOLD());

        return $this;
    }

    /**
     * Añade la opción underscore al texto
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public function underscore(): self
    {
        $this->style->option(Option::UNDERSCORE());

        return $this;
    }

    /**
     * Añade la opción reverse al texto
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public function inverse(): self
    {
        $this->style->option(Option::REVERSE());

        return $this;
    }

    /**
     * Añade color al texto
     *
     * @param  string|\PlanB\Console\Message\Style\Color $color
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public function fgColor($color): self
    {
        $color = Color::get($color);
        $this->style->foregroundColor($color);

        return $this;
    }

    /**
     * Añade color de fondo  al texto
     *
     * @param  string|\PlanB\Console\Message\Style\Color $color
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public function bgColor($color): self
    {
        $color = Color::get($color);
        $this->style->backgroundColor($color);

        return $this;
    }

    /**
     * Asigna el padding
     *
     * @param int      $left
     * @param int|null $right
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public function padding(int $left = 0, ?int $right = null): self
    {
        $this->style->padding($left, $right);

        return $this;
    }

    /**
     * Asigna el margin
     *
     * @param int      $left
     * @param int|null $right
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public function margin(int $left = 0, ?int $right = null): self
    {
        $this->style->margin($left, $right);

        return $this;
    }

    /**
     * Alinea el texto a la izquierda
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public function left(): self
    {

        $width = $this->getWidth();
        $this->style->expandTo($width, Align::LEFT());

        return $this;
    }

    /**
     * Devuelve el ancho final del párrafo
     *
     * @return int
     */
    private function getWidth(): int
    {

        $maxLength = $this->getLines()->max(function (LineWithStyle $first, LineWithStyle $second) {
            return $first->getLength() <=> $second->getLength();
        })->getLength();


        return $maxLength + $this->style->getSpacingLenght();
    }

    /**
     * Alinea el texto a la derecha
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public function right(): self
    {
        $width = $this->getWidth();
        $this->style->expandTo($width, Align::RIGHT());

        return $this;
    }

    /**
     * Alinea el texto al centro
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public function center(): self
    {
        $width = $this->getWidth();
        $this->style->expandTo($width, Align::CENTER());

        return $this;
    }
}
