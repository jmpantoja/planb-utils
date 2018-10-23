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

namespace PlanB\Beautifier\Parser\Decorator;

use PlanB\Beautifier\Parser\AttributeList;
use PlanB\Beautifier\Style\Style;

/**
 * Decora etiquetas console
 */
class ConsoleTagDecorator implements DecoratorInterface
{

    /**
     * ConsoleTagDecorator named constructor
     *
     * @return \PlanB\Beautifier\Parser\Decorator\ConsoleTagDecorator
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @inheritdoc
     */
    public function decorate(Style $style, string $value): string
    {
        $attributes = AttributeList::make([
            'fg' => $style->getFgColorName(),
            'bg' => $style->getBgColorName(),
            'options' => $this->getOptions($style),
        ]);

        if ($attributes->isEmpty()) {
            return $value;
        }

        return sprintf('<%s>%s</>', $attributes, $value);
    }

    /**
     * Devuelve un array con opciones, a partir de un estilo
     *
     * @param \PlanB\Beautifier\Style\Style $style
     *
     * @return string[]
     */
    protected function getOptions(Style $style): array
    {
        $options = [];

        $options[] = $style->isBold() ? 'bold' : null;
        $options[] = $style->isUnderscore() ? 'underscore' : null;

        return array_filter($options);
    }
}
