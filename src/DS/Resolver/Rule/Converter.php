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

use PlanB\DS\Resolver\Input\Input;
use PlanB\DS\Resolver\Input\InputInterface;

/**
 * Regla que transforma un valor de un tipo dado, en otro
 */
class Converter extends Rule
{

    /**
     * Convierte la respuesta obtenida en un objeto InputInterface
     *
     * @param mixed $response
     * @param mixed $value
     *
     * @return \PlanB\DS\Resolver\Input\InputInterface
     */
    public function buildInput($response, $value): InputInterface
    {
        return Input::make($response);
    }
}
