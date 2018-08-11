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

namespace PlanB\Utils\Cli;

use PlanB\ValueObject\Stringifable;

/**
 * Clase abstracta comun a todos los elementos que se pueden mostar por consola
 */
abstract class Output implements Stringifable
{
    /**
     * @var \PlanB\Utils\Cli\OutputAggregate
     */
    private $parent;

    /**
     * @var \PlanB\Utils\Cli\Style
     */
    private $style;

    /**
     * Devuelve la cadena de texto
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->stringify();
    }

    /**
     * Asigna un estilo a este elemento
     *
     * @param \PlanB\Utils\Cli\Style $style
     *
     * @return \PlanB\Utils\Cli\Output
     */
    public function style(Style $style): Output
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Devuelve el estilo
     *
     * @return \PlanB\Utils\Cli\Style
     */
    public function getStyle(): Style
    {
        if (is_null($this->style)) {
            $this->style = Style::create();
        }

        return $this->style;
    }


    /**
     * Aplica un estilo y da por finalizada la definición de elemento
     *
     * @param \PlanB\Utils\Cli\Style $style
     *
     * @return \PlanB\Utils\Cli\OutputAggregate
     */
    public function apply(Style $style): OutputAggregate
    {
        $this->style($style);

        return $this->end();
    }

    /**
     * Asigna un objeto OutputAggregate como padre de este elemento
     *
     * @param \PlanB\Utils\Cli\OutputAggregate $parent
     *
     * @return \PlanB\Utils\Cli\Output
     */
    protected function setParent(OutputAggregate $parent): Output
    {

        $this->parent = $parent;

        return $this;
    }

    /**
     * Da por finalizada la definición de este elemento, y devuelve el padre
     *
     * @return \PlanB\Utils\Cli\OutputAggregate
     */
    public function end(): OutputAggregate
    {
        return $this->parent;
    }
}
