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

use PlanB\Type\Data\Data;

/**
 * Formato base para datos
 */
abstract class DataFormat implements FormatInterface
{
    /**
     * @var string
     */
    private $type;


    /**
     * @var string
     */
    private $key;


    /**
     * @var string
     */
    private $value;

    /**
     * DataFormat named constructor.
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return \PlanB\Beautifier\Format\DataFormat
     */
    public static function make(Data $data): self
    {
        return new static($data);
    }

    /**
     * DataFormat constructor.
     *
     * @param \PlanB\Type\Data\Data $data
     */
    protected function __construct(Data $data)
    {
        $this->type = $this->parseType($data);
        $this->key = $this->parseKey($data);
        $this->value = $this->parseValue($data);
    }

    /**
     * @inheritdoc
     */
    public function getTemplate(): string
    {
        return '<type:type> {<key><value:value>}';
    }

    /**
     * @inheritdoc
     */
    public function getReplacements(): array
    {
        return [
            'type' => $this->type,
            'key' => $this->getFormattedKey(),
            'value' => $this->getFormattedValue(),
        ];
    }

    /**
     * Devuelve el atributo tipo
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Devuelve el atributo key
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Devuelve el atributo tipo value
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Devuelve el atributo key con formato
     *
     * @return string
     */
    private function getFormattedKey(): string
    {
        if (is_empty($this->key)) {
            return '';
        }

        return sprintf('%s: ', $this->key);
    }

    /**
     * Devuelve el atributo value con formato
     *
     * @return string
     */
    private function getFormattedValue(): string
    {
        return (string) is_numeric($this->value) ?
            $this->value :
            sprintf('"%s"', $this->value);
    }

    /**
     * Devuelve el atributo valor
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return string
     */
    abstract protected function parseValue(Data $data): string;


    /**
     * Devuelve el atributo key
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return string
     */
    abstract protected function parseKey(Data $data): string;

    /**
     * Devuelve el atributo type
     *
     * @param \PlanB\Type\Data\Data $data
     *
     * @return string
     */
    abstract protected function parseType(Data $data): string;
}
