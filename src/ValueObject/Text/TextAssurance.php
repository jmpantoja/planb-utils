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

use PlanB\Utils\Assurance\Assurance;
use PlanB\ValueObject\Stringifable;

/**
 * Comprueba que una cadena de texto cumpla con  una serie de condiciones
 */
class TextAssurance extends Assurance implements Stringifable
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
    public static function create(string $string): self
    {
        $text = Text::create($string);

        return new self($text);
    }

    /**
     * Devuelve el objeto sujeto a evaluación
     *
     * @return mixed
     */
    protected function getEvaluatedObject(): object
    {
        return $this->text;
    }


    /**
     * @inheritDoc
     */
    public function stringify(?string $format = null): string
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
}
