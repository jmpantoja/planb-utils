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
 * Formatea un objeto
 */
class ObjectFormatter extends ValueFormatter
{

    /**
     * Named constructor
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return null|\PlanB\Console\Beautifier\Formatter\ObjectFormatter
     */
    public static function makeIfPossible(Data $data): ?self
    {
        if ($data->isObject()) {
            return self::make($data->getValue());
        }

        return null;
    }


    /**
     * Named constructor
     *
     * @param object $value
     *
     * @return \PlanB\Console\Beautifier\Formatter\ObjectFormatter
     */
    public static function make(object $value): self
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

        return sprintf(self::CLASSNAME, $value);
    }

    /**
     * @inheritdoc
     */
    protected function parseType(Data $data): string
    {
        return 'object';
    }

    /**
     * @inheritdoc
     */
    protected function parseKey(Data $data): ?string
    {
        return 'class';
    }

    /**
     * @inheritdoc
     */
    protected function parseValue(Data $data)
    {
        $value = $data->getType()->stringify();

        return $value;
    }
}
