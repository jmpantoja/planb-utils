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

namespace PlanB\Console\Beautifier\Formatter\ExceptionFormatter;

use PlanB\Console\Message\Paragraph;
use PlanB\Console\Message\Style\Color;

/**
 * Builder para crear una linea  de la traza de una excepción
 */
class ExceptionTraceLineBuilder implements ExceptionBuilderInterface
{
    /**
     * @var string
     */
    private $trace;

    /**
     * @var string
     */
    private $invocation;

    /**
     * ExceptionHeaderBuilder Named constructor.
     *
     * @param string $traceLine
     *
     * @return \PlanB\Console\Beautifier\Formatter\ExceptionFormatter\ExceptionTraceLineBuilder
     */
    public static function make(string $traceLine): self
    {
        $pieces = explode(':', $traceLine, 2);

        $trace = $pieces[0] ?? '';
        $invocation = $pieces[1] ?? '';

        return new static($trace, $invocation);
    }

    /**
     * ExceptionHeaderBuilder constructor.
     *
     * @param string $trace
     * @param string $invocation
     */
    protected function __construct(string $trace, string $invocation)
    {
        $this->trace = trim($trace);
        $this->invocation = trim($invocation);
    }


    /**
     * Devuelve el párrafo de encabezado
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public function build(): Paragraph
    {
        return cli_msg([
            $this->buildTrace(),
            $this->buildInvocation(),
            cli_blank(),
        ])->margin(3)
            ->fgColor(Color::WHITE());
    }

    /**
     * Devuelve el la linea de traza
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    private function buildTrace(): Paragraph
    {
        return cli_line($this->trace)
            ->bold()
            ->fgColor(Color::MAGENTA());
    }

    /**
     * Devuelve la linea de invocación al método
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    private function buildInvocation(): Paragraph
    {

        $pieces = explode('(', $this->invocation, 2);

        $pieces[0] = cli_line($pieces[0])
            ->bold()->stringify();

        $line = implode('(', $pieces);

        return cli_line($line)
            ->padding(3, 0);
    }
}
