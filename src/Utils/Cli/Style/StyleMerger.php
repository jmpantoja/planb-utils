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

namespace PlanB\Utils\Cli\Style;

/**
 * Utildad que añade los atributos inferidos de una cadena de texto a un objeto Style
 */
class StyleMerger
{
    private const REGEX = '/(?<key>fg|bg|options)=(?<value>.*)/';

    private const FOREGROUND_METHOD = 'foreGroundColor';

    private const BACKGROUND_METHOD = 'backGroundColor';

    private const OPTIONS_METHOD = 'option';


    private const KEY_TO_METHOD = [
        'fg' => self::FOREGROUND_METHOD,
        'bg' => self::BACKGROUND_METHOD,
        'options' => self::OPTIONS_METHOD,
    ];

    /**
     * @var \PlanB\Utils\Cli\Style\Style
     */
    private $style;


    /**
     * StyleParser named constructor.
     *
     * @param \PlanB\Utils\Cli\Style\Style $style
     *
     * @return \PlanB\Utils\Cli\Style\StyleMerger
     */
    public static function create(Style $style): self
    {
        return new static($style);
    }

    /**
     * StyleParser constructor.
     *
     * @param \PlanB\Utils\Cli\Style\Style $style
     */
    protected function __construct(Style $style)
    {
        $this->style = clone $style;
    }

    /**
     * Devuelve el estilo creado
     *
     * @param string $attributes
     *
     * @return \PlanB\Utils\Cli\Style\Style
     */
    public function parse(string $attributes): Style
    {
        $this->parseAttributes($attributes);

        return $this->style;
    }


    /**
     * Aplica los atributos inferidos del texto al objeto Style
     *
     * @param string $attributes
     */
    protected function parseAttributes(string $attributes): void
    {
        $pieces = explode(";", $attributes);

        foreach ($pieces as $piece) {
            $this->parseAttribute($piece);
        }
    }

    /**
     * Crea un atributo, si procede
     *
     * @param string $piece
     */
    private function parseAttribute(string $piece): void
    {
        $matches = [];
        if (!preg_match(self::REGEX, $piece, $matches)) {
            return;
        }

        $method = $this->calculeSetterName($matches['key']);
        $value = $this->calculeValue($method, $matches['value']);

        $this->apply($method, $value);
    }

    /**
     * Devuelve el nombre del método que corresponde a una key
     *
     * @param string $key
     *
     * @return mixed
     */
    private function calculeSetterName(string $key)
    {
        return self::KEY_TO_METHOD[$key];
    }

    /**
     * Calcula el enum adecuado
     *
     * @param string $key
     * @param string $value
     *
     * @return mixed[]
     */
    private function calculeValue(string $key, string $value): array
    {
        if (self::OPTIONS_METHOD === $key) {
            return $this->calculeOptions($value);
        }


        $color = $this->calculeColor($value);

        return [$color];
    }

    /**
     * Devuelve un objeto Color, o null si no es posible
     *
     * @param string $value
     *
     * @return null|\PlanB\Utils\Cli\Color
     */
    private function calculeColor(string $value): ?Color
    {
        if (!Color::has($value)) {
            return null;
        }

        return Color::get($value);
    }


    /**
     * Devuelve un array con las opciones
     *
     * @param string $values
     *
     * @return \PlanB\Utils\Cli\Style\Option[]
     */
    private function calculeOptions(string $values): array
    {

        $options = [];

        foreach (explode(',', $values) as $value) {
            $options[] = $this->calculeOption($value);
        }

        return array_filter($options);
    }

    /**
     * Devuelve un objeto Option, o null si no es posible
     *
     * @param string $value
     *
     * @return null|\PlanB\Utils\Cli\Style\Option
     */
    private function calculeOption(string $value): ?Option
    {
        if (!Option::has($value)) {
            return null;
        }

        return Option::get($value);
    }

    /**
     * Llama al setter del objeto Style
     *
     * @param string $method
     * @param mixed  $values
     */
    private function apply(string $method, $values): void
    {
        $values = array_filter($values);

        foreach ($values as $value) {
            call_user_func([$this->style, $method], $value);
        }
    }
}
