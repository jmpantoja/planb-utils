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

namespace PlanB\DS\ItemList\Resolver;

use PlanB\DS\ItemList\ListInterface;

/**
 * Permite crear un resolver a partir de un callable
 */
class CallableResolver extends AbstractResolver
{
    /**
     * @var \Closure
     */
    private $closure;

    /**
     * CallableResolver constructor.
     *
     * @param callable $callback
     */
    private function __construct(callable $callback)
    {
        $this->closure = \Closure::bind($callback, $this);
    }

    /**
     * Crea una instancia desde un callable
     *
     * @param callable $callback
     *
     * @return \PlanB\DS\ItemList\Resolver\CallableResolver
     */
    public static function fromCallable(callable $callback): self
    {
        return new self($callback);
    }

    /**
     * Resuelve una pareja clave/valor
     *
     * @param mixed                            $value
     * @param mixed                            $key
     * @param \PlanB\DS\ItemList\ListInterface $context
     *
     * @return mixed
     */
    public function resolve($value, $key, ListInterface $context)
    {
        return call_user_func($this->closure, $value, $key, $context);
    }
}
