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

use PlanB\Console\Beautifier\Formatter\ExceptionFormatter\ExceptionBodyBuilder;
use PlanB\Console\Beautifier\Formatter\ExceptionFormatter\ExceptionHeaderBuilder;
use PlanB\Console\Beautifier\Formatter\ExceptionFormatter\ExceptionTraceBuilder;
use PlanB\Console\Message\Paragraph;
use PlanB\Type\Data\Data;

/**
 * Formatea una excepción
 */
class ExceptionFormatter implements FormatterInterface
{
    /**
     * @var mixed|\Throwable
     */
    private $exception;


    /**
     * Named constructor
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return null|\PlanB\Console\Beautifier\Formatter\ExceptionFormatter
     */
    public static function makeIfPossible(Data $data): ?self
    {
        if ($data->isInstanceOf(\Throwable::class)) {
            return self::make($data->getValue());
        }

        return null;
    }

    /**
     * Named constructor
     *
     * @param \Throwable $exception
     *
     * @return \PlanB\Console\Beautifier\Formatter\ExceptionFormatter
     */
    public static function make(\Throwable $exception): self
    {
        return new static($exception);
    }


    /**
     * AbstractFormatter constructor.
     *
     * @param mixed $exception
     */
    protected function __construct(\Throwable $exception)
    {
        $this->exception = $exception;
    }

    /**
     * Devuelve una representación de la variable original en formato completo
     *
     * @return string
     */
    public function full(): string
    {
        return $this->addLines([
            $this->buildHeader(),
            $this->buildBody(),
            cli_blank(),
            cli_blank(),
            $this->buildTrace(),

        ])->stringify();
    }

    /**
     * Devuelve una representación de la variable original en formato simple
     *
     * @return string
     */
    public function simple(): string
    {
        return $this->addLines([
            $this->buildHeader(),
            $this->buildBody(),

        ])->stringify();
    }

    /**
     * Devuelve un objeto Paragraph compuesto por las lineas indicadas
     *
     * @param mixed[] $lines
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    private function addLines(array $lines): Paragraph
    {
        array_unshift($lines, cli_blank());

        return cli_msg($lines)->padding(1)->margin(1);
    }

    /**
     * Construye el encabezado
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    private function buildHeader(): Paragraph
    {
        return ExceptionHeaderBuilder::make($this->exception)
            ->build();
    }

    /**
     * Construye el cuerpo
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    private function buildBody(): Paragraph
    {
        return ExceptionBodyBuilder::make($this->exception)
            ->build();
    }

    /**
     * Construye la traza
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    private function buildTrace(): Paragraph
    {
        return ExceptionTraceBuilder::make($this->exception)
            ->build();
    }
}
