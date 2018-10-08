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
 * Factoria para formatters
 */
class FormatterFactory
{
    /**
     * @var \PlanB\Console\Beautifier\Formatter\FormatterInterface
     */
    private $formatter;

    /**
     * Devuelve un formater
     *
     * @param mixed $value
     *
     * @return \PlanB\Console\Beautifier\Formatter\FormatterInterface
     */
    public static function factory($value): FormatterInterface
    {
        $data = Data::make($value);

        return (new static($data))
            ->getFormatter();
    }

    /**
     * FormatterFactory constructor.
     *
     * @param \PlanB\Type\Data\Data $data
     */
    protected function __construct(Data $data)
    {
        $this->addFormatter(CountableFormatter::makeIfPossible($data));
        $this->addFormatter(ExceptionFormatter::makeIfPossible($data));
        $this->addFormatter(ScalarFormatter::makeIfPossible($data));
        $this->addFormatter(HashFormatter::makeIfPossible($data));
        $this->addFormatter(DataFormatter::makeIfPossible($data));
        $this->addFormatter(ObjectFormatter::makeIfPossible($data));
    }

    /**
     * Asigna el primer formatter valido
     *
     * @param null|\PlanB\Console\Beautifier\Formatter\FormatterInterface $formatter
     *
     * @return \PlanB\Console\Beautifier\Formatter\FormatterFactory
     */
    private function addFormatter(?FormatterInterface $formatter): self
    {
        if ($this->isValid($formatter)) {
            $this->formatter = $formatter;
        }

        return $this;
    }

    /**
     * Indica si se puede asignar un formatter
     *  - Cuando no aun no se ha asignado ninguno
     *  - y el formatter candidato no es nulo
     *
     * @param null|\PlanB\Console\Beautifier\Formatter\FormatterInterface $formatter
     *
     * @return bool
     */
    private function isValid(?FormatterInterface $formatter): bool
    {
        return is_null($this->formatter) && ($formatter instanceof FormatterInterface);
    }

    /**
     * Devuelve el formatter
     *
     * @return \PlanB\Console\Beautifier\Formatter\FormatterInterface
     */
    protected function getFormatter(): FormatterInterface
    {
        return $this->formatter;
    }
}
