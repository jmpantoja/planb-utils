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

namespace PlanB\DS\Stack;

use PlanB\DS\Collection;

/**
 * Interfaz para Stack
 */
interface StackInterface extends Collection
{
    /**
     * Returns the value at the top of the stack without removing it.
     *
     * @return mixed
     *
     * @throws \UnderflowException if the stack is empty.
     */
    public function peek();

    /**
     * Returns and removes the value at the top of the stack.
     *
     * @return mixed
     *
     * @throws \UnderflowException if the stack is empty.
     */
    public function pop();

    /**
     * Pushes one value onto the top of the stack.
     *
     * @param mixed $value
     *
     * @return \PlanB\DS\Stack
     */
    public function push($value): StackInterface;

    /**
     * Pushes zero or more values onto the top of the stack.
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Stack
     */
    public function pushAll(iterable $input): StackInterface;
}
