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

namespace PlanB\DS1\Traits;

use PlanB\DS1\Collection;

/**
 * Métodos asociados con la interfaz resolvable
 */
trait TraitResolver
{
    /**
     * @var \Ds\Collection
     */
    protected $items;

    /**
     * @param mixed[] $input
     *
     * @return \PlanB\DS1\Collection
     */
    public static function make(iterable $input = []): Collection
    {
        return new static($input);
    }

    /**
     * @inheritDoc
     */
    protected function __construct(iterable $input = [])
    {
        $this->items = $this->makeInternal($input);
    }

    /**
     * Crea la estructura de datos interna
     *
     * @param mixed[] $input
     *
     * @return \DS\Collection
     */
    abstract protected function makeInternal(iterable $input): \DS\Collection;

    /**
     * Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS1\Collection
     */
    protected function duplicate(iterable $input = []): Collection
    {

        //puedo hacer que siga siendo typed, si procede

        return new static($input);
    }
}
