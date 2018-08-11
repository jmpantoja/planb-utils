<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace PlanB\DS\ItemList\Exception;

/**
 * Se lanza cuando se trata de acceder a un elemento que no existe
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class ItemNotFoundException extends \OutOfRangeException
{
    /**
     * ItemNotFoundException constructor.
     *
     * @param string                                      $message
     * @param null|\PlanB\DS\ItemList\Exception\Throwable $previous
     */
    protected function __construct(string $message, ?Throwable $previous = null)
    {
        parent::__construct($message, 100, $previous);
    }


    /**
     * Crea una instancia, con un mensae que indica que la clave no existe
     *
     * @param string          $key
     * @param null|\Throwable $previous
     *
     * @return \PlanB\DS\ItemList\Exception\ItemNotFoundException
     */
    public static function forKey(string $key, ?\Throwable $previous = null): self
    {

        $message = sprintf('Undefined index: %s', $key);

        return new static($message, $previous);
    }

    /**
     * Crea una instancia, con un mensae que indica que el elemento no existe
     *
     * @param null|\Throwable $previous
     *
     * @return \PlanB\DS\ItemList\Exception\ItemNotFoundException
     */
    public static function forCondition(?\Throwable $previous = null): self
    {
        return new static('Element not found', $previous);
    }
}
