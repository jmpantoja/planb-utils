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

namespace PlanB\ValueObject\Text;

use PlanB\ValueObject\Stringifable;
use PlanB\ValueObject\Text\Exception\InvalidTextException;

/**
 * Comprueba que una cadena de texto cumpla con  una serie de condiciones
 */
class TextAssurance implements Stringifable
{
    /**
     * @var \PlanB\ValueObject\Text\Text
     */
    private $text;

    /**
     * PathAssurance constructor.
     *
     * @param \PlanB\ValueObject\Text\Text $text
     */
    public function __construct(Text $text)
    {
        $this->text = $text;
    }


    /**
     * Crea una nueva instancia a partir de un objeto Stringifable
     *
     * @param \PlanB\ValueObject\Stringifable $object
     *
     * @return \PlanB\ValueObject\Text\TextAssurance
     */
    public static function fromStringifable(Stringifable $object): self
    {
        if ($object instanceof Text) {
            return self::fromText($object);
        }

        $text = Text::create($object->stringify());

        return new self($text);
    }

    /**
     * Crea una nueva instancia a partir de un objeto Text
     *
     * @param \PlanB\ValueObject\Text\Text $text
     *
     * @return \PlanB\ValueObject\Text\TextAssurance
     */
    public static function fromText(Text $text): self
    {
        return new self($text);
    }

    /**
     * Crea una nueva instancia a partir de una cadena de texto
     *
     * @param string $string
     *
     * @return \PlanB\ValueObject\Text\TextAssurance
     */
    public static function fromString(string $string): self
    {
        $text = Text::create($string);

        return new self($text);
    }

    /**
     * Devuelve la ruta
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    public function end(): Text
    {
        return $this->text;
    }

    /**
     * @inheritDoc
     */
    public function stringify(): string
    {
        return $this->end()->stringify();
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->stringify();
    }

    /**
     * Garantiza que una cadena no esté vacia
     *
     * @return \PlanB\ValueObject\Text\TextAssurance
     */
    public function isNotEmpty(): self
    {
        if ($this->text->isEmpty()) {
            throw InvalidTextException::isEmpty();
        }

        return $this;
    }

    /**
     * Garantiza que una cadena no esté en blanco
     *
     * @return \PlanB\ValueObject\Text\TextAssurance
     */
    public function isNotBlank(): self
    {
        if ($this->text->isBlank()) {
            throw InvalidTextException::isBlank($this->text);
        }

        return $this;
    }
}
