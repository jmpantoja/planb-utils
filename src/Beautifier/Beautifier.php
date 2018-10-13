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

namespace PlanB\Beautifier;

use PlanB\Beautifier\Formatter\FormatterFactory;
use PlanB\Type\Data\Data;

/**
 * Representa de una forma amigable una variable
 */
class Beautifier
{

    /**
     * @var FormatterFactory
     */
    private $factory;

    /**
     * Beautifier named constructor.
     * @param null|FormatterFactory $factory
     * @return Beautifier
     */
    public static function make(?FormatterFactory $factory = null): self
    {
        $factory = $factory ?? FormatterFactory::make();
        return new static($factory);
    }

    /**
     * Beautifier constructor.
     * @param FormatterFactory $factory
     */
    protected function __construct(FormatterFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Devuelve la representación de una variable
     *
     * @param mixed $value
     * @return string
     */
    public function dump($value): string
    {
        $formatter = $this->factory->getByContext(PHP_SAPI);
        return $formatter->dump($value);
    }

    /**
     * Devuelve la representación de una variable para la consola de simfony
     *
     * @param mixed $value
     * @return string
     */
    public function toConsole($value): string
    {
        $formatter = $this->factory->getConsole();
        return $formatter->dump($value);
    }

    /**
     * Devuelve la representación de una variable para html
     *
     * @param mixed $value
     * @return string
     */
    public function toHtml($value): string
    {
        $formatter = $this->factory->getHtml();
        return $formatter->dump($value);
    }

    /**
     * Devuelve la representación de una variable en texto plano
     *
     * @param mixed $value
     * @return string
     */
    public function toPlainText($value): string
    {
        $formatter = $this->factory->getPlainText();
        return $formatter->dump($value);
    }

}
