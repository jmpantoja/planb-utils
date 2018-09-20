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

        return Paragraph::create([$line]);
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
        return Paragraph::create($lines);
    }

    /**
     * Crea un mensaje a partir de un texto
     *
     * @param string $format
     * @param string ...$arguments
     *
     * @return \PlanB\Console\Message\Paragraph
     */
    public static function line(string $format, string ...$arguments): Paragraph
    {
        $lines = Text::format($format, ...$arguments)
            ->explode(Text::LINE_BREAK);

        return Paragraph::create($lines);
    }
}
