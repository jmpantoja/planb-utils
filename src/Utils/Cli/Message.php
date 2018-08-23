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

namespace PlanB\Utils\Cli;

use PlanB\DS\TypedList\AbstractTypedList;
use PlanB\ValueObject\Stringifable;
use PlanB\ValueObject\Text\Text;

/**
 * Un mensaje de texto, formateado para mostrarlo por consola
 */
class Message extends AbstractTypedList implements Stringifable
{

    /**
     * Devuelve el tipo de la lista
     *
     * @return null|string
     */
    public function getInnerType(): string
    {
        return Paragraph::class;
    }

    /**
     * Configura el comportamiento de  la lista
     *
     * @return void
     */
    protected function customize(): void
    {
        $this->addNormalizer(function (Paragraph $paragraph) {
            return $paragraph->parent($this);
        });
    }


    /**
     * Message Named Constructor
     *
     * @return \PlanB\Utils\Cli\Message
     */
    public static function create(): Message
    {
        return new static();
    }


    /**
     * Añade una linea en blanco
     *
     * @return \PlanB\Utils\Cli\Paragraph
     */
    public function blank(): Message
    {
        $paragraph = Paragraph::create(Text::EMPTY_TEXT);
        $this->add($paragraph);

        return $this;
    }

    /**
     * Añade un párrafo
     *
     * @param string $format
     * @param mixed  ...$arguments
     *
     * @return \PlanB\Utils\Cli\Paragraph
     */
    public function block(string $format, ...$arguments): Paragraph
    {

        $paragraph = Paragraph::create($format, ...$arguments);
        $this->add($paragraph);

        return $paragraph;
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
     * __toString alias
     *
     * @param string $format
     *
     * @return string
     */
    public function stringify(?string $format = null): string
    {

        if ($this->isEmpty()) {
            return Text::EMPTY_TEXT;
        }

        return $this
            ->map(function (Paragraph $paragraph) {
                return $this->render($paragraph);
            })
            ->concat(Text::LINE_BREAK)
            ->stringify();
    }


    /**
     * Devuelve un Texto con el párrafo renderizado
     *
     * @param \PlanB\Utils\Cli\Paragraph $paragraph
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    private function render(Paragraph $paragraph): Text
    {
        $width = $this->getMaxLenght();
        $paragraph->expandTo($width);

        return $paragraph->render();
    }

    /**
     * Devuelve la longitud máxima
     *
     * @return int
     */
    private function getMaxLenght(): int
    {

        return (int) $this->max(function (Paragraph $paragraph) {
            return $paragraph->getMaxLength();
        });
    }

    /**
     * Devuelve el propio mensaje
     *
     * @return $this
     */
    public function end()
    {
        return $this;
    }
}
