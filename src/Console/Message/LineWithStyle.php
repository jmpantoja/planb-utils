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
     * @var \PlanB\Console\Message\Style\Style
     */
    public $style;

    /**
     * @var \PlanB\Console\Message\Line
     */
    private $line;

    /**
     * @var \PlanB\Console\Message\Renderer
     */
    private $renderer;

    /**
     * LineWithStyle named constructor.
     *
     * @param \PlanB\Console\Message\Line        $line
     * @param \PlanB\Console\Message\Style\Style $style
     *
     * @return \PlanB\Console\Message\LineWithStyle
     */
    public static function create(Line $line, Style $style): LineWithStyle
    {
        return new static($line, $style);
    }

    /**
     * LineWithStyle constructor.
     *
     * @param \PlanB\Console\Message\Line        $line
     * @param \PlanB\Console\Message\Style\Style $style
     */
    protected function __construct(Line $line, Style $style)
    {
        $this->line = $line;
        $this->style = $style;
        $this->renderer = Renderer::create();
    }

    /**
     * Aplica un estilo
     *
     * @param \PlanB\Console\Message\Style\Style $style
     *
     * @return $this
     */
    public function apply(Style $style)
    {
        $this->style = $this->style->blend($style);

        return $this;
    }

    /**
     * Devuelve el texto con el estilo aplicado
     *
     * @param \PlanB\Console\Message\Style\Style $style
     *
     * @return \PlanB\Type\Text\Text
     */
    public function render(Style $style): \PlanB\Type\Text\Text
    {
        $style = $this->style->blend($style);

        return $this->renderer->render($this->line, $style);
    }

    /**
     * Develve la longitud total, incluyendo el margin y el padding
     *
     * @return int
     */
    public function getLength(): int
    {
        return $this->line->getLength() + $this->style->getSpacingLenght();
    }
}
