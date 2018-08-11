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

namespace PlanB\ValueObject\Text;

use PlanB\DS\ItemList\ItemList;
use PlanB\ValueObject\Stringifable;

/**
 * Representa una cadena de texto
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class Text implements Stringifable
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
    protected function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * Crea una nueva instancia
     *
     * @param mixed $text
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    public static function create($text = ''): self
    {
        ensure_type($text)->isConvertibleToString();

        return new static((string) $text);
    }

    /**
     * Cambia el valor del texto (inmutable)
     *
     * @param string $text
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    public function overwite(string $text): self
    {
        return self::create($text);
    }

    /**
     * @inheritdoc
     */
    public function stringify(?string $format = null): string
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
     * @return \PlanB\ValueObject\Text\Text
     */
    public function trim(string $charlist = " \t\n\r\0\x0B"): self
    {
        return self::create(trim($this->text, $charlist));
    }

    /**
     * Devuelve una nueva instancia, con los espacios en blanco (u otros caracteres)
     * eliminados del final de la cadena
     *
     * @param string $charlist
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    public function rtrim(string $charlist = " \t\n\r\0\x0B"): self
    {
        return self::create(rtrim($this->text, $charlist));
    }

    /**
     * Devuelve una nueva instancia, con los espacios en blanco (u otros caracteres)
     * eliminados del comienzo de la cadena
     *
     * @param string $charlist
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    public function ltrim(string $charlist = " \t\n\r\0\x0B"): self
    {
        return self::create(ltrim($this->text, $charlist));
    }

    /**
     * Transforma la cadena de texto a formato camelCase
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    public function toCamelCase(): self
    {

        return $this->split('/[_\s\W]+/')
            ->reduce(function (string $piece, Text $carry) {
                return $carry->append(ucfirst($piece));
            }, self::create())
            ->toLowerFirst();
    }

    /**
     * Transforma la cadena de texto a formato snake_case
     *
     * @param string $separator
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    public function toSnakeCase(string $separator = '_'): self
    {

        return $this->toCamelCase()
            ->replace('/[A-Z]/', function ($piece) use ($separator) {
                return sprintf('%s%s', $separator, strtolower($piece));
            });
    }

    /**
     * Divide una cadena mediante una expresión regular
     *
     * @param string $pattern
     *
     * @param int    $limit
     * @param int    $flags
     *
     * @return \PlanB\DS\ItemList\ItemList
     */
    public function split(string $pattern, int $limit = -1, int $flags = 0): ItemList
    {
        $pieces = preg_split($pattern, $this->text, $limit, $flags);

        return ItemList::create($pieces);
    }

    /**
     * Divide una cadena en varias, mediante un delimitador
     *
     * @param string $delimiter
     *
     * @param int    $limit
     *
     * @return \PlanB\DS\ItemList\ItemList
     */
    public function explode(string $delimiter, int $limit = PHP_INT_MAX): ItemList
    {
        $pieces = explode($delimiter, $this->text, $limit);

        return ItemList::create($pieces);
    }

    /**
     * Convierte una cadena a minusculas
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    public function toLower(): self
    {
        return self::create(strtolower($this->text));
    }

    /**
     * Convierte el primer caracter de una cadena a minusculas
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    public function toLowerFirst(): self
    {
        return self::create(lcfirst($this->text));
    }

    /**
     * Convierte una cadena a mayusculas
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    public function toUpper(): self
    {
        return self::create(strtoupper($this->text));
    }

    /**
     * Convierte el primer caracter de una cadena a mayusculas
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    public function toUpperFirst(): self
    {
        return self::create(ucfirst($this->text));
    }


    /**
     * Añade una cadena del texto al final de la actual
     *
     * @param string ...$pieces
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    public function append(string ...$pieces): self
    {
        $piece = implode($pieces);

        return self::create(sprintf('%s%s', $this->text, $piece));
    }

    /**
     * Usa una expresión regular para reemplazar segmentos de una cadena
     *
     * @param string   $pattern
     * @param callable $callback
     * @param int      $limit
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    public function replace(string $pattern, callable $callback, int $limit = -1): self
    {
        $replaced = preg_replace_callback($pattern, function ($pieces) use ($callback) {
            $ocurrence = array_shift($pieces);
            array_push($pieces, $ocurrence);

            return call_user_func_array($callback, $pieces);
        }, $this->text, $limit);


        return self::create($replaced);
    }
}
