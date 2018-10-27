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

namespace PlanB\Beautifier\Format;

use PlanB\Pattern\Factory\Factory;
use PlanB\Type\Data\Data;

/**
 * Factory para crear objectos Format
 */
class FormatFactory extends Factory
{

    /**
     * @param mixed $value
     *
     * @return null|\PlanB\Beautifier\Format\FormatInterface
     */
    public static function factory($value): FormatInterface
    {
        $data = Data::make($value);

        return self::evaluate($data)->isInstanceOf(FormatInterface::class)->getValue();
    }


    /**
     * Registra métodos en este factory
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->register('makeData');
        $this->register('makeCountable');
        $this->register('makeThrowable');
        $this->register('makeStringifable');
        $this->register('makeHashable');
        $this->register('makeObject');
    }

    /**
     * Crea un objeto CountableFormat
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return null|\PlanB\Beautifier\Format\CountableFormat
     */
    public function makeCountable(Data $data): ?CountableFormat
    {
        if (!$data->isCountable()) {
            return null;
        }

        return CountableFormat::make($data);
    }

    /**
     * Crea un objeto ExceptionFormat
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return null|\PlanB\Beautifier\Format\ExceptionFormat
     */
    public function makeThrowable(Data $data): ?ExceptionFormat
    {
        if (!$data->isThrowable()) {
            return null;
        }

        return ExceptionFormat::make($data->getValue());
    }

    /**
     * Crea un objeto ScalarFormat
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return null|\PlanB\Beautifier\Format\ScalarFormat
     */
    public function makeStringifable(Data $data): ?ScalarFormat
    {
        if (!$data->isConvertibleToString()) {
            return null;
        }

        return ScalarFormat::make($data);
    }

    /**
     * Crea un objeto HashableFormat
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return null|\PlanB\Beautifier\Format\HashableFormat
     */
    public function makeHashable(Data $data): ?HashableFormat
    {
        if (!$data->isHashable()) {
            return null;
        }

        return HashableFormat::make($data);
    }

    /**
     * Crea un objeto DataFormat
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return null|\PlanB\Beautifier\Format\DataFormat
     */
    public function makeData(Data $data): ?DataObjectFormat
    {
        if (!$data->isInstanceOf(Data::class)) {
            return null;
        }

        return DataObjectFormat::make($data);
    }

    /**
     * Crea un objeto ObjectFormat
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return \PlanB\Beautifier\Format\DataFormat
     */
    public function makeObject(Data $data): ObjectFormat
    {
        return ObjectFormat::make($data);
    }
}
