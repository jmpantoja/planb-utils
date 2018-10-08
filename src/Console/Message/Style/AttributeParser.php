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

namespace PlanB\Console\Message\Style;

/**
 * Extrae las propiedades de un objeto Attribute de una cadena de texto
 */
class AttributeParser
{
    /**
     * @var \PlanB\Console\Message\Style\Color
     */
    private $bgColor;

    /**
     * @var \PlanB\Console\Message\Style\Color
     */
    private $fgColor;

    /**
     * @var \PlanB\Console\Message\Style\OptionList
     */
    private $options;

    private const FOREGROUND_COLOR_KEY = 'fg';

    private const BACKGROUND_COLOR_KEY = 'bg';

    private const OPTIONS_KEY = 'options';


    /**
     * AttributeParser named constructor.
     *
     * @param string $content
     *
     * @return \PlanB\Console\Message\Style\AttributeParser
     */
    public static function make(string $content): AttributeParser
    {
        return new static($content);
    }

    /**
     * AttributeParser constructor.
     *
     * @param string $content
     */
    protected function __construct(string $content)
    {

        $this->bgColor = Color::DEFAULT();
        $this->fgColor = Color::DEFAULT();
        $this->options = OptionList::make();

        $pieces = explode(';', $content);

        foreach ($pieces as $piece) {
            $this->analize($piece);
        }
    }

    /**
     * Analiza un trozo de texto y lo parsea si corresponde a un attributo
     *
     * @param string $piece
     */
    private function analize(string $piece): void
    {
        $matches = [];
        if (!preg_match('/(fg|bg|options)=(.*)/', $piece, $matches)) {
            return;
        }

        $key = $matches[1];
        $value = $matches[2];

        $this->parseForegroundColor($key, $value);
        $this->parseBackgroundColor($key, $value);
        $this->parseOptions($key, $value);
    }


    /**
     * Parsea la propiedad foreground color
     *
     * @param string $key
     * @param string $colorName
     *
     * @return \PlanB\Console\Message\Style\AttributeParser
     */
    private function parseForegroundColor(string $key, string $colorName): self
    {
        if (self::FOREGROUND_COLOR_KEY !== $key) {
            return $this;
        }

        $this->fgColor = $this->buildColor($colorName);

        return $this;
    }


    /**
     * Parsea la propiedad background color
     *
     * @param string $key
     * @param string $colorName
     *
     * @return \PlanB\Console\Message\Style\AttributeParser
     */
    private function parseBackgroundColor(string $key, string $colorName): self
    {
        if (self::BACKGROUND_COLOR_KEY !== $key) {
            return $this;
        }

        $this->bgColor = $this->buildColor($colorName);

        return $this;
    }


    /**
     * Parsea la propiedad options
     *
     * @param string $key
     * @param string $options
     *
     * @return \PlanB\Console\Message\Style\AttributeParser
     */
    private function parseOptions(string $key, string $options): self
    {
        if (self::OPTIONS_KEY !== $key) {
            return $this;
        }

        $this->options->addFromString($options);

        return $this;
    }


    /**
     * Devuelve el color representado por $colorName o Default si no es valid
     *
     * @param string $colorName
     *
     * @return \PlanB\Console\Message\Style\Color
     */
    private function buildColor(string $colorName): Color
    {
        return Color::has($colorName) ? Color::get($colorName) : Color::DEFAULT();
    }

    /**
     * Devuelve el color de fondo
     *
     * @return \PlanB\Console\Message\Style\Color
     */
    public function getBackgroundColor(): Color
    {
        return $this->bgColor;
    }

    /**
     * * Devuelve el color del texto
     *
     * @return \PlanB\Console\Message\Style\Color
     */
    public function getForegroundColor(): Color
    {
        return $this->fgColor;
    }

    /**
     * Devuelve la lista de opciones
     *
     * @return \PlanB\Console\Message\Style\OptionList
     */
    public function getOptions(): OptionList
    {
        return $this->options;
    }
}
