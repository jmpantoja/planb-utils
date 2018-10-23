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
 * Decora etiquetas html
 */
class HtmlTagDecorator implements DecoratorInterface
{
    /**
     * ConsoleParser named constructor
     *
     * @return \PlanB\Beautifier\Parser\Decorator\ConsoleParser
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
        $attributes = AttributeList::colon([
            'color' => $style->getFgColorName(),
            'background' => $style->getBgColorName(),
            'font-weight' => $this->extractFontWeight($style),
            'text-decoration' => $this->extractTextDecoration($style),
        ]);

        if ($attributes->isEmpty()) {
            return $value;
        }

        return sprintf('<span style="%s">%s</span>', $attributes, $value);
    }

    /**
     * Calcula el valor de font-weight a parti de un estilo
     *
     * @param \PlanB\Beautifier\Style\Style $style
     *
     * @return null|string
     */
    protected function extractFontWeight(Style $style): ?string
    {
        return $style->isBold() ? 'bold' : null;
    }

    /**
     * Calcula el valor de text-decoration a parti de un estilo
     *
     * @param \PlanB\Beautifier\Style\Style $style
     *
     * @return null|string
     */
    protected function extractTextDecoration(Style $style): ?string
    {
        return $style->isUnderscore() ? 'underline' : null;
    }
}
