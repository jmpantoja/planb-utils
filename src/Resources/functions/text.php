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
use \PlanB\Type\Data\Data;
use \PlanB\Console\Beautifier\Beautifier;
use \PlanB\Console\Beautifier\Format;


if (!function_exists('ensure_text')) {
    /**
     * Assurance para Text
     *
     * @param string $text
     * @return TextAssurance
     */
    function ensure_text(string $text): TextAssurance
    {
        return TextAssurance::make($text);
    }
}

if (!function_exists('is_empty')) {

    /**
     * Indica si una cadena está vacia
     *
     * @param mixed $value
     * @return bool
     */
    function is_empty($value): bool
    {
        $data = Data::make($value);

        if ($data->isConvertibleToString()) {
            return Text::make($value)->isEmpty();
        }

        if ($data->isCountable()) {
            return 0 === count($value);
        }

        return false;
    }

}
if (!function_exists('is_blank')) {

    /**
     * Indica si una cadena está en blanco
     *
     * @param string $text
     * @return bool
     */
    function is_blank(string $text): bool
    {
        return Text::make($text)->isBlank();
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
        return (string)Text::make($text)->toCamelCase();
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
        return (string)Text::make($text)->toSnakeCase($separator);
    }
}

if (!function_exists('beautify')) {

    /**
     * Devuelve la representación de $value como cadena de texto
     *
     * @param mixed $value
     * @param bool|int|Format $format
     *
     * @return string
     */
    function beautify($value, $format = Format::FULL): string
    {
        $format = Format::make($format);

        return Beautifier::make()
            ->render($value, $format);
    }
}

if (!function_exists('beautify_type')) {

    /**
     * Devuelve la representación de $value como cadena de texto
     *
     * @param mixed $value
     * @param bool|int|Format $format
     *
     * @return string
     */
    function beautify_type($type): string
    {
        return Beautifier::make()
            ->type($type);
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
        return Text::make($value)->stringify();
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
        return Text::make($value);
    }
}
