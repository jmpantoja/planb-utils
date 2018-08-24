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

namespace PlanB\Type\Text;

use PlanB\Type\Stringifable;

/**
 * Representa una cadena de texto
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class Text implements Stringifable
{
    public const LINE_BREAK = "\n";

    public const EMPTY_TEXT = '';

    public const BLANK_TEXT = ' ';

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
     * @return \PlanB\Type\Text\Text
     */
    public static function create($text = ''): self
    {
        ensure_type($text)->isConvertibleToString();

        return new static((string) $text);
    }

    /**
     * Crea una nueva instancia
     *
     * @param string $format
     * @param mixed  ...$arguments
     *
     * @return \PlanB\Type\Text\Text
     */
    public static function format(string $format, ...$arguments): self
    {
        $text = sprintf($format, ...$arguments);

        return new static($text);
    }


    /**
     * Crea una nueva instancia concatenando varias cadenas de texto
     *
     * @param mixed ...$pieces
     *
     * @return \PlanB\Type\Text\Text
     */
    public static function concat(...$pieces): self
    {
        return TextList::create($pieces)
            ->concat();
    }

    /**
     * Cambia el valor del texto (inmutable)
     *
     * @param string $text
     *
     * @return \PlanB\Type\Text\Text
     */
    public function overwite(string $text): self
    {
        return self::create($text);
    }

    /**
     * @inheritdoc
     */
    public function stringify(): string
    {
        return $this->text;
    }

    /**
     * Devuelve la cadena de texto
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->stringify();
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
     * @return \PlanB\Type\Text\Text
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
     * @return \PlanB\Type\Text\Text
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
     * @return \PlanB\Type\Text\Text
     */
    public function ltrim(string $charlist = " \t\n\r\0\x0B"): self
    {
        return self::create(ltrim($this->text, $charlist));
    }

    /**
     * Transforma la cadena de texto a formato camelCase
     *
     * @return \PlanB\Type\Text\Text
     */
    public function toCamelCase(): self
    {

        return $this->split('/[_\s\W]+/')
            ->reduce(function (Text $piece, Text $carry) {
                return $carry->append($piece->toUpperFirst()->stringify());
            }, self::create())
            ->toLowerFirst();
    }

    /**
     * Transforma la cadena de texto a formato snake_case
     *
     * @param string $separator
     *
     * @return \PlanB\Type\Text\Text
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
     * @return \PlanB\Type\Text\TextList
     */
    public function split(string $pattern, int $limit = -1, int $flags = 0): TextList
    {
        $pieces = preg_split($pattern, $this->text, $limit, $flags);

        return TextList::create($pieces);
    }

    /**
     * Divide una cadena en varias, mediante un delimitador
     *
     * @param string $delimiter
     *
     * @param int    $limit
     *
     * @return \PlanB\Type\Text\TextList
     */
    public function explode(string $delimiter, int $limit = PHP_INT_MAX): TextList
    {
        $pieces = explode($delimiter, $this->text, $limit);

        return TextList::create($pieces);
    }

    /**
     * Convierte una cadena a minusculas
     *
     * @return \PlanB\Type\Text\Text
     */
    public function toLower(): self
    {
        return self::create(strtolower($this->text));
    }

    /**
     * Convierte el primer caracter de una cadena a minusculas
     *
     * @return \PlanB\Type\Text\Text
     */
    public function toLowerFirst(): self
    {
        return self::create(lcfirst($this->text));
    }

    /**
     * Convierte una cadena a mayusculas
     *
     * @return \PlanB\Type\Text\Text
     */
    public function toUpper(): self
    {
        return self::create(strtoupper($this->text));
    }

    /**
     * Convierte el primer caracter de una cadena a mayusculas
     *
     * @return \PlanB\Type\Text\Text
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
     * @return \PlanB\Type\Text\Text
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
     * @return \PlanB\Type\Text\Text
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

    /**
     * Añade padding a la cadena
     *
     * @param int    $lenght
     * @param string $char
     * @param int    $mode
     *
     * @return \PlanB\Type\Text\Text
     */
    public function padding(int $lenght, string $char = self::BLANK_TEXT, int $mode = STR_PAD_RIGHT): Text
    {
        return new static(str_pad($this->text, $lenght, $char, $mode));
    }


    /**
     * Elimina html tags
     *
     * @param string|null $allowableTags
     *
     * @return \PlanB\Type\Text\Text
     */
    public function stripTags(?string $allowableTags = null): Text
    {
        return new static(strip_tags($this->text, $allowableTags));
    }
}
