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

namespace PlanB\DS\Resolver;

/**
 * Mantiene una lista con los valores resueltos
 */
class ResolvedValuesList
{

    /**
     * @var \DS\Map
     */
    private $mapOfValues;

    /**
     * ResolvedValuesList named constructor.
     *
     * @return \PlanB\DS\Resolver\ResolvedValuesList
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * ResolvedValuesList constructor.
     */
    protected function __construct()
    {
        $this->mapOfValues = new \DS\Map();
    }

    /**
     * Añade un input a la lista
     *
     * @param mixed                    $key
     * @param \PlanB\DS\Resolver\Input $input
     *
     * @return \PlanB\DS\Resolver\ResolvedValuesList
     */
    public function set($key, Input $input): self
    {
        if (!$input->isValid()) {
            return $this;
        }

        $value = $input->value();

        $this->mapOfValues[$key] = $value;

        return $this;
    }


    /**
     * Devuelve los valores resueltos
     *
     * @return \Ds\Map
     */
    public function map(): \Ds\Map
    {
        return $this->mapOfValues;
    }


    /**
     * Indica si la lista está vacia
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return 0 === count($this->mapOfValues);
    }
}
