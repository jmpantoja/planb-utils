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

namespace PlanB\DS\Exception;

/**
 * Se lanza cuando se trata de añadir un valor considerado no valido
 */
class InvalidArgumentException extends \InvalidArgumentException
{
    /**
     * InvalidItemException constructor.
     *
     * @param string          $message
     * @param null|\Throwable $previous
     */
    public function __construct(string $message, ?\Throwable $previous = null)
    {
        parent::__construct($message, 100, $previous);
    }

    /**
     * InvalidItemException named constructor.
     *
     * @param mixed           $data
     * @param string          $reason
     * @param null|\Throwable $previous
     *
     * @return \PlanB\DS\Exception\InvalidArgumentException
     */
    public static function make($data, string $reason, ?\Throwable $previous = null): self
    {

        $message = self::buildMessage($data, $reason);

        return new static($message, $previous);
    }

    /**
     * Construye el mensaje de la excepción
     *
     * @param mixed  $data
     * @param string $reason
     *
     * @return string
     */
    private static function buildMessage($data, string $reason): string
    {
        $template = self::getTemplate();

        $message = beautify_parse($template, [
            'value' => $data,
            'not_valid' => 'NOT VALID',
            'reason' => $reason,
        ]);

        return $message;
    }

    /**
     * Devuelve la template para el mensaje
     *
     * @return string
     */
    private static function getTemplate(): string
    {
        $template = <<<eof
    <type:value>
    is <strong:not_valid>
    because:
    <reason>
eof;

        return $template;
    }
}
