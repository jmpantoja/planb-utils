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
 * Interfaz para Decorators
 */
interface DecoratorInterface
{
    /**
     * Decora un valor, aplicando un estilo
     *
     * @param \PlanB\Beautifier\Style\Style $style
     * @param string                        $value
     *
     * @return string
     */
    public function decorate(Style $style, string $value): string;
}
