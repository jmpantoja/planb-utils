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

use \PlanB\Console\Message\Paragraph;
use \PlanB\Console\Message\Message;
use \PlanB\Console\Message\Style\Style;


if (!function_exists('cli_msg')) {

    /**
     * @return Paragraph
     */
    function cli_msg(iterable $lines): Paragraph
    {
        $paragraph = Message::join($lines);
        return $paragraph;
    }
}


if (!function_exists('cli_line')) {

    /**
     * @return Paragraph
     */
    function cli_line(string $format, ...$arguments): Paragraph
    {
        return Message::line($format, ...$arguments);
    }
}
if (!function_exists('cli_blank')) {

    /**
     * @return Paragraph
     */
    function cli_blank(): Paragraph
    {
        return Message::blank();
    }
}

