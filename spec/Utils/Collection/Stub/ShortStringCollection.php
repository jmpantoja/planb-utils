<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\PlanB\Utils\Collection\Stub;


use PlanB\Utils\Collection\Collection;

class ShortStringCollection extends Collection
{

    public function __construct()
    {
        parent::__construct('string');
    }

    public function validate(string $value)
    {
        return strlen($value) <= 5;
    }

    public function normalize(string $value): string
    {
        return $value;
    }

    public function normalizeKey(string $value, ?string $key): ?string
    {
        return $key;
    }

}