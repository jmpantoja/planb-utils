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

namespace PlanB\Console\Message;

use PlanB\Console\Message\Style\Attributes;
use PlanB\Console\Message\Style\Style;
use PlanB\Type\Text\Text;

/**
 * Linea de texto que forma parte de  un mensaje
 */
class Line extends Text
{
    /**
     * Line named constructor.
     *
     * @return \PlanB\Console\Message\Line
     */
    public static function blank(): self
    {
        return new static(Text::EMPTY_TEXT);
    }

    /**
     * Line constructor.
     *
     * @param string $text
     */
    public function __construct(string $text)
    {
        parent::__construct(trim($text, "\n"));
    }

    /**
     * Devuelve la longitud del texto, ignorando las etiquetas
     *
     * @return int
     */
    public function getContentLength(): int
    {
        return $this->stripTags()->getLength();
    }

    /**
     * Devuelve la longitud de las etiquetas, ignorando el texto regular
     *
     * @return int
     */
    public function getTagsLength(): int
    {
        return $this->getLength() - $this->getContentLength();
    }

    /**
     * Aplica un estilo a esta linea, mezclando el estilo dado, con el que puede aparecer en tags ya existentes
     *
     * @param \PlanB\Console\Message\Style\Style $style
     *
     * @return \PlanB\Console\Message\Line
     */
    public function apply(Style $style): self
    {

        $apply = $style->getAttributes();

        return $this->replace('#<(.*)>(.*)</>#U', function ($tags, $content) use ($apply) {
            $tags = Attributes::fromString($tags)
                ->merge($apply)
                ->stringify();

            return sprintf('<%s>%s</>', $tags, $content);
        });
    }
}
