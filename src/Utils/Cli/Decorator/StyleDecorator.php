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

/**
 * Añade las etiquetas de estilo
 */
class StyleDecorator extends AbstractDecorator
{

    /**
     * @inheritdoc
     */
    private const FORMAT = '<%s>%s</>';

    /**
     * @inheritdoc
     */
    public function decorate(Line $line, Style $style, Spacing $spacing): Line
    {
        return $this->wrap($line, $style);
    }

    /**
     * Envuelve una cadena de texto con las etiquetas de estilo
     *
     * @param \PlanB\Utils\Cli\Line        $line
     * @param \PlanB\Utils\Cli\Style\Style $style
     *
     * @return \PlanB\Utils\Cli\Line|\PlanB\ValueObject\Text\Text
     */
    protected function wrap(Line $line, Style $style)
    {
        if ($style->isEmpty()) {
            return $line;
        }

        $attributes = $style->getAttributesAsString();

        return Line::format(self::FORMAT, $attributes, $line->stringify());
    }
}
