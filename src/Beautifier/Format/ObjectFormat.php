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
 * Formato para un objeto de tipo Object
 */
class ObjectFormat extends DataFormat
{

    /**
     * @inheritdoc
     */
    protected function parseValue(Data $data): string
    {
        return get_class($data->getValue());
    }

    /**
     * @inheritdoc
     */
    protected function parseKey(Data $data): string
    {
        return 'class';
    }

    /**
     * @inheritdoc
     */
    protected function parseType(Data $data): string
    {
        return 'object';
    }
}
