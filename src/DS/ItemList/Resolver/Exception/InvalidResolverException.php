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

namespace PlanB\DS\ItemList\Resolver\Exception;

use PlanB\DS\ItemList\Resolver\ResolverInterface;

/**
 * Se lanza cuando se trata de añadir un resolver no valido
 */
class InvalidResolverException extends \DomainException
{

    /**
     * InvalidResolverException constructor.
     *
     * @param string                                               $message
     * @param null|\PlanB\DS\ItemList\Resolver\Exception\Throwable $previous
     */
    public function __construct(string $message, ?Throwable $previous = null)
    {
        parent::__construct($message, 100, $previous);
    }


    /**
     * Crea una nueva instancia
     *
     * @param object          $resolver
     * @param null|\Throwable $previous
     *
     * @return \PlanB\DS\ItemList\Resolver\Exception\InvalidResolverException
     */
    public static function create(object $resolver, ?\Throwable $previous = null): self
    {
        $className = get_class($resolver);
        $expected = implode(', ', [ResolverInterface::class, 'callable']);

        $message = sprintf("Invalid resolver %s (%s expected)", $className, $expected);

        return new self($message, $previous);
    }
}
