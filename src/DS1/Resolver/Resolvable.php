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

namespace PlanB\DS1\Resolver;

use PlanB\DS1\Resolver\Input\InputInterface;

/**
 * Interfaz para componentes capaces de resolver un input
 */
interface Resolvable
{
    /**
     * Resuelve un input
     *
     * @param \PlanB\DS1\Resolver\Input\InputInterface $input
     *
     * @return \PlanB\DS1\Resolver\Input\InputInterface
     */
    public function resolve(InputInterface $input): InputInterface;
}
