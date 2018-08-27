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

use PlanB\DS\ItemList\Item;

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
    protected function __construct(string $message, ?\Throwable $previous = null)
    {
        parent::__construct($message, 100, $previous);
    }

    /**
     * Crea una instancia
     *
     * @param \PlanB\DS\ItemList\Item $item
     * @param null|\Throwable         $previous
     *
     * @return \PlanB\DS\ItemList\Exception\InvalidItemException
     */
    public static function create(Item $item, ?\Throwable $previous = null): self
    {
        $message = sprintf("Item %s \n\nis <options=bold,underscore>NOT VALID</>", (string) $item);

        if ($previous instanceof \Throwable) {
            $message = sprintf("%s because: \n\n%s", $message, $previous->getMessage());
        }

        return new static($message);
    }
}
