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

namespace PlanB\Beautifier\Parser\Decorator;

use PlanB\Beautifier\Style\Style;

/**
 * Iguala los ancho de linea
 */
class LineWidthDecorator implements DecoratorInterface
{

    /**
     * ConsoleTagDecorator named constructor
     *
     * @return \PlanB\Beautifier\Parser\Decorator\LineWidthDecorator
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * Decora un valor, aplicando un estilo
     *
     * @param \PlanB\Beautifier\Style\Style $style
     * @param string                        $value
     *
     * @return string
     */
    public function decorate(Style $style, string $value): string
    {
        if (!$style->isExpand()) {
            return $value;
        }

        $lineWidth = $style->getLineWidth();
        $align = $style->getAlignValue();

        return str_pad($value, $lineWidth, ' ', $align);
    }
}
