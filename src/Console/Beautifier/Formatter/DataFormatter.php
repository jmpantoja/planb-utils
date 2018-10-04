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

use PlanB\Console\Beautifier\Format;
use PlanB\Type\Data\Data;

/**
 * Formatea un objeto PlanB\Type\Data\Data
 */
class DataFormatter extends ValueFormatter
{

    /**
     * Named constructor
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return \PlanB\Console\Beautifier\Formatter\DataFormatter
     */
    public static function makeIfPossible(Data $data): ?self
    {
        if ($data->isInstanceOf(Data::class)) {
            return self::make($data->getValue());
        }

        return null;
    }


    /**
     * Named constructor
     *
     * @param \PlanB\Type\Data\Data $value
     *
     * @return \PlanB\Console\Beautifier\Formatter\DataFormatter
     */
    public static function make(Data $value): self
    {
        return new static($value);
    }


    /**
     * @inheritdoc
     */
    public function simple(): string
    {
        $data = Data::make($this->getValue());
        $value = $this->parseValue($data);

        return beautify($value, Format::SIMPLE());
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
        $data = $data->getValue();

        if (!$data->isObject()) {
            return 'value';
        }

        if ($this->hasKeyLikeType($data)) {
            return $data->getType()->stringify();
        }

        return 'class';
    }

    /**
     * Indica si se debe usar el nombre de tipo como clave
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return bool
     */
    protected function hasKeyLikeType(Data $data): bool
    {
        return $data->isConvertibleToString() || $data->isHashable();
    }

    /**
     * @inheritdoc
     */
    protected function parseValue(Data $data)
    {
        $value = $data->getValue();

        return $value->getValue();
    }
}
