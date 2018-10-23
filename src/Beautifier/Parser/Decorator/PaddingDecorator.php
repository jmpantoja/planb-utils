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
 * Aplica el padding
 */
class PaddingDecorator implements DecoratorInterface
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
        $leftSpacing = str_repeat(' ', $style->getLeftPadding());
        $rightSpacing = str_repeat(' ', $style->getRightPadding());

        return sprintf('%s%s%s', $leftSpacing, $value, $rightSpacing);
    }
}
