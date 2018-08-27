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


use PlanB\Console\Message\Style\Style;

/**
 * Una linea de texto, con su estilo asociado
 */
class LineWithStyle
{
    /**
     * @var Style
     */
    public $style;

    /**
     * @var Line
     */
    private $line;

    /**
     * @var Renderer
     */
    private $renderer;

    /**
     * LineWithStyle named constructor.
     *
     * @param Line $line
     * @param Style $style
     * @return LineWithStyle
     */
    public static function create(Line $line, Style $style)
    {
        return new static($line, $style);

    }

    /**
     * LineWithStyle constructor.
     *
     * @param Line $line
     * @param Style $style
     */
    protected function __construct(Line $line, Style $style)
    {
        $this->line = $line;
        $this->style = $style;
        $this->renderer = Renderer::create();
    }

    public function apply(Style $style)
    {
        $this->style = $this->style->merge($style);
        return $this;
    }

    /**
     * Devuelve el texto con el estilo aplicado
     *
     * @param Style $style
     * @return \PlanB\Type\Text\Text
     */
    public function render(Style $style)
    {
        $style = $this->style->merge($style);
        return $this->renderer->render($this->line, $style);
    }

    public function getLength(): int
    {
        return $this->line->getLength() + $this->style->getSpacingLenght();
    }
}
