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

use \PlanB\ValueObject\Text\Text;
use \PlanB\ValueObject\Text\TextAssurance;
use \PlanB\Utils\Type\Type;


if (!function_exists('ensure_text')) {

    function ensure_text(string $text): TextAssurance
    {
        return TextAssurance::create($text);
    }
}

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

if (!function_exists('to_camel_case')) {

    function to_camel_case(string $text): string
    {
        return (string)Text::create($text)->toCamelCase();
    }

}


if (!function_exists('to_snake_case')) {

    function to_snake_case(string $text, string $separator = '_'): string
    {
        return (string)Text::create($text)->toSnakeCase($separator);
    }
}

if (!function_exists('to_string')) {

    function to_string($value): string
    {
        return Type::create($value)->stringify();
    }
}
