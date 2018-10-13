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

namespace PlanB\Beautifier\Console;


use PlanB\Beautifier\Formatter\Formatter;
use PlanB\Beautifier\Template\AbstractTemplate;
use PlanB\Type\Data\Data;

/**
 * Prepara un contenido para ser mostrado mediante la consola de symfony
 */
class ConsoleFormatter extends Formatter
{
    /**
     * Named constructor.
     *
     * @return ConsoleFormatter
     */
    public static function make(): ConsoleFormatter
    {
        return new static();
    }

}
