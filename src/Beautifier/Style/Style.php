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

namespace PlanB\Beautifier\Style;

/**
 * Representa un estilo
 */
class Style
{
    /**
     * @var \PlanB\Beautifier\Style\Color
     */
    private $fgColor;

    /**
     * @var \PlanB\Beautifier\Style\Color
     */
    private $bgColor;

    /**
     * @var bool
     */
    private $bold;

    /**
     * @var bool
     */
    private $underscore;

    /**
     * @var int
     */
    private $rightPadding = 0;

    /**
     * @var int
     */
    private $leftPadding = 0;

    /**
     * @var int
     */
    private $rightMargin = 0;

    /**
     * @var int
     */
    private $leftMargin = 0;

    /**
     * @var int
     */
    private $lineWidth = 0;

    /**
     * @var \PlanB\Beautifier\Style\Align
     */
    private $align;

    /**
     * @var bool
     */
    private $expand = false;

    /**
     * Style named constructor.
     *
     * @return \PlanB\Beautifier\Style\Style
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * Style constructor.
     */
    protected function __construct()
    {
        $this->fgColor = Color::DEFAULT();
        $this->bgColor = Color::DEFAULT();
        $this->bold = false;
        $this->underscore = false;
        $this->align = Align::CENTER();
    }

    /**
     * Devuelve el nombre del color del texto
     *
     * @return string
     */
    public function getFgColorName(): string
    {
        if ($this->fgColor->isDefault()) {
            return '';
        }

        return (string) $this->fgColor->getValue();
    }

    /**
     * Asgina el color del texto
     *
     * @param \PlanB\Beautifier\Style\Color $fgColor
     *
     * @return \PlanB\Beautifier\Style\Style
     */
    public function setFgColor(Color $fgColor): self
    {
        $this->fgColor = $fgColor;

        return $this;
    }

    /**
     * Devuelve el nombre del color de fondo
     *
     * @return string
     */
    public function getBgColorName(): string
    {
        if ($this->bgColor->isDefault()) {
            return '';
        }

        return (string) $this->bgColor->getValue();
    }

    /**
     * Asigna el color de fondo
     *
     * @param \PlanB\Beautifier\Style\Color $bgColor
     *
     * @return \PlanB\Beautifier\Style\Style
     */
    public function setBgColor(Color $bgColor): Style
    {
        $this->bgColor = $bgColor;

        return $this;
    }

    /**
     * Indica si existe el flag bold
     *
     * @return bool
     */
    public function isBold(): bool
    {
        return $this->bold;
    }

    /**
     * Aplica el flag bold
     *
     * @return \PlanB\Beautifier\Style\Style
     */
    public function bold(): Style
    {
        $this->bold = true;

        return $this;
    }

    /**
     * Indica si existe el flag underscore
     *
     * @return bool
     */
    public function isUnderscore(): bool
    {
        return $this->underscore;
    }

    /**
     * Aplica el flag underscore
     *
     * @return \PlanB\Beautifier\Style\Style
     */
    public function underscore(): Style
    {
        $this->underscore = true;

        return $this;
    }

    /**
     * Aplica el padding a este estilo
     *
     * @param int      $left
     * @param int|null $right
     *
     * @return \PlanB\Beautifier\Style\Style
     */
    public function padding(int $left, ?int $right = null): self
    {
        $this->leftPadding = $left;
        $this->rightPadding = $right ?? $left;

        return $this;
    }

    /**
     * Devuelve el padding izquierdo
     *
     * @return int
     */
    public function getLeftPadding(): int
    {
        return $this->leftPadding;
    }

    /**
     * Devuelve el padding derecho
     *
     * @return int
     */
    public function getRightPadding(): int
    {
        return $this->rightPadding;
    }

    /**
     * Aplica el padding a este estilo
     *
     * @param int      $left
     * @param int|null $right
     *
     * @return \PlanB\Beautifier\Style\Style
     */
    public function margin(int $left, ?int $right = null): self
    {
        $this->leftMargin = $left;
        $this->rightMargin = $right ?? $left;

        return $this;
    }

    /**
     * Devuelve el margin izquierdo
     *
     * @return int
     */
    public function getLeftMargin(): int
    {
        return $this->leftMargin;
    }

    /**
     * Devuelve el margin derecho
     *
     * @return int
     */
    public function getRightMargin(): int
    {
        return $this->rightMargin;
    }

    /**
     * Aplica el ancho de linea
     *
     * @param int $width
     *
     * @return \PlanB\Beautifier\Style\Style
     */
    public function lineWidth(int $width): self
    {

        $this->lineWidth = $width;

        return $this;
    }

    /**
     * Devuelve el ancho del linea
     *
     * @return int
     */
    public function getLineWidth(): int
    {
        return $this->lineWidth + $this->leftPadding + $this->rightMargin;
    }

    /**
     * Asigna la alineación
     *
     * @param \PlanB\Beautifier\Style\Align $align
     *
     * @return \PlanB\Beautifier\Style\Style
     */
    public function align(Align $align): self
    {
        $this->expand();
        $this->align = $align;

        return $this;
    }

    /**
     * Devuelve la alineación
     *
     * @return int
     */
    public function getAlignValue(): int
    {
        return $this->align->getValue();
    }

    /**
     * Hace que se expanda al ancho máximo de linea
     *
     * @return \PlanB\Beautifier\Style\Style
     */
    public function expand(): self
    {
        $this->expand = true;

        return $this;
    }

    /**
     * Indica si se debe expandir
     *
     * @return bool
     */
    public function isExpand(): bool
    {
        return $this->expand;
    }
}
