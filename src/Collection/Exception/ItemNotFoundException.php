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

namespace PlanB\Type\Collection\Exception;

/**
 * Se lanza cuando se trata de acceder a un elemento que no existe
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class ItemNotFoundException extends \OutOfRangeException
{
    /**
     * Crea una instancia, con un mensae que indica que la clave no existe
     *
     * @param string          $key
     * @param null|\Throwable $previous
     *
     * @return \PlanB\Type\Collection\ItemNotFoundException
     */
    public static function forKey(string $key, ?\Throwable $previous = null): self
    {

        $message = sprintf('Undefined index: %s', $key);

        return new static($message, 100, $previous);
    }

    /**
     * Crea una instancia, con un mensae que indica que el elemento no existe
     *
     * @param null|\Throwable $previous
     *
     * @return \PlanB\Type\Collection\Exception\ItemNotFoundException
     */
    public static function forCondition(?\Throwable $previous = null): self
    {
        return new static('Element not found', 100, $previous);
    }
}
