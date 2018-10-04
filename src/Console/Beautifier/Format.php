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

namespace PlanB\Console\Beautifier;

use MabeEnum\Enum;

/**
 * Enum para formatos
 *
 * @method static Format SIMPLE()
 * @method static Format FULL()
 */
class Format extends Enum
{
    public const SIMPLE = 0;
    public const FULL = 1;

    /**
     * Named Constructor
     *
     * @param  mixed $format
     *
     * @return \PlanB\Console\Beautifier\Format
     */
    public static function make($format): self
    {
        if ($format instanceof Format) {
            return $format;
        }

        $format = (int) $format;

        return Format::get($format);
    }
}
