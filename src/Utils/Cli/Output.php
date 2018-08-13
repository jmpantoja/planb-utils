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

namespace PlanB\Utils\Cli;

/**
 * Objetos capaces de mostrarse por consola con un estilo determinado
 */
abstract class Output
{
    /**
     * @var \PlanB\Utils\Cli\Style
     */
    private $style;


    /**
     * Line constructor.
     */
    protected function __construct()
    {
        $this->style = Style::create();
    }

    /**
     * Devuelve el estilo de este elemento
     *
     * @return \PlanB\Utils\Cli\Style
     */
    public function getStyle(): Style
    {
        return $this->style;
    }

    /**
     * Mezcla el estilo de este elemento con otro
     *
     * @param \PlanB\Utils\Cli\Style $style
     *
     * @return \PlanB\Utils\Cli\Output
     */
    public function mergeStyle(Style $style): self
    {

        $this->style->merge($style);

        return $this;
    }

    /**
     * Devuelve el contenido expandido de esta linea, con el estilo aplicado
     *
     * @param \PlanB\Utils\Cli\Style $style
     *
     * @return  string
     */
    abstract public function render(Style $style): string;


    /**
     * Asigna el color del texto
     *
     * @param \PlanB\Utils\Cli\Color $color
     *
     * @return \PlanB\Utils\Cli\Output
     */
    public function foregroundColor(Color $color): self
    {
        $this->style->foreGroundColor($color);

        return $this;
    }

    /**
     * Asigna el color del fondo
     *
     * @param \PlanB\Utils\Cli\Color $color
     *
     * @return \PlanB\Utils\Cli\Output
     */
    public function backgroundColor(Color $color): self
    {
        $this->style->backGroundColor($color);

        return $this;
    }

    /**
     * Asigna una opción al texto
     *
     * @param \PlanB\Utils\Cli\Option $option
     *
     * @return $this
     */
    public function option(Option $option)
    {
        $this->style->option($option);

        return $this;
    }

    /**
     * Asigna una alineación al texto
     *
     * @param \PlanB\Utils\Cli\Align $align
     *
     * @return $this
     */
    public function align(Align $align)
    {
        $this->style->align($align);

        return $this;
    }

    /**
     * Asigna el número de tabulaciones a izquierda y derecha
     *
     * @param int $left
     * @param int $right
     *
     * @return \PlanB\Utils\Cli\Output
     */
    public function tab(int $left, int $right = 0): self
    {
        $this->style->tab($left, $right);

        return $this;
    }
}
