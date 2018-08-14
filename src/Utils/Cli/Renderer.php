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

namespace PlanB\Utils\Cli;

use PlanB\ValueObject\Text\Text;

/**
 * Utilidad para aplicar formato a un texo
 */
class Renderer
{
    private const TAG_PATTERN = '/<(.*)>(.*)<\/>/U';
    public const TAB = '  ';


    /**
     * @var \PlanB\Utils\Cli\Align
     */
    private $align;

    /**
     * @var int
     */
    private $leftPadding = 0;

    /**
     * @var int
     */
    private $rightPadding = 0;

    /**
     * @var int
     */
    private $width = 0;

    /**
     * Renderer constructor.
     */
    protected function __construct()
    {
        $this->align = Align::LEFT();
    }

    /**
     * Renderer Named Constructor.
     *
     * @return \PlanB\Utils\Cli\Renderer
     */
    public static function create(): Renderer
    {
        return new static();
    }

    /**
     * Asigna
     *
     * @param int $left
     * @param int $right
     *
     * @return $this
     */
    public function padding(int $left, ?int $right = null)
    {
        if (is_null($right)) {
            $right = $left;
        }

        $this->leftPadding = $left;
        $this->rightPadding = $right;

        return $this;
    }

    /**
     * Asigna una alineación para el texto
     *
     * @param \PlanB\Utils\Cli\Align $align
     *
     * @return \PlanB\Utils\Cli\Paragraph
     */
    public function align(Align $align): self
    {
        $this->align = $align;

        return $this;
    }

    /**
     * Asigna el ancho requerido
     * (longitud máxima de las lineas del mensaje/parrafo)
     *
     * @param int $width
     *
     * @return \PlanB\Utils\Cli\Renderer
     */
    public function expandTo(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Devuelve un texto con un estilo aplicado
     *
     * @param \PlanB\ValueObject\Text\Text $text
     * @param \PlanB\Utils\Cli\Style       $style
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    public function render(Text $text, Style $style): Text
    {
        $text = $this->applyOverwriteStyle($text, $style);
        $text = $this->applyExpand($text);
        $text = $style->wrap($text);

        return $this->applyPadding($text);
    }

    /**
     * Mezcla los estilos de posibles etiquetas del texto, con el estilo global
     *
     * @param \PlanB\ValueObject\Text\Text $text
     * @param \PlanB\Utils\Cli\Style       $style
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    private function applyOverwriteStyle(Text $text, Style $style): Text
    {
        return $text->replace(self::TAG_PATTERN, function (string $attributes, string $content) use ($style): Text {
            return $style->applyAttributeString($attributes)
                ->wrap(Text::create($content));
        });
    }

    /**
     * Aplica el padding
     *
     * @param \PlanB\ValueObject\Text\Text $text
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    private function applyPadding(Text $text): Text
    {
        $left = str_repeat(self::TAB, $this->leftPadding);
        $right = str_repeat(self::TAB, $this->rightPadding);

        return Text::format('%s%s%s', $left, $text, $right);
    }

    /**
     * Expande el texto
     *
     * @param \PlanB\ValueObject\Text\Text $text
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    private function applyExpand(Text $text): Text
    {
        $extra = $text->getLength() - strlen(strip_tags($text->stringify()));

        return $text->padding($this->width + $extra, Text::BLANK_TEXT, $this->align->getValue());
    }
}
