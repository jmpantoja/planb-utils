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
 * Formato para un objeto de tipo Exception
 */
class ExceptionFormat implements FormatInterface
{
    /**
     * @var string
     */
    private $className;

    /**
     * @var bool
     */
    private $verbose;

    /**
     * @var \PlanB\Beautifier\Format\ExceptionTraceFormat
     */
    private $trace;


    /**
     * ExceptionFormat named constructor.
     *
     * @param \PlanB\Type\Data\Data $exception
     *
     * @return \PlanB\Beautifier\Format\ExceptionFormat
     */
    public static function make(\Throwable $exception): self
    {
        return new static($exception);
    }

    /**
     * DataFormat constructor.
     *
     * @param \Throwable $exception
     */
    protected function __construct(\Throwable $exception)
    {
        $this->className = get_class($exception);
        $this->trace = ExceptionTraceFormat::make($exception);

        $this->verbose = false;
    }

    /**
     * Indica si se debe mostrar las trazas, o no
     *
     * @param bool $verbose
     *
     * @return \PlanB\Beautifier\Format\ExceptionFormat
     */
    public function setVerbose(bool $verbose): self
    {
        $this->verbose = $verbose;

        return $this;
    }

    /**
     * Indica si se ha activado el modo verbose
     *
     * @return bool
     */
    public function isVerbose(): bool
    {
        return $this->verbose;
    }


    /**
     * Devuelve el template
     *
     * @return string
     */
    public function getTemplate(): string
    {
        $traceTemplate = $this->getTraceTemplate();

        $template = <<<eof
        
            <exception_header:blank>
            <exception_header:class>
            <exception_header:blank>

            <exception_body:message>
            
            
            $traceTemplate
eof;

        return $template;
    }

    /**
     * Devuelve el trozo de template que corresponde a la traza
     *
     * @return string
     */
    private function getTraceTemplate(): string
    {
        if (!$this->isVerbose()) {
            return '';
        }

        return $this->trace->getTemplate();
    }


    /**
     * Devuelve los replacements
     *
     * @return mixed[]
     */
    public function getReplacements(): array
    {
        $replacements = [
            'blank' => '',
            'class' => $this->getClassName(),
            'message' => $this->getValue(),
        ];

        $traceReplacements = $this->getTraceReplacements();

        return array_merge($replacements, $traceReplacements);
    }


    /**
     * Devuelve los reemplazos que corresponden a la traza
     *
     * @return string[]
     */
    private function getTraceReplacements(): array
    {
        if (!$this->isVerbose()) {
            return [];
        }

        return $this->trace->getReplacements();
    }

    /**
     * Devuelve el nombre de clase de la excepción
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->trace->getValue();
    }

    /**
     * Devuelve la clase de la excepción
     *
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }
}
