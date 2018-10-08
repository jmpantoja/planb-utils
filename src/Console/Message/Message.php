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

namespace PlanB\Console\Message;

use PlanB\Type\Text\Text;

/**
 * Crea distintos tipos de párrafos, para ayudar a componer un mensaje
 */
class Message
{

    /**
     * Crea un mensaje con una linea en blanco
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public static function blank(): Paragraph
    {
        $line = Line::blank();

        return Paragraph::make([$line]);
    }


    /**
     * Crea un mensaje a partir de un conjunto de lineas
     *
     * @param mixed[] $lines
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public static function join(iterable $lines): Paragraph
    {
        return Paragraph::make($lines);
    }

    /**
     * Crea un mensaje a partir de un texto
     *
     * @param string $format
     * @param mixed  ...$arguments
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public static function line(string $format, ...$arguments): Paragraph
    {
        $lines = Text::format($format, ...$arguments)
            ->explode(Text::LINE_BREAK);

        return Paragraph::make($lines);
    }
}
