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

use \PlanB\Utils\Text\Text;

if (!function_exists('isEmptyText')) {

    function isEmptyText(string $text): bool
    {
        return Text::create($text)->isEmpty();
    }

}
if (!function_exists('isBlankText')) {

    function isBlankText(string $text): bool
    {
        return Text::create($text)->isBlank();
    }

}

if (!function_exists('camelCase')) {

    function camelCase(string $text): string
    {
        return Text::create($text)->toCamelCase()->toString();
    }

}

