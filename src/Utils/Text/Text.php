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

namespace PlanB\Utils\Text;

/**
 * Representa una cadena de texto
 */
class Text
{
    /**
     * @var string
     */
    private $text;

    /**
     * Text constructor.
     *
     * @param string $text
     */
    private function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * Crea una nueva instancia
     *
     * @param string $text
     *
     * @return \PlanB\Utils\Text\Text
     */
    public static function create(string $text = ''): self
    {
        return new self($text);
    }

    /**
     * Cambia el valor del texto (inmutable)
     *
     * @param string $text
     *
     * @return \PlanB\Utils\Text\Text
     */
    public function overwite(string $text): self
    {
        return self::create($text);
    }

    /**
     * __toString alias
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->__toString();
    }

    /**
     * Devuelve la cadena de texto
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->text;
    }

    /**
     * Indica si es una cadena vacia
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return 0 === strlen($this->text);
    }

    /**
     * Indica si la cadena está compuesta unicamente por espacios en blanco
     *
     * @return bool
     */
    public function isBlank(): bool
    {
        return 0 === strlen(trim($this->text));
    }

    /**
     * Devuelve la longitud de la cadena
     *
     * @return int
     */
    public function getLength(): int
    {
        return strlen($this->text);
    }

    /**
     * Devuelve una nueva instancia, con los espacios en blanco (u otros caracteres)
     * eliminados del comienzo y del final de la cadena
     *
     * @param string $charlist
     *
     * @return \PlanB\Utils\Text\Text
     */
    public function trim(?string $charlist = " \t\n\r\0\x0B"): self
    {
        return self::create(trim($this->text, $charlist));
    }

    /**
     * Devuelve una nueva instancia, con los espacios en blanco (u otros caracteres)
     * eliminados del final de la cadena
     *
     * @param string $charlist
     *
     * @return \PlanB\Utils\Text\Text
     */
    public function rtrim(?string $charlist = " \t\n\r\0\x0B"): self
    {
        return self::create(rtrim($this->text, $charlist));
    }

    /**
     * Devuelve una nueva instancia, con los espacios en blanco (u otros caracteres)
     * eliminados del comienzo de la cadena
     *
     * @param string $charlist
     *
     * @return \PlanB\Utils\Text\Text
     */
    public function ltrim(?string $charlist = " \t\n\r\0\x0B"): self
    {
        return self::create(ltrim($this->text, $charlist));
    }

    /**
     * Transforma la cadena de texto a formato camelCase
     *
     * @return \PlanB\Utils\Text\Text
     */
    public function toCamelCase(): self
    {

        $pieces = preg_split('/[_\s\W]+/', $this->text);

        $camelCase = array_reduce($pieces, function (string $carry, string $piece) {
            return sprintf('%s%s', $carry, ucfirst($piece));
        }, '');

        $camelCase = lcfirst($camelCase);

        return self::create($camelCase);
    }
}
