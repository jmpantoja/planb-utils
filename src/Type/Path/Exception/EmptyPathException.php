<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PlanB\Type\Path\Exception;

/**
 * Se lanza cuando se intenta crear un objeto path, con una ruta vacia
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class EmptyPathException extends \DomainException
{

    /**
     * EmptyPathException constructor.
     *
     * @param string          $message
     * @param null|\Throwable $previous
     */
    protected function __construct(string $message, ?\Throwable $previous = null)
    {
        parent::__construct($message, 100, $previous);
    }


    /**
     * No se pueden crear Paths desde cadenas vacias
     *
     * @param \Throwable|null $previous
     *
     * @return \PlanB\Type\Path\Exception\EmptyPathException
     */
    public static function make(?\Throwable $previous = null): self
    {
        $message = 'No se pueden crear Paths desde cadenas vacias';

        return new static($message, $previous);
    }
}
