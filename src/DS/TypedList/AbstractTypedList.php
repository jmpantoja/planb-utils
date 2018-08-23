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

namespace PlanB\DS\TypedList;

use PlanB\DS\ItemList\AbstractList;
use PlanB\DS\TypedList\Resolver\TypeValidator;

/**
 * Lista de elementos del mismo tipo
 */
abstract class AbstractTypedList extends AbstractList implements TypedListInterface
{

    /**
     * TypedList constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $validator = TypeValidator::create($this->getInnerType());
        $this->addValidator($validator, PHP_INT_MAX);
    }

    /**
     * Devuelve el valor máximo
     * El valor a comparar se calcula con un callback
     *
     * @param callable $callback
     *
     * @return null |float
     */
    public function max(callable $callback): ?float
    {
        if ($this->isEmpty()) {
            return null;
        }

        return $this->reduce(function ($item, $carry) use ($callback) {
            $value = (float) call_user_func($callback, $item);

            return max($carry, $value);
        }, PHP_INT_MIN);
    }

    /**
     * Devuelve el valor mínimo
     * El valor a comparar se calcula con un callback
     *
     * @param callable $callback
     *
     * @return null |float
     */
    public function min(callable $callback): ?float
    {
        if ($this->isEmpty()) {
            return null;
        }

        return $this->reduce(function ($item, $carry) use ($callback) {
            $value = (float) call_user_func($callback, $item);

            return min($carry, $value);
        }, PHP_INT_MAX);
    }
}
