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

/**
 * Se lanza cuando se trata de cambiar la configuración de una lista
 * que ya contiene datos
 */
class ReconfigureFullyListException extends \DomainException
{

    /**
     * ReconfigureFullyListException constructor.
     *
     * @param string                                      $message
     * @param null|\PlanB\DS\ItemList\Exception\Throwable $previous
     */
    public function __construct(string $message, ?Throwable $previous = null)
    {
        parent::__construct($message, 100, $previous);
    }


    /**
     * Crea una nueva instancia
     *
     * @param null|\Throwable $previous
     *
     * @return \PlanB\DS\ItemList\Exception\ReconfigureFullyListException
     */
    public static function create(?\Throwable $previous = null): ReconfigureFullyListException
    {
        $message = "You cann't change the configuration on a locked List";

        return new static($message, $previous);
    }
}
