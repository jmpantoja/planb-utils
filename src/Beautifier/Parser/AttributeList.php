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

namespace PlanB\Beautifier\Parser;

use PlanB\Type\Stringifable;
use PlanB\Utils\Traits\Stringify;

/**
 * Utilidad para crear una cadena de texto a partir de un array con atributos
 */
class AttributeList implements Stringifable
{

    use Stringify;

    /**
     * @var mixed[]
     */
    private $attributes;
    /**
     * @var string
     */
    private $delimiter;

    /**
     * AttributeList named constructor.
     *
     * @param string[] $attributes
     *
     * @return \PlanB\Beautifier\Parser\AttributeList
     */
    public static function make(array $attributes = []): self
    {
        return new static('=', $attributes);
    }

    /**
     * AttributeList named constructor.
     *
     * @param string[] $attributes
     *
     * @return \PlanB\Beautifier\Parser\AttributeList
     */
    public static function colon(array $attributes = []): self
    {
        return new static(':', $attributes);
    }


    /**
     * AttributeList constructor.
     *
     * @param string  $delimiter
     * @param mixed[] $attributes
     */
    protected function __construct(string $delimiter, array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->delimiter = $delimiter;
    }

    /**
     * Devuelve true si no hay ningun atributo asignado,
     * o false en caso contrario
     *
     * @return bool
     */
    public function isEmpty(): bool
    {

        $attributes = $this->getAttributes();

        return 0 === count($attributes);
    }

    /**
     * __toString alias
     *
     * @return string
     */
    public function stringify(): string
    {
        $tokens = [];

        $attributes = $this->getAttributes();

        foreach ($attributes as $key => $value) {
            $tokens[] = $this->parseValue($key, $value);
        }

        return implode(';', $tokens);
    }

    /**
     * Devuelve un array con los atributos
     *
     * @return string[]
     */
    private function getAttributes(): array
    {
        return array_filter($this->attributes);
    }

    /**
     * Parsea un valor
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return string
     */
    private function parseValue(string $key, $value): string
    {

        if (is_array($value)) {
            return $this->parseArray($key, $value);
        }

        return $this->parseScalar($key, $value);
    }

    /**
     * Parsea un scalar
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return string
     */
    private function parseArray(string $key, $value): string
    {
        return sprintf('%s%s%s', $key, $this->delimiter, implode(',', $value));
    }

    /**
     * Parsea un scalar
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return string
     */
    private function parseScalar(string $key, $value): string
    {
        return sprintf('%s%s%s', $key, $this->delimiter, $value);
    }
}
