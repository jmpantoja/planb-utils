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

namespace PlanB\Utils\Cli;

/**
 * Define el estilo de un objeto
 */
class Style
{
    public const TAB = '   ';

    /**
     * @var mixed[]
     */
    private $attributes = [];

    /**
     * @var int
     */
    private $width = 0;

    /**
     * Style constructor.
     */
    private const PADDING_CHARACTER = ' ';

    /**
     * @var \PlanB\Utils\Cli\Align
     */
    private $align;

    /**
     * @var string
     */
    private $leftTab = '';

    /**
     * @var string
     */
    private $rightTab = '';

    /**
     * Style constructor.
     */
    protected function __construct()
    {
        $this->align = Align::LEFT();
    }

    /**
     * Style Named Constructor
     *
     * @return \PlanB\Utils\Cli\Style
     */
    public static function create(): Style
    {
        return new static();
    }

    /**
     * Combina este estilo con otro
     *
     * @param \PlanB\Utils\Cli\Style $style
     *
     * @return \PlanB\Utils\Cli\Style
     */
    public function merge(Style $style): self
    {
        $this->attributes = array_replace(
            $style->attributes,
            $this->attributes
        );

        if ($style->width > $this->width) {
            $this->width = $style->width;
        }

        return $this;
    }

    /**
     * Devuelve el ancho de linea
     *
     * @param int $width
     *
     * @return \PlanB\Utils\Cli\Style
     */
    public function width(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Devuelve el ancho de linea
     *
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }


    /**
     * Asigna el color del texto
     *
     * @param \PlanB\Utils\Cli\Color $color
     *
     * @return \PlanB\Utils\Cli\Style
     */
    public function foreGroundColor(Color $color): Style
    {
        $this->attributes['fg'] = $color->getValue();

        return $this;
    }

    /**
     * Asigna el color del fondo
     *
     * @param \PlanB\Utils\Cli\Color $color
     *
     * @return \PlanB\Utils\Cli\Style
     */
    public function backGroundColor(Color $color): Style
    {
        $this->attributes['bg'] = $color->getValue();

        return $this;
    }


    /**
     * Asigna una opción al texto
     *
     * @param \PlanB\Utils\Cli\Option $option
     *
     * @return $this
     */
    public function option(Option $option): Style
    {
        $this->attributes['options'] = $this->attributes['options'] ?? [];
        $this->attributes['options'][$option->getValue()] = $option->getValue();

        return $this;
    }

    /**
     * Asigna una alineación
     *
     * @param \PlanB\Utils\Cli\Align $align
     *
     * @return \PlanB\Utils\Cli\Style
     */
    public function align(Align $align): Style
    {
        $this->align = $align;

        return $this;
    }

    /**
     * Asigna el número de tabulaciones a izquierda y derecha
     *
     * @param int $left
     * @param int $right
     *
     * @return \PlanB\Utils\Cli\Style
     */
    public function tab(int $left, int $right = 0): self
    {
        $this->leftTab = str_repeat(self::TAB, $left);
        $this->rightTab = str_repeat(self::TAB, $right);

        return $this;
    }

    /**
     * Envuelve el texto con el tag de estilo
     *
     * @param string $line
     *
     * @return string
     */
    public function decorate(Line $line): string
    {
        $text = $this->ajustSpacing($line);

        return $this->addStyle($text);
    }

    /**
     * Ajusta el ancho de la linea, al ancho del estilo
     *
     * @param \PlanB\Utils\Cli\Line $line
     *
     * @return string
     */
    private function ajustSpacing(Line $line): string
    {
        $text = $line->getText();


        $width = $this->calculeAjustedWidth($line);

        if ($width > 0) {
            $align = $this->align->getValue();
            $text = str_pad($line->getText(), $width, self::PADDING_CHARACTER, $align);
        }

        $text = sprintf('%s%s%s', $this->leftTab, $text, $this->rightTab);

        return $text;
    }

    /**
     * Calcula el ancho de la linea, teniendo en cuenta las etiquetas
     *
     * @param \PlanB\Utils\Cli\Line $line
     *
     * @return int
     */
    private function calculeAjustedWidth(Line $line): int
    {

        $width = $this->getWidth() + $line->taggedTextLength();

        return $width;
    }

    /**
     * Añade las etiquetas con el estilo
     *
     * @param string $text
     *
     * @return string
     */
    private function addStyle(string $text): string
    {
        if ($this->isEmpty()) {
            return $text;
        }

        $attributes = $this->parseAttributes();

        return sprintf('<%s>%s</>', $attributes, $text);
    }


    /**
     * Indica si se ha establecido algun estilo
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return 0 === count($this->attributes);
    }


    /**
     * Parsea los attributos
     *
     * @return string
     */
    private function parseAttributes(): string
    {
        $pieces = [];

        $pieces[] = $this->parseAttr('fg');
        $pieces[] = $this->parseAttr('bg');
        $pieces[] = $this->parseAttr('options');

        $pieces = array_filter($pieces);

        return implode(';', $pieces);
    }

    /**
     * Parsea un attributo
     *
     * @param string $name
     *
     * @return null|string
     */
    private function parseAttr(string $name): ?string
    {
        if (!isset($this->attributes[$name])) {
            return null;
        }


        $value = $this->attributes[$name];

        if (is_array($value)) {
            $value = implode(',', $value);
        }

        return sprintf('%s=%s', $name, $value);
    }
}
