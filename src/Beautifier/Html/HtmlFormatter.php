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

namespace PlanB\Beautifier\Html;

use PlanB\Beautifier\Formatter\Formatter;
use PlanB\Beautifier\Template;
use PlanB\Type\Data\Data;

/**
 * Prepara un contenido para ser mostrado como html
 */
class HtmlFormatter extends Formatter
{
    /**
     * Named constructor.
     *
     * @return HtmlFormatter
     */
    public static function make(): HtmlFormatter
    {
        return new static();
    }

}
