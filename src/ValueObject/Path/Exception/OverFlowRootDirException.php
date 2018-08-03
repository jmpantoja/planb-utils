<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PlanB\ValueObject\Path\Exception;

/**
 * Se lanza cuando se intenta acceder al nivel padre del directorio raiz
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class OverFlowRootDirException extends \DomainException
{
    /**
     * OverFlowRootDirException constructor.
     *
     * @param string                                           $message
     * @param null|\PlanB\ValueObject\Path\Exception\Throwable $previous
     */
    public function __construct(string $message, ?Throwable $previous = null)
    {
        parent::__construct($message, 100, $previous);
    }


    /**
     * Crea un objeto OverFlowRootDirException
     *
     * @param \Throwable|null $previous
     *
     * @return \PlanB\ValueObject\Path\Exception\OverFlowRootDirException
     */
    public static function create(?\Throwable $previous = null): OverFlowRootDirException
    {
        $message = 'No se puede crear la ruta porque va más allá del directorio raiz';

        return new self($message, $previous);
    }
}
