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

namespace PlanB\Beautifier\Style;

use PlanB\Pattern\Factory\Factory;

/**
 * Factory para crear estilos
 */
class StyleFactory extends Factory
{

    /**
     * Crea objetos Style
     *
     * @param string $type
     *
     * @return \PlanB\Beautifier\Style\Style
     */
    public static function factory(StyleType $type): Style
    {
        return self::evaluate($type);
    }

    /**
     * Configura esta factoria
     */
    protected function configure(): void
    {

        $this->register('makeType');
        $this->register('makeValue');
        $this->register('makeArgument');
        $this->register('makeStrong');
        $this->register('makeExceptionHeader');
        $this->register('makeExceptionBody');
        $this->register('makeExceptionTrace');
        $this->register('makeEmpty');
    }


    /**
     * Devuelte un style de tipo "Type"
     *
     * @param \PlanB\Beautifier\Style\StyleType $type
     *
     * @return null|\PlanB\Beautifier\Style\Style
     */
    public function makeType(StyleType $type): ?Style
    {
        if (!$type->isType()) {
            return null;
        }

        return Style::make()
            ->setFgColor(Color::CYAN())
            ->bold(true);
    }

    /**
     * Devuelte un style de tipo "Type"
     *
     * @param \PlanB\Beautifier\Style\StyleType $type
     *
     * @return null|\PlanB\Beautifier\Style\Style
     */
    public function makeValue(StyleType $type): ?Style
    {
        if (!$type->isValue()) {
            return null;
        }

        return Style::make()
            ->setFgColor(Color::GREEN());
    }

    /**
     * Devuelte un style de tipo "argument"
     *
     * @param \PlanB\Beautifier\Style\StyleType $type
     *
     * @return null|\PlanB\Beautifier\Style\Style
     */
    public function makeArgument(StyleType $type): ?Style
    {
        if (!$type->isArgument()) {
            return null;
        }

        return Style::make()
            ->setFgColor(Color::YELLOW());
    }

    /**
     * Devuelte un style de tipo "strong"
     *
     * @param \PlanB\Beautifier\Style\StyleType $type
     *
     * @return null|\PlanB\Beautifier\Style\Style
     */
    public function makeStrong(StyleType $type): ?Style
    {
        if (!$type->isStrong()) {
            return null;
        }

        return Style::make()
            ->bold()
            ->underscore();
    }

    /**
     * Devuelte un style de tipo "exception_header"
     *
     * @param \PlanB\Beautifier\Style\StyleType $type
     *
     * @return null|\PlanB\Beautifier\Style\Style
     */
    public function makeExceptionHeader(StyleType $type): ?Style
    {
        if (!$type->isExceptionHeader()) {
            return null;
        }

        return Style::make()
            ->setBgColor(Color::RED())
            ->setFgColor(Color::WHITE())
            ->bold()
            ->margin(2)
            ->padding(2)
            ->align(Align::CENTER());
    }

    /**
     * Devuelte un style de tipo "exception_body"
     *
     * @param \PlanB\Beautifier\Style\StyleType $type
     *
     * @return null|\PlanB\Beautifier\Style\Style
     */
    public function makeExceptionBody(StyleType $type): ?Style
    {
        if (!$type->isExceptionBody()) {
            return null;
        }

        return Style::make()
            ->margin(2);
    }


    /**
     * Devuelte un style de tipo "exception_trace"
     *
     * @param \PlanB\Beautifier\Style\StyleType $type
     *
     * @return null|\PlanB\Beautifier\Style\Style
     */
    public function makeExceptionTrace(StyleType $type): ?Style
    {
        if (!$type->isExceptionTrace()) {
            return null;
        }

        return Style::make()
            ->setFgColor(Color::GREEN())
            ->margin(2);
    }


    /**
     * Devuelte un objeto Style por defecto
     *
     * @return null|\PlanB\Beautifier\Style\Style
     */
    public function makeEmpty(): ?Style
    {

        return Style::make();
    }
}
