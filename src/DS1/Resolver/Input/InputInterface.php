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

namespace PlanB\DS1\Resolver\Input;

/**
 * Valor que se intenta resolver
 */
interface InputInterface
{
    /**
     * @return mixed
     */
    public function getValue();

    /**
     * Indica si el valor es de uno de los tipos pasados
     *
     * @param null|string $allowed
     *
     * @return bool
     */
    public function isTypeOf(?string $allowed): bool;
}
