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
 * Formatea un objeto Countable
 */
class CountableFormatter extends ValueFormatter
{

    /**
     * Named constructor
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return null|\PlanB\Console\Beautifier\Formatter\CountableFormatter
     */
    public static function makeIfPossible(Data $data): ?self
    {
        if ($data->isCountable()) {
            return self::make($data->getValue());
        }

        return null;
    }

    /**
     * Named constructor
     *
     * @param mixed $value
     *
     * @return \PlanB\Console\Beautifier\Formatter\CountableFormatter
     */
    public static function make($value): self
    {
        ensure_data($value)->isCountable();

        return new static($value);
    }


    /**
     * @inheritdoc
     */
    public function full(): string
    {
        $data = Data::make($this->getValue());

        $type = $this->parseType($data);
        $key = $this->parseKey($data);
        $value = $this->parseValue($data);

        $value = sprintf(self::NUMERIC, $value);

        return sprintf(self::FULL_WITH_KEY, $type, $key, $value);
    }

    /**
     * @inheritdoc
     */
    public function simple(): string
    {
        $data = Data::make($this->getValue());

        $type = $this->parseType($data);
        $value = $this->parseValue($data);
        $value = sprintf('%s(%s)', $type, $value);

        if ($data->isObject()) {
            return sprintf(self::CLASSNAME, $value);
        }

        return sprintf(self::NUMERIC, $value);
    }


    /**
     * @inheritdoc
     */
    protected function parseKey(Data $data): ?string
    {
        return 'count';
    }

    /**
     * @inheritdoc
     */
    protected function parseValue(Data $data)
    {
        $value = $data->getValue();

        return count($value);
    }
}
