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

namespace PlanB\Type;

/**
 * Se lanza cuando se trata de acceder a un elemento que no existe
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class ItemNotFoundException extends \OutOfRangeException
{
    /**
     * @param string          $key
     * @param null|\Throwable $previous
     *
     * @return \PlanB\Type\ItemNotFoundException
     */
    public static function forKey(string $key, ?\Throwable $previous = null): self
    {

        $message = sprintf('Undefined index: %s', $key);

        return new static($message, 100, $previous);
    }
}
