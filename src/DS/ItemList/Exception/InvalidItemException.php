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

namespace PlanB\DS\ItemList\Exception;

use PlanB\DS\ItemList\KeyValue;

/**
 * Se lanza cuando se trata de añadir un elemento considerado no valido
 */
class InvalidItemException extends \InvalidArgumentException
{
    /**
     * InvalidItemException constructor.
     *
     * @param string                                      $message
     * @param null|\PlanB\DS\ItemList\Exception\Throwable $previous
     */
    public function __construct(string $message, ?\Throwable $previous = null)
    {
        parent::__construct($message, 100, $previous);
    }

    /**
     * Crea una instancia
     *
     * @param \PlanB\DS\ItemList\KeyValue $pair
     * @param null|\Throwable             $previous
     *
     * @return \PlanB\DS\ItemList\Exception\InvalidItemException
     */
    public static function create(KeyValue $pair, ?\Throwable $previous = null): self
    {

        $message = sprintf('Element %s is not valid', (string) $pair);

        return new static($message, $previous);
    }
}
