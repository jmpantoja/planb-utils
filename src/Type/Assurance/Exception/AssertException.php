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

use PlanB\Console\Beautifier\Format;
use PlanB\Type\Text\Text;
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

        $message = self::buildMessage($wrapped, $method, $arguments);

        return new static($message->stringify(), $previous);
    }

    /**
     * @param object  $wrapped
     * @param string  $method
     * @param mixed[] $arguments
     *
     * @return \PlanB\Type\Text\Text
     */
    private static function buildMessage(object $wrapped, string $method, array $arguments): Text
    {
        $method = to_snake_case($method, ' ');
        $params = self::parseParams($arguments);

        $message = cli_msg([
            beautify($wrapped),
            cli_line('fails ensuring')->bold()->underscore(),
            'that',
            cli_line($method)->bold()->underscore(),
            $params,

        ])->line();

        return $message;
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
            return beautify($argument, Format::SIMPLE());
        }, $arguments);

        $parameters = implode(', ', $arguments);

        return sprintf('(%s)', $parameters);
    }
}
