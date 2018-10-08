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
 * Regla que permite transformar Inputs
 */
class Converter extends AbstractRule
{

    /**
     * @inheritdoc
     */
    protected function resolve(Input $input): Input
    {
        $output = $this->call($input->value());
        $input->next($output);


        $input->resolve();

        return $input->resolve();
    }
}
