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

namespace PlanB\Console\Message\Decorator;

use PlanB\Console\Message\Line;
use PlanB\Console\Message\Style\Style;

/**
 * Añade un margen al texto
 */
class MarginDecorator extends Decorator
{

    /**
     * @inheritdoc
     */
    public function render(Line $line, Style $style): Line
    {
        return Line::concat([
            $style->getMarginLeft(),
            $line,
            $style->getMarginRight(),
        ]);
    }
}
