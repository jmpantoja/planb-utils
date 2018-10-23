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

namespace PlanB\Beautifier\Format;

/**
 * Formato para la traza de una Exception
 */
class ExceptionTraceFormat implements FormatInterface
{

    /**
     * @var string
     */
    private $value;

    /**
     * @var string[]
     */
    private $templates = [];

    /**
     * @var string[]
     */
    private $replacements = [];


    /**
     * ExceptionTraceFormat constructor.
     *
     * @param \Throwable $exception
     *
     * @return \PlanB\Beautifier\Format\ExceptionTraceFormat
     */
    public static function make(\Throwable $exception): self
    {
        return new static($exception);
    }

    /**
     * ExceptionTraceFormat constructor.
     *
     * @param \Throwable $exception
     */
    protected function __construct(\Throwable $exception)
    {
        $this->value = $exception->getMessage();

        $traceAsString = $exception->getTraceAsString();
        $traces = explode("\n", $traceAsString);

        foreach ($traces as $index => $trace) {
            $this->initTrace($index, $trace);
        }
    }

    /**
     * Inicializa los elementos deducidos de una linea de traza
     *
     * @param int    $index
     * @param string $trace
     */
    protected function initTrace(int $index, string $trace): void
    {
        $lines = explode(':', $trace, 2);
        $headerKey = sprintf('h%s', $index);
        $callKey = sprintf('c%s', $index);

        $this->templates[] = sprintf('<exception_trace:%s>', $headerKey);
        $this->templates[] = sprintf("<exception_body:%s>\n", $callKey);

        $this->replacements[$headerKey] = $lines[0];
        $this->replacements[$callKey] = $lines[1] ?? '';
    }

    /**
     * Devuelve el template
     *
     * @return string
     */
    public function getTemplate(): string
    {
        return implode("\n", $this->templates);
    }

    /**
     * Devuelve los replacements
     *
     * @return mixed[]
     */
    public function getReplacements(): array
    {
        return $this->replacements;
    }

    /**
     * Devuelve el valor que se está formateando
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
