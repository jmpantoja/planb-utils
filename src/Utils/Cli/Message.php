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
     * Devuelve la longitud máxima
     *
     * @return int
     */
    public function getMaxLenght(): int
    {
        return $this->reduce(function (Paragraph $paragraph, $max) {
            $length = $paragraph->getMaxLenght();

            return max([$length, $max]);
        }, 0);
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
                return $paragraph->render();
            })
            ->concat(Text::LINE_BREAK)
            ->stringify();
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
     * Devuelve el propio mensaje
     *
     * @return $this
     */
    public function end()
    {
        return $this;
    }
}
