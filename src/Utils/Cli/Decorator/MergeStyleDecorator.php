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

namespace PlanB\Utils\Cli\Decorator;

use PlanB\Utils\Cli\Line;
use PlanB\Utils\Cli\Style\Spacing;
use PlanB\Utils\Cli\Style\Style;
use PlanB\Type\Text\Text;

/**
 * Mezcla los estilos de posibles etiquetas del texto, con el estilo global
 */
class MergeStyleDecorator extends StyleDecorator
{
    private const TAG_PATTERN = '/<(.*)>(.*)<\/>/U';

    /**
     * @inheritdoc
     */
    public function decorate(Line $line, Style $style, Spacing $spacing): Line
    {
        return $line->replace(self::TAG_PATTERN, function (string $attributes, string $content) use ($style): Text {

            $style = $style->applyAttributeString($attributes);
            $text = Line::create($content);

            return $this->wrap($text, $style);
        });
    }
}
