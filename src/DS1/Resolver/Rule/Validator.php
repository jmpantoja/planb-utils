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

namespace PlanB\DS1\Resolver\Rule;

use PlanB\DS1\Resolver\Input\FailedInput;
use PlanB\DS1\Resolver\Input\Input;
use PlanB\DS1\Resolver\Input\InputInterface;

/**
 * Regla que comprueba si un valor es valido
 */
class Validator extends Rule
{

    /**
     * Convierte la respuesta obtenida en un objeto InputInterface
     *
     * @param mixed $response
     * @param mixed $value
     *
     * @return \PlanB\DS1\Resolver\Input\InputInterface
     */
    public function buildInput($response, $value): InputInterface
    {
        if (false === boolval($response)) {
            return FailedInput::make($value);
        }

        return Input::make($value);
    }
}
