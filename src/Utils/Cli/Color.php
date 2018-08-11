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

use MabeEnum\Enum;

/**
 * Enum con los posibles colores
 */
final class Color extends Enum
{
    public const DEFAULT = 'default';
    public const BLACK = 'black';
    public const RED = 'red';
    public const GREEN = 'green';
    public const YELLOW = 'yellow';
    public const BLUE = 'blue';
    public const MAGENTA = 'magenta';
    public const CYAN = 'cyan';
    public const WHITE = 'white';
}
