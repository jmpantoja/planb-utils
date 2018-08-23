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

namespace PlanB\Utils\Cli\Style;

/**
 * Espaciado
 */
class Spacing
{
    /**
     * @var \PlanB\Utils\Cli\Style\Align
     */
    private $align;

    /**
     * @var \PlanB\Utils\Cli\Style\Padding
     */
    private $padding;

    /**
     * @var int
     */
    private $width = 0;

    /**
     * Spacing named constructor
     *
     * @return \PlanB\Utils\Cli\Style\Spacing
     */
    public static function create(): self
    {

        return new static();
    }

    /**
     * Spacing constructor.
     */
    protected function __construct()
    {
        $this->align = Align::LEFT();
        $this->padding = Padding::create();
    }

    /**
     * Asigna la alineación
     *
     * @param \PlanB\Utils\Cli\Style\Align $align
     *
     * @return $this
     */
    public function align(Align $align): self
    {
        $this->align = $align;

        return $this;
    }

    /**
     * Devuelve la alineación
     *
     * @return \PlanB\Utils\Cli\Style\Align
     */
    public function getAlign(): Align
    {
        return $this->align;
    }


    /**
     * Asigna el padding
     *
     * @param int      $left
     * @param int|null $right
     *
     * @return \PlanB\Utils\Cli\Style\Spacing
     */
    public function padding(int $left, ?int $right = null): self
    {
        $this->padding = Padding::create($left, $right);

        return $this;
    }

    /**
     * Expande el ancho de linea
     *
     * @param int $width
     *
     * @return $this
     */
    public function expandTo(int $width)
    {

        if ($this->width < $width) {
            $this->width = $width;
        }

        return $this;
    }

    /**
     * Devuelve el ancho total
     *
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * Devuelve el padding izquierdo
     *
     * @return string
     */
    public function getLeft(): string
    {
        return $this->padding->getLeft();
    }

    /**
     * Devuelve el padding derecho
     *
     * @return string
     */
    public function getRight(): string
    {
        return $this->padding->getRight();
    }
}
