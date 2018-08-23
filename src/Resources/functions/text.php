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

use \PlanB\Type\Text\Text;
use \PlanB\Type\Text\TextAssurance;
use \PlanB\Utils\Type\Type;


if (!function_exists('ensure_text')) {
    /**
     * Assurance para Text
     *
     * @param string $text
     * @return TextAssurance
     */
    function ensure_text(string $text): TextAssurance
    {
        return TextAssurance::create($text);
    }
}

if (!function_exists('is_empty_text')) {

    /**
     * Indica si una cadena está vacia
     *
     * @param string $text
     * @return bool
     */
    function is_empty_textt(string $text): bool
    {
        return Text::create($text)->isEmpty();
    }

}
if (!function_exists('is_blank_text')) {

    /**
     * Indica si una cadena está en blanco
     *
     * @param string $text
     * @return bool
     */
    function is_blank_text(string $text): bool
    {
        return Text::create($text)->isBlank();
    }

}

if (!function_exists('to_camel_case')) {

    /**
     * Convierte una cadena a camel case
     *
     * @param string $text
     * @return string
     */
    function to_camel_case(string $text): string
    {
        return (string)Text::create($text)->toCamelCase();
    }

}


if (!function_exists('to_snake_case')) {

    /**
     * Convierte una cadena a snake case
     *
     * @param string $text
     * @param string $separator
     * @return string
     */
    function to_snake_case(string $text, string $separator = '_'): string
    {
        return (string)Text::create($text)->toSnakeCase($separator);
    }
}

if (!function_exists('force_to_string')) {

    /**
     * Devuelve la representación de $value como cadena de texto
     *Forzandola cuando no es posible
     *
     * @param mixed $value
     * @return string
     */
    function force_to_string($value): string
    {
        return Type::create($value)->stringify();
    }
}


if (!function_exists('to_string')) {

    /**
     * Devuelve la representación de $value como cadena de texto
     * Lanza una excepción cuando no es posible
     *
     * @param $value
     * @return string
     */
    function to_string($value): string
    {
        return Text::create($value)->stringify();
    }
}

if (!function_exists('to_text')) {

    /**
     * Devuelve la representación de $value como Text
     * Lanza una excepción cuando no es posible
     *
     * @param $value
     * @return Text
     */
    function to_text($value): Text
    {
        return Text::create($value);
    }
}
