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

namespace PlanB\Beautifier\Formatter;

use PlanB\Beautifier\DataToBeauty;

/**
 * Interfaz para Formatters
 */
interface FormatterInterface
{
    /**
     * @param mixed $data
     * @return string
     */
    public function dump($data): string;

}
