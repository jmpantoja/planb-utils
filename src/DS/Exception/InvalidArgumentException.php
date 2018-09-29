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

use PlanB\Type\Data\Data;

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

        $value = Data::make($data)->decorate();
        $message = cli_msg([
            $value,
            sprintf('is %s', cli_line('NOT VALID')->bold()->underscore()),
            cli_blank(),
            'because:',
            $reason,
        ]);

        return new static($message->render()->stringify(), $previous);
    }
}
