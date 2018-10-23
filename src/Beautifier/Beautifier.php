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

namespace PlanB\Beautifier;

use PlanB\Beautifier\Format\FormatFactory;
use PlanB\Beautifier\Format\FormatInterface;
use PlanB\Beautifier\Parser\ParserFactory;

/**
 * Crea representaciones de variables con un estilo aplicado
 */
class Beautifier
{
    /**
     * Beautifier named constructor.
     *
     * @return \PlanB\Beautifier\Beautifier
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * Beautifier constructor.
     */
    protected function __construct()
    {
    }

    /**
     * Parsea una plantilla
     *
     * @param string                            $template
     * @param mixed[]                           $values
     *
     * @param null|\PlanB\Beautifier\Enviroment $enviroment
     *
     * @return string
     */
    public function parse(string $template, array $values, ?Enviroment $enviroment = null): string
    {
        $parser = ParserFactory::factory($enviroment);

        return $parser->parse($template, $values);
    }


    /**
     * Devuelve la representacion de una variable
     *
     * @param mixed                             $value
     * @param null|\PlanB\Beautifier\Enviroment $enviroment
     *
     * @return string
     */
    public function dump($value, ?Enviroment $enviroment = null): string
    {

        $format = FormatFactory::factory($value);

        return $this->format($format, $enviroment);
    }

    /**
     * Devuelve la representación de un objeto format
     *
     * @param \PlanB\Beautifier\Format\FormatInterface $format
     * @param null|\PlanB\Beautifier\Enviroment        $enviroment
     *
     * @return string
     */
    public function format(FormatInterface $format, ?Enviroment $enviroment = null): string
    {
        $parser = ParserFactory::factory($enviroment);

        return $parser->format($format);
    }
}
