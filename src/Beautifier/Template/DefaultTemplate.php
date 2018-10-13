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

namespace PlanB\Beautifier\Template;


use PlanB\Beautifier\Template\Template;
use PlanB\Type\Data\Data;

class DefaultTemplate extends Template
{
    public static function make(Data $data, string $pattern): self
    {
        return new static($data, $pattern);
    }

    /**
     * Devuelve un array de parejas clave/valor con la información
     * asociada a este template
     *
     * @param Data $data
     * @return string[]
     */
    protected function extract(Data $data): array
    {
        return [
            'value' => $data->getValue()
        ];
    }


}
