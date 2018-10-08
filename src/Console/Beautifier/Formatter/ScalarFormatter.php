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

namespace PlanB\Console\Beautifier\Formatter;

use PlanB\Type\Data\Data;

/**
 * Formatea un objeto como una cadena de texto
 */
class ScalarFormatter extends ValueFormatter
{


    /**
     * Named constructor
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return null|\PlanB\Console\Beautifier\Formatter\ScalarFormatter
     */
    public static function makeIfPossible(Data $data): ?self
    {
        if ($data->isConvertibleToString()) {
            return self::make($data->getValue());
        }

        return null;
    }

    /**
     * Named constructor
     *
     * @param mixed $value
     *
     * @return \PlanB\Console\Beautifier\Formatter\ScalarFormatter
     */
    public static function make($value): self
    {
        ensure_data($value)->isConvertibleToString();

        return new static($value);
    }

    /**
     * @inheritdoc
     */
    protected function parseKey(Data $data): ?string
    {
        return $data->isObject() ? 'text' : null;
    }

    /**
     * @inheritdoc
     */
    protected function parseValue(Data $data)
    {
        return $data->getValue();
    }
}
