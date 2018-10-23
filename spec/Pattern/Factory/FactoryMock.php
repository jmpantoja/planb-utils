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

namespace spec\PlanB\Pattern\Factory;


use PlanB\Pattern\Factory\Factory;
use PlanB\Pattern\Factory\FactoryMethodList;
use PlanB\Type\Data\Data;

class FactoryMock extends Factory
{
    /**
     * @param mixed $value
     *
     * @return \PlanB\Beautifier\Format\FormatInterface
     */
    public static function factory($value): string
    {
        $data = Data::make($value);
        return self::evaluate($data, $value);

    }

    /**
     * @param mixed $value
     *
     * @return \PlanB\Beautifier\Format\FormatInterface
     */
    public static function factoryAndFail($value): string
    {
        $data = Data::make($value);

        return (new static())
            ->register('xxxx')
            ->create($data);

    }

    /**
     * Registra métodos en este factory
     *
     * @param FactoryMethodList $methods
     * @return void
     */
    protected function configure(): void
    {
        $this->register('makeCountable');
        $this->register('makeThrowable');
        $this->register('makeStringifable');
    }

    public function makeCountable(Data $data): ?string
    {
        if (!$data->isCountable()) {
            return null;
        }

        return 'A';
    }

    public function makeThrowable(Data $data): ?string
    {
        if (!$data->isThrowable()) {
            return null;
        }
        return 'B';
    }


    public function makeStringifable(Data $data): ?string
    {
        if (!$data->isConvertibleToString()) {
            return null;
        }
        return 'C';
    }

}
