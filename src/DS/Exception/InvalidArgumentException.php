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

use PlanB\DS\Resolver\Input\FailedInput;
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

        if ($previous instanceof \Throwable) {
            $message = sprintf("%s because: \n\n%s", $message, $previous->getMessage());
        }

        parent::__construct($message, 100, $previous);
    }

    /**
     * Crea una instancia
     *
     * @param \PlanB\DS\Resolver\Input\FailedInput $input
     * @param null|\Throwable                      $previous
     *
     * @return \PlanB\DS\Exception\InvalidArgumentException
     */
    public static function make(FailedInput $input, ?\Throwable $previous = null): self
    {
        $original = $input->getOriginal();
        $value = Data::make($original)->decorate();

        $message = sprintf("%s \n\nis <options=bold,underscore>NOT VALID</>", $value);

        return new static($message, $previous);
    }
}
