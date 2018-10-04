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

use Ds\Hashable;
use PlanB\Type\Data\Data;

/**
 * Formatea un objeto Hashable
 */
class HashFormatter extends ValueFormatter
{

    /**
     * Named constructor
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return null|\PlanB\Console\Beautifier\Formatter\HashFormatter
     */
    public static function makeIfPossible(Data $data): ?self
    {
        if ($data->isHashable()) {
            return self::make($data->getValue());
        }

        return null;
    }


    /**
     * Named constructor
     *
     * @param \Ds\Hashable $value
     *
     * @return \PlanB\Console\Beautifier\Formatter\HashFormatter
     */
    public static function make(Hashable $value): self
    {
        return new static($value);
    }

    /**
     * Calcula el token Key
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return null|string
     */
    protected function parseKey(Data $data): ?string
    {
        return 'value';
    }

    /**
     * Calcula el token Value
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return mixed
     */
    protected function parseValue(Data $data)
    {
        $value = $data->getValue();

        return $value->hash();
    }
}
