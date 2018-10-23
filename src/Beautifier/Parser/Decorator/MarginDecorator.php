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
 * Aplica el margen
 */
class MarginDecorator implements DecoratorInterface
{

    /**
     * PaddingDecorator named constructor
     *
     * @return \PlanB\Beautifier\Parser\Decorator\PaddingDecorator
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @inheritdoc
     */
    public function decorate(Style $style, string $value): string
    {
        $leftSpacing = str_repeat(' ', $style->getLeftMargin());
        $rightSpacing = str_repeat(' ', $style->getRightMargin());

        return sprintf('%s%s%s', $leftSpacing, $value, $rightSpacing);
    }
}
