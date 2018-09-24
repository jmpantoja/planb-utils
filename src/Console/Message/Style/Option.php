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

namespace PlanB\Console\Message\Style;

use MabeEnum\Enum;

/**
 * Enum con las posibles opciones
 *
 * @method static Option BLINK()
 * @method static Option BOLD()
 * @method static Option UNDERSCORE()
 * @method static Option REVERSE()
 */
final class Option extends Enum
{
    public const BLINK = 'blink';
    public const BOLD = 'bold';
    public const UNDERSCORE = 'underscore';
    public const REVERSE = 'reverse';
}
