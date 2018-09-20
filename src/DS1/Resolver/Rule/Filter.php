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

use PlanB\DS1\Resolver\Input\IgnoredInput;
use PlanB\DS1\Resolver\Input\Input;
use PlanB\DS1\Resolver\Input\InputInterface;

/**
 * Discrimina los valores que se consideran validos de los que no
 * No lanza excepciones ante un valor incorrecto, simplemente lo ignora
 */
class Filter extends Rule
{
    /**
     * Resolver named constructor.
     *
     * @param callable $callback
     *
     * @return \PlanB\DS1\Resolver\Rule\Filter
     */
    public static function make(callable $callback): Filter
    {
        return new static($callback);
    }

    /**
     * @inheritdoc
     */
    public function buildInput($response, $value): InputInterface
    {
        if (false === boolval($response)) {
            return IgnoredInput::make($value);
        }

        return Input::make($value);
    }
}
