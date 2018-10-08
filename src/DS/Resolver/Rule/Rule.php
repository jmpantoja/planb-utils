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
 * Manipula un valor antes de ser añadido a la colección
 */
class Rule extends AbstractRule
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

        $output = $this->call($input->value(), $input);

        return $input->resolve($output);
    }
}
