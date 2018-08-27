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
use PlanB\Console\Message\Style\Option;
use PlanB\Console\Message\Style\Style;
use PlanB\DS\ItemList\ListInterface;
use PlanB\DS\TypedList\AbstractTypedList;
use PlanB\Type\DataType\Type;
use PlanB\Type\Text\Text;

class Paragraph extends AbstractTypedList
{
    /**
     * @var Style
     */
    private $style;

    /**
     * Devuelve el tipo de la lista
     *
     * @return null|string
     */
    public function getInnerType(): string
    {
        return LineWithStyle::class;
    }

    /**
     * Configura el comportamiento de  la lista
     *
     * @return void
     */
    protected function customize(): void
    {
        $this->addHydrator(Type::SCALAR, function ($value) {
            return Text::create($value);
        });

        $this->addHydrator(Text::class, function (Text $text) {
            $line = Line::create($text);
            return LineWithStyle::create($line, $this->style->clone());
        });

    }

    /**
     * Paragraph named constructor.
     * @param iterable $input
     * @return Paragraph
     */
    public static function create(iterable $input): self
    {
        return new static($input);
    }

    /**
     * Paragraph constructor.
     * @param Decorable[] $input
     */
    protected function __construct(iterable $input)
    {
        parent::__construct();

        $this->style = Style::create();
        $this->addAll($input);
    }


    /**
     * @inheritdoc
     *
     * @param mixed $paragraph
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function add($paragraph): ListInterface
    {
        if ($paragraph instanceof Paragraph) {
            $this->addAll($paragraph->getLines());
            return $this;
        }

        return parent::add($paragraph);
    }

    public function getLines()
    {
        return $this->map(function (LineWithStyle $line) {
            return $line->apply($this->style);
        });
    }

    /**
     * Devuelve el texto con el estilo aplicado
     *
     * @return Text
     */
    public function render()
    {
        $width = $this->getWidth();

        return $this->map(function (LineWithStyle $line) use ($width) {
            $this->style->expandTo($width);
            return $line->render($this->style);

        })->concat("\n");
    }

    /**
     * Añade la opción blink al texto
     *
     * @return Paragraph
     */
    public function blink(): self
    {
        $this->style->option(Option::BLINK);
        return $this;
    }

    /**
     * Añade la opción bold al texto
     *
     * @return Paragraph
     */
    public function bold(): self
    {
        $this->style->option(Option::BOLD);
        return $this;
    }

    /**
     * Añade la opción underscore al texto
     *
     * @return Paragraph
     */
    public function underscore(): self
    {
        $this->style->option(Option::UNDERSCORE);
        return $this;
    }

    /**
     * Añade la opción reverse al texto
     *
     * @return Paragraph
     */
    public function reverse(): self
    {
        $this->style->option(Option::REVERSE);
        return $this;
    }

    /**
     * Añade color al texto
     *
     * @param $color
     * @return Paragraph
     */
    public function fgColor($color): self
    {
        $this->style->foregroundColor($color);
        return $this;
    }

    /**
     * Añade color de fondo  al texto
     *
     * @param $color
     * @return Paragraph
     */
    public function bgColor($color): self
    {
        $this->style->backgroundColor($color);
        return $this;
    }

    /**
     * Asigna el padding
     *
     * @param int $left
     * @param int|null $right
     *
     * @return \PlanB\Console\Message\Style\Style
     */
    public function padding(int $left = 0, ?int $right = null): self
    {
        $this->style->padding($left, $right);
        return $this;
    }

    /**
     * Asigna el margin
     *
     * @param int $left
     * @param int|null $right
     *
     * @return \PlanB\Console\Message\Style\Style
     */
    public function margin(int $left = 0, ?int $right = null): self
    {
        $this->style->margin($left, $right);

        return $this;
    }

    public function left()
    {

        $width = $this->getWidth();
        $this->style->expandTo($width, Align::LEFT());
        return $this;
    }

    private function getWidth(): int
    {
        return (int)$this->getLines()->max(function (LineWithStyle $line) {
                return $line->getLength();
            }) + $this->style->getSpacingLenght();
    }

    public function right()
    {
        $width = $this->getWidth();
        $this->style->expandTo($width, Align::RIGHT());
        return $this;
    }


    public function center()
    {
        $width = $this->getWidth();
        $this->style->expandTo($width, Align::CENTER());
        return $this;
    }
}
