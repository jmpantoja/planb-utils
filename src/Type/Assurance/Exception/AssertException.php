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

namespace PlanB\Type\Assurance\Exception;

use Throwable;

/**
 * Se lanza cuando un objeto no cumple alguna de las condiciones especificadas
 */
class AssertException extends \AssertionError
{
    /**
     * FailAssuranceException constructor.
     *
     * @param string          $message
     * @param \Throwable|null $previous
     */
    protected function __construct(string $message, ?Throwable $previous = null)
    {
        parent::__construct($message, 100, $previous);
    }

    /**
     * Crea una nueva instancia
     *
     * @param object          $wrapped
     * @param string          $method
     * @param mixed[]         $arguments
     * @param null|\Throwable $previous
     *
     * @return \PlanB\Type\Assurance\Exception\AssertException
     */
    public static function make(object $wrapped, string $method, array $arguments, ?\Throwable $previous = null): self
    {

        $template = <<<eof
        <data> <strong:fail> that <strong:method> <params>
eof;

        $message = beautify_parse($template, [
            'data' => beautify_dump($wrapped),
            'fail' => 'fails ensuring',
            'method' => to_snake_case($method, ' '),
            'params' => self::parseParams($arguments),

        ]);



        return new static($message, $previous);
    }


    /**
     * Convierte los argumentos en una cadena de texto
     *
     * @param mixed[] $arguments
     *
     * @return string
     */
    private static function parseParams(array $arguments): string
    {
        if (0 === count($arguments)) {
            return '';
        }

        $arguments = array_map(function ($argument) {
            return beautify_parse('<argument:argument>', [
                'argument' => sprintf('"%s"', $argument),
            ]);
        }, $arguments);

        $parameters = implode(', ', $arguments);

        return sprintf('(%s)', $parameters);
    }
}
