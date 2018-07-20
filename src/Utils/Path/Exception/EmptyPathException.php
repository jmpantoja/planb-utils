<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PlanB\Utils\Path\Exception;

/**
 * Se lanza cuando se intenta crear un objeto path, con una ruta vacia
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class EmptyPathException extends \DomainException
{

    /**
     * No se pueden crear Paths desde cadenas vacias
     *
     * @param \Throwable|null $previous
     *
     * @return \PlanB\Utils\Path\Exception\EmptyPathException
     */
    public static function create(?\Throwable $previous = null): self
    {
        $message = 'No se pueden crear Paths desde cadenas vacias';

        return new self($message, 0, $previous);
    }
}
