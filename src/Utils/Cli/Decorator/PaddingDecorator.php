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
 * Añade padding al texto
 */
class PaddingDecorator extends AbstractDecorator
{
    /**
     * @inheritdoc
     */
    public function decorate(Line $line, Style $style, Spacing $spacing): Line
    {
        $left = $spacing->getLeft();
        $right = $spacing->getRight();

        return Line::format('%s%s%s', $left, $line, $right);
    }
}
