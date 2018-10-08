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

namespace PlanB\DS\Resolver\Rule;

use PlanB\DS\Resolver\Input;

/**
 * Regla que permite cargar otros Inputs
 */
class Loader extends AbstractRule
{

    /**
     * Resuelve un input
     *
     * @param \PlanB\DS\Resolver\Input $input
     *
     * @return \PlanB\DS\Resolver\Input
     *
     * @throws \Throwable
     */
    protected function resolve(Input $input): Input
    {
        $this->call($input->value());
        $input->ignore();

        return $input;
    }
}
