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
 * Interfaz para decoradores
 */
interface DecoratorInterface
{
    /**
     * Aplica un estilo al texto
     *
     * @param \PlanB\Utils\Cli\Line          $line
     * @param \PlanB\Utils\Cli\Style\Style   $style
     *
     * @param \PlanB\Utils\Cli\Style\Spacing $spacing
     *
     * @return \PlanB\Utils\Cli\Line
     */
    public function decorate(Line $line, Style $style, Spacing $spacing): Line;
}
