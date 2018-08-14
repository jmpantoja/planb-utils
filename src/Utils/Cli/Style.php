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

use PlanB\ValueObject\Text\Text;

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
     * Style constructor.
     */
    protected function __construct()
    {
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
     * Aplica los atributos contenidos en una cadena de texto
     *
     * @param string $attributes
     *
     * @return \PlanB\Utils\Cli\Style
     */
    public function applyAttributeString(string $attributes): Style
    {

        return StyleMerger::create($this)
            ->parse($attributes);
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
     * Indica si se ha establecido algun estilo
     *
     * @return bool
     */
    private function isEmpty(): bool
    {
        return 0 === count($this->attributes);
    }

    /**
     * Envuelve un texto con la etiqueta derivada de este estilo
     *
     * @param \PlanB\ValueObject\Text\Text $text
     *
     * @return \PlanB\ValueObject\Text\Text
     */
    public function wrap(Text $text): Text
    {
        if ($this->isEmpty()) {
            return $text;
        }

        $attributes = $this->parse();

        $tag = sprintf('<%s>%s</>', $attributes, $text->stringify());

        return Text::create($tag);
    }

    /**
     * Calcula los atributos de la etiqueta
     *
     * @return string
     */
    private function parse(): string
    {

        ksort($this->attributes);
        $attributes = [];
        foreach ($this->attributes as $name => $value) {
            $attributes[] = $this->parseAttribute($name, $value);
        }

        return implode(';', $attributes);
    }

    /**
     * Calcula un attribut de la etiqueta
     *
     * @param string          $name
     * @param string|string[] $value
     *
     * @return string
     */
    private function parseAttribute(string $name, $value): string
    {
        if (is_array($value)) {
            $value = implode(',', $value);
        }

        return sprintf('%s=%s', $name, $value);
    }
}
