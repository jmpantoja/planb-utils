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

namespace PlanB\Console\Message\Decorator;

use PlanB\Console\Message\Line;
use PlanB\Console\Message\Style\Style;
use PlanB\Type\Text\Text;

/**
 * Alinea el texto respecto a un ancho de linea
 */
class AlignDecorator extends Decorator
{

    /**
     * @inheritdoc
     */
    public function render(Line $line, Style $style): Line
    {
        $width = $style->getWidth() + $line->getTagsLength();
        $char = Text::BLANK_TEXT;
        $align = $style->getAlign()->getAccurateValue();

        return $line->padding($width, $char, $align);
    }
}
