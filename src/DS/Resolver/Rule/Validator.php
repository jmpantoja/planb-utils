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
 * Regla que permite validar Inputs
 */
class Validator extends AbstractRule
{

    /**
     * @inheritdoc
     */
    protected function resolve(Input $input): Input
    {
        $output = $this->call($input->value());

        if (false === $output) {
            $input
                ->reject()
                ->resolve();
        }

        return $input;
    }
}
