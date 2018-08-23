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

namespace PlanB\Utils\Cli\Decorator;

use PlanB\Utils\Cli\Line;
use PlanB\Utils\Cli\Style\Spacing;
use PlanB\Utils\Cli\Style\Style;
use PlanB\ValueObject\Text\Text;

/**
 * Justifica el texto dentro de un ancho de linea
 */
class JustifyDecorator extends AbstractDecorator
{

    /**
     * @inheritdoc
     */
    public function decorate(Line $line, Style $style, Spacing $spacing): Line
    {


        $width = $this->calculeWidth($line, $spacing);
        $align = $this->calculeAlign($spacing);

        return $line->padding($width, Text::BLANK_TEXT, $align);
    }

    /**
     * Devuelve el ancho total de la linea
     *
     * @param \PlanB\Utils\Cli\Line          $line
     * @param \PlanB\Utils\Cli\Style\Spacing $spacing
     *
     * @return int
     */
    private function calculeWidth(Line $line, Spacing $spacing): int
    {
        $extra = $line->getTagsLength();
        $width = $spacing->getWidth();

        return $width + $extra;
    }

    /**
     * Devuelve el valor de la Alineación
     *
     * @param \PlanB\Utils\Cli\Style\Spacing $spacing
     *
     * @return int
     */
    private function calculeAlign(Spacing $spacing): int
    {
        $align = $spacing->getAlign();

        return $align->getValue();
    }
}
