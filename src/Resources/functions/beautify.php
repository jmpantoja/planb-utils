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

use \PlanB\Beautifier\Beautifier;
use \PlanB\Beautifier\Enviroment;
use \PlanB\Beautifier\Parser\ParserFactory;
use \PlanB\Beautifier\Format\ExceptionFormat;

if (!function_exists('beautify_parse')) {

    /**
     * Devuelve la representación de $value como cadena de texto
     *
     * @param string $template
     * @param array $values
     * @param null|Enviroment $enviroment
     * @return string
     */
    function beautify_parse(string $template, array $values, ?Enviroment $enviroment = null): string
    {
        return Beautifier::make()
            ->parse($template, $values, $enviroment);
    }
}

if (!function_exists('beautify_dump')) {

    /**
     * Devuelve la representación de $value como cadena de texto
     *
     * @param mixed $value
     * @param null|Enviroment $enviroment
     * @return string
     */
    function beautify_dump($value, ?Enviroment $enviroment = null): string
    {
        return Beautifier::make()
            ->dump($value, $enviroment);
    }
}


if (!function_exists('beauty_exception')) {

    /**
     * Devuelve la representación de $value como cadena de texto
     *
     * @param mixed $exception
     * @param null|bool $verbose
     * @param null|Enviroment $enviroment
     * @return string
     *
     */
    function beauty_exception(\Throwable $exception, ?bool $verbose = null, ?Enviroment $enviroment = null): string
    {
        $parser = ParserFactory::factory($enviroment);
        $format = ExceptionFormat::make($exception)
            ->setVerbose(boolval($verbose));

        return $parser->format($format);
    }
}
