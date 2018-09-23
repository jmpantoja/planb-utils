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

namespace PlanB\Type\Text;

use PlanB\Type\Assurance\Assurance;
use PlanB\Type\Stringifable;
use PlanB\Utils\Traits\Stringify;

/**
 * Comprueba que una cadena de texto cumpla con  una serie de condiciones
 */
class TextAssurance extends Assurance implements Stringifable
{
    use Stringify;

    /**
     * @var \PlanB\Type\Text\Text
     */
    private $text;

    /**
     * PathAssurance constructor.
     *
     * @param \PlanB\Type\Text\Text $text
     */
    protected function __construct(Text $text)
    {
        $this->text = $text;
    }


    /**
     * Crea una nueva instancia a partir de un objeto Stringifable
     *
     * @param \PlanB\Type\Stringifable $object
     *
     * @return \PlanB\Type\Text\TextAssurance
     */
    public static function fromStringifable(Stringifable $object): self
    {
        if ($object instanceof Text) {
            return self::fromText($object);
        }

        $text = Text::make($object->stringify());

        return new static($text);
    }

    /**
     * Crea una nueva instancia a partir de un objeto Text
     *
     * @param \PlanB\Type\Text\Text $text
     *
     * @return \PlanB\Type\Text\TextAssurance
     */
    public static function fromText(Text $text): self
    {
        return new static($text);
    }


    /**
     * Crea una nueva instancia a partir de una cadena de texto
     *
     * @param string $string
     *
     * @return \PlanB\Type\Text\TextAssurance
     */
    public static function make(string $string): self
    {
        $text = Text::make($string);

        return new static($text);
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
    public function stringify(): string
    {
        return $this->end()->stringify();
    }
}
