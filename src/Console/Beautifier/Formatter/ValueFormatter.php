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

use PlanB\Console\Beautifier\Format;
use PlanB\Type\Data\Data;

/**
 * Clase base para formatters
 */
abstract class ValueFormatter implements FormatterInterface
{

    public const FULL_WITH_KEY = '<fg=cyan;options=bold>[%s</> {<fg=white>%s</>: %s}<fg=blue></><fg=cyan;options=bold>]</>';
    public const FULL_WITHOUT_KEY = '<fg=cyan;options=bold>[%s</> {%s}<fg=blue></><fg=cyan;options=bold>]</>';
    public const NUMERIC = '<fg=green>%s</>';
    public const TEXT = '<fg=green>"%s"</>';
    public const CLASSNAME = '<fg=yellow>"%s"</>';

    /**
     * @var mixed
     */
    private $value;

    /**
     * AbstractFormatter constructor.
     *
     * @param mixed $value
     */
    protected function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @inheritdoc
     */
    public function full(): string
    {
        $data = Data::make($this->getValue());

        $type = $this->parseType($data);
        $key = $this->parseKey($data);
        $value = $this->parseValue($data);

        $value = beautify($value, Format::SIMPLE());

        if (!is_null($key)) {
            return sprintf(self::FULL_WITH_KEY, $type, $key, $value);
        }

        return sprintf(self::FULL_WITHOUT_KEY, $type, $value);
    }

    /**
     * @inheritdoc
     */
    public function simple(): string
    {
        $data = Data::make($this->getValue());
        $value = $this->parseValue($data);

        if (!is_numeric($value)) {
            return sprintf(self::TEXT, $value);
        }

        return sprintf(self::NUMERIC, $value);
    }

    /**
     * Calcula el token Type
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return string
     */
    protected function parseType(Data $data): string
    {
        return $data->getType()->stringify();
    }


    /**
     * Calcula el token Key
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return null|string
     */
    abstract protected function parseKey(Data $data): ?string;


    /**
     * @inheritdoc
     */
    abstract protected function parseValue(Data $data);
}
