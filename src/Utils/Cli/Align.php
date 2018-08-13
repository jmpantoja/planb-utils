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
 * Enum con las posibles alineaciones
 */
final class Align extends Enum
{
    public const LEFT = STR_PAD_RIGHT;
    public const CENTER = STR_PAD_BOTH;
    public const RIGHT = STR_PAD_LEFT;
}
