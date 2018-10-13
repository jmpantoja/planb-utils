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

namespace PlanB\Beautifier\Formatter;

use PlanB\Beautifier\Console\ConsoleFormatter;
use PlanB\Beautifier\Html\HtmlFormatter;
use PlanB\Beautifier\PlainText\PlainTextFormatter;

/**
 * Factoria para crear objetos Formatter
 */
class FormatterFactory
{
    public const SAPI_CLI = 'cli';
    public const SAPI_PHPDBG = 'phpdbg';

    /**
     * FormatterFactory named constructor.
     *
     * @return FormatterFactory
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * FormatterFactory constructor.
     */
    protected function __construct()
    {
    }

    /**
     * Devuelve el formatter adecuado al contexto actual
     *
     * @param string $sapi
     * @return FormatterInterface
     */
    public function getByContext(string $sapi): FormatterInterface
    {
        switch ($sapi) {
            case self::SAPI_CLI:
            case self::SAPI_PHPDBG:
                return $this->getPlainText();
                break;
            default:
                return $this->getHtml();
        }
    }

    /**
     * Devuelve un Plain Text Formatter
     *
     * @return PlainTextFormatter
     */
    public function getPlainText(): PlainTextFormatter
    {
        return PlainTextFormatter::make();
    }


    /**
     * Devuelve un Console Formatter
     *
     * @return ConsoleFormatter
     */
    public function getConsole(): ConsoleFormatter
    {
        return ConsoleFormatter::make();
    }

    /**
     * Devuelve un Html Formatter
     *
     * @return HtmlFormatter
     */
    public function getHtml(): HtmlFormatter
    {
        return HtmlFormatter::make();
    }
}
