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

/**
 * Builder para crear la traza de una excepción
 */
class ExceptionTraceBuilder extends ExceptionBuilderAbstract
{

    /**
     * Devuelve el párrafo de encabezado
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public function build(): Paragraph
    {

        $lines = $this->calculeLines();

        $body = cli_msg($lines);

        return $body;
    }

    /**
     * Devuelve un array con todas las lineas de la traza, formateadas
     *
     * @return string[]
     */
    private function calculeLines(): array
    {
        $message = $this->getException()->getTraceAsString();

        $rawLines = explode("\n", $message);

        $lines = $this->formatLines($rawLines);
        $lines[] = cli_blank();

        return $lines;
    }

    /**
     * @param string[] $rawLines
     *
     * @return string[]
     */
    private function formatLines(array $rawLines): array
    {
        $lines = [];
        foreach ($rawLines as $line) {
            $lines[] = $this->formatOneLine($line);
        }

        return array_reverse($lines);
    }

    /**
     * Construye una linea de la traza
     *
     * @param string $traceLine
     *
     * @return string
     */
    private function formatOneLine(string $traceLine): string
    {

        return ExceptionTraceLineBuilder::make($traceLine)
            ->build()
            ->stringify();
    }
}
