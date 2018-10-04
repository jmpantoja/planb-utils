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
 * Clase base para Excepcion Formatter Builders
 */
abstract class ExceptionBuilderAbstract implements ExceptionBuilderInterface
{
    /**
     * @var \Throwable
     */
    private $exception;

    /**
     * ExceptionHeaderBuilder Named constructor.
     *
     * @param \Throwable $exception
     *
     * @return mixed
     */
    public static function make(\Throwable $exception): ExceptionBuilderInterface
    {
        return new static($exception);
    }

    /**
     * ExceptionHeaderBuilder constructor.
     *
     * @param \Throwable $exception
     */
    protected function __construct(\Throwable $exception)
    {
        $this->exception = $exception;
    }

    /**
     * Devuelve la excepción
     *
     * @return \Throwable
     */
    protected function getException(): \Throwable
    {
        return $this->exception;
    }

    /**
     * Devuelve el párrafo de encabezado
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    abstract public function build(): Paragraph;
}
