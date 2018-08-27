<?php
/**
 * This file is part of the planb project.
 *
 * (c) jmpantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PlanB\Console\Message\Style;

use PlanB\Type\Text\Text;

/**
 * El estilo de un texto
 */
class Style
{
    /**
     * @var \PlanB\Console\Message\Style\HorizontalSpace
     */
    public $padding;

    /**
     * @var \PlanB\Console\Message\Style\HorizontalSpace
     */
    private $margin;

    /**
     * @var \PlanB\Console\Message\Style\Position
     */
    private $position;

    /**
     * @var \PlanB\Console\Message\Style\Attributes
     */
    private $attributes;

    /**
     * Style named constructor.
     *
     * @return \PlanB\Console\Message\Style\Style
     */
    public static function create(): self
    {
        $padding = HorizontalSpace::create();
        $margin = HorizontalSpace::create();
        $position = Position::create();
        $attributes = Attributes::create();

        return new static($padding, $margin, $position, $attributes);
    }


    /**
     * Style constructor.
     */
    protected function __construct(HorizontalSpace $padding,
                                   HorizontalSpace $margin,
                                   Position $position,
                                   Attributes $attributes)
    {
        $this->padding = $padding;
        $this->margin = $margin;
        $this->position = $position;
        $this->attributes = $attributes;
    }


    public function merge(Style $style): self
    {
        $padding = $this->padding->merge($style->padding);
        $margin = $this->margin->merge($style->margin);
        $position = $this->position->merge($style->position);
        $attributes = $this->attributes->merge($style->attributes);

        return new static(
            $padding, $margin, $position, $attributes
        );
    }

    /**
     * Devuelve un clon de esta instancia
     *
     * @return Style
     */
    public function clone(): self
    {
        return clone $this;
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
        $this->padding = HorizontalSpace::create($left, $right);

        return $this;
    }

    /**
     * Devuelve los attributos
     */
    public function getAttributes(): Attributes
    {
        return clone $this->attributes;
    }

    /**
     * Devuelve el padding izquierdo
     *
     * @return string
     */
    public function getPaddingLeft(): string
    {
        return $this->padding->left();
    }

    /**
     * Devuelve el padding derecho
     *
     * @return string
     */
    public function getPaddingRight(): string
    {
        return $this->padding->right();
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
        $this->margin = HorizontalSpace::create($left, $right);

        return $this;
    }

    /**
     * Devuelve el margen izquierdo
     *
     * @return int|string
     */
    public function getMarginLeft()
    {
        return $this->margin->left();
    }

    /**
     * Devuelve el margen derecho
     *
     * @return string
     */
    public function getMarginRight(): string
    {
        return $this->margin->right();
    }

    /**
     * Asigna una posición
     *
     * @param int $width
     * @param \PlanB\Console\Message\Style\Align|string $align
     *
     * @return \PlanB\Console\Message\Style\Style
     */
    public function expandTo(int $width, $align = null): self
    {
        $position = Position::create($width, $align);
        $this->position = $position;

        return $this;
    }

    /**
     * Devuelve el ancho de la linea
     *
     * @return int
     */
    public function getWidth(): int
    {
        return $this->position->getWidth();
    }

    public function getSpacingLenght(): int
    {
        return $this->padding->lenght() + $this->margin->lenght();
    }

    /**
     * Devuelve la alineación
     *
     * @return \PlanB\Console\Message\Style\Align
     */
    public function getAlign(): Align
    {
        return $this->position->getAlign();
    }

    /**
     * Asigna una opción al estilo
     *
     * @param mixed|string|\PlanB\Console\Message\Style\Option $option
     *
     * @return \PlanB\Console\Message\Style\Style
     */
    public function option($option): self
    {
        $option = Option::get($option);
        $this->attributes->addOption($option);

        return $this;
    }

    /**
     * @param mixed|string|\PlanB\Console\Message\Style\Color $color
     *
     * @return \PlanB\Console\Message\Style\Style
     */
    public function foregroundColor($color): self
    {
        $color = Color::get($color);
        $this->attributes->setForegroundColor($color);

        return $this;
    }

    /**
     * @param mixed|string|\PlanB\Console\Message\Style\Color $color
     *
     * @return \PlanB\Console\Message\Style\Style
     */
    public function backgroundColor($color): self
    {
        $color = Color::get($color);
        $this->attributes->setBackgroundColor($color);

        return $this;
    }

    /**
     * Devuelve la etiqueta de apertura
     *
     * @return \PlanB\Type\Text\Text
     */
    public function getOpenTag(): Text
    {
        if ($this->attributes->isEmpty()) {
            return Text::create();
        }

        return Text::format('<%s>', $this->attributes->stringify());
    }

    /**
     * Devuelve la etiqueta de cierre
     *
     * @return \PlanB\Type\Text\Text
     */
    public function getCloseTag(): Text
    {
        if ($this->attributes->isEmpty()) {
            return Text::create();
        }

        return Text::create('</>');
    }
}
