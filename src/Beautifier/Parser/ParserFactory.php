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

namespace PlanB\Beautifier\Parser;

use PlanB\Beautifier\Enviroment;
use PlanB\Beautifier\Parser\Decorator\ConsoleTagDecorator;
use PlanB\Beautifier\Parser\Decorator\HtmlTagDecorator;
use PlanB\Beautifier\Parser\Decorator\LineWidthDecorator;
use PlanB\Beautifier\Parser\Decorator\MarginDecorator;
use PlanB\Beautifier\Parser\Decorator\PaddingDecorator;
use PlanB\Pattern\Factory\Factory;

/**
 * Factory para crear objetos parser
 */
class ParserFactory extends Factory
{

    /**
     * Devuelve el parser asociado a un nombre
     *
     * @param null|\PlanB\Beautifier\Enviroment $environment
     *
     * @return \PlanB\Beautifier\Parser\Parser
     */
    public static function factory(?Enviroment $environment = null): Parser
    {
        $environment = $environment ?? Enviroment::getFromSapi(PHP_SAPI);

        return self::evaluate($environment);
    }

    /**
     * @inheritdoc
     */
    protected function configure(): void
    {

        $this->register('makeHtml');
        $this->register('makeConsole');
        $this->register('makePlain');
    }

    /**
     * Crea un objeto Html Parser
     *
     * @param \PlanB\Beautifier\Enviroment $enviroment
     *
     * @return null| \PlanB\Beautifier\Parser\Parser
     */
    public function makeHtml(Enviroment $enviroment): ?Parser
    {

        if (!$enviroment->isHtml()) {
            return null;
        }

        return Parser::make()
            ->addDecorator(PaddingDecorator::make())
            ->addDecorator(LineWidthDecorator::make())
            ->addDecorator(HtmlTagDecorator::make())
            ->addDecorator(MarginDecorator::make());
    }

    /**
     * Crea un objeto Console Parser
     *
     * @param \PlanB\Beautifier\Enviroment $enviroment
     *
     * @return null|\PlanB\Beautifier\Parser\Parser
     */
    public function makeConsole(Enviroment $enviroment): ?Parser
    {
        if (!$enviroment->isConsole()) {
            return null;
        }

        return Parser::make()
            ->addDecorator(PaddingDecorator::make())
            ->addDecorator(LineWidthDecorator::make())
            ->addDecorator(ConsoleTagDecorator::make())
            ->addDecorator(MarginDecorator::make());
    }

    /**
     * Crea un objeto Console Parser
     *
     * @return null|\PlanB\Beautifier\Parser\Parser
     */
    public function makePlain(): ?Parser
    {
        return PlainTextParser::make();
    }
}
