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

namespace PlanB\Beautifier\Format;

use PlanB\Type\Data\Data;

/**
 * Formato para un objeto del tipo Data
 */
class DataObjectFormat extends DataFormat
{

    /**
     * DataFormat named constructor.
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return \PlanB\Beautifier\Format\DataFormat
     */
    public static function make(Data $data): DataFormat
    {
        return new static($data->getValue());
    }

    /**
     * @inheritdoc
     */
    protected function parseValue(Data $data): string
    {
        $format = FormatFactory::factory($data->getValue());

        return $format->getValue();
    }

    /**
     * @inheritdoc
     */
    protected function parseKey(Data $data): string
    {
        if ($this->hasKeyLikeType($data)) {
            return $data->getTypeName();
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
        return $data->isScalar() || $data->isConvertibleToString() || $data->isHashable();
    }

    /**
     * @inheritdoc
     */
    protected function parseType(Data $data): string
    {
        return Data::class;
    }
}
