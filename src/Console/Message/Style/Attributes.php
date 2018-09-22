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

use PlanB\Type\Stringifable;
use PlanB\Type\Text\Text;
use PlanB\Type\Text\TextListBuilder;
use PlanB\Utils\Traits\Stringify;

/**
 * Representa a los atributos de un tag
 */
class Attributes implements Stringifable
{
    use Stringify;

    /**
     * @var \PlanB\Console\Message\Style\Color
     */
    private $fgColor;

    /**
     * @var \PlanB\Console\Message\Style\Color
     */
    private $bgColor;

    /**
     * @var \PlanB\Console\Message\Style\OptionList
     */
    private $options;


    /**
     * Attributes named constructor.
     *
     * @return \PlanB\Console\Message\Style\Attributes
     */
    public static function create(): Attributes
    {
        $fgColor = Color::DEFAULT();
        $bgColor = Color::DEFAULT();
        $options = OptionList::make();

        return new static($fgColor, $bgColor, $options);
    }

    /**
     * Attributes named constructor.
     *
     * @param string $content
     *
     * @return \PlanB\Console\Message\Style\Attributes
     */
    public static function fromString(string $content): \PlanB\Console\Message\Style\Attributes
    {
        $parser = AttributeParser::create($content);

        $fgColor = $parser->getForegroundColor();
        $bgColor = $parser->getBackgroundColor();
        $options = $parser->getOptions();

        return new static($fgColor, $bgColor, $options);
    }


    /**
     * Attributes constructor.
     *
     * @param \PlanB\Console\Message\Style\Color      $fgColor
     * @param \PlanB\Console\Message\Style\Color      $bgColor
     * @param \PlanB\Console\Message\Style\OptionList $options
     */
    protected function __construct(Color $fgColor, Color $bgColor, OptionList $options)
    {
        $this->fgColor = $fgColor;
        $this->bgColor = $bgColor;
        $this->options = $options;
    }

    /**
     * Devuelve el resultado de mezclar este objeto con otro
     *
     * @param \PlanB\Console\Message\Style\Attributes $attributes
     *
     * @return \PlanB\Console\Message\Style\Attributes
     */
    public function blend(Attributes $attributes): Attributes
    {
        $fgColor = $this->fgColor->blend($attributes->getForegroundColor());
        $bgColor = $this->bgColor->blend($attributes->getBackgroundColor());
        $options = $this->options->blend($attributes->getOptions());

        return new static($fgColor, $bgColor, $options);
    }

    /**
     * Asigna el color del texto
     *
     * @param \PlanB\Console\Message\Style\Color $color
     *
     * @return \PlanB\Console\Message\Style\Attributes
     */
    public function setForegroundColor(Color $color): Attributes
    {
        $this->fgColor = $color;

        return $this;
    }


    /**
     * Devuelve el color del texto
     *
     * @return \PlanB\Console\Message\Style\Color
     */
    public function getForegroundColor(): Color
    {
        return $this->fgColor;
    }

    /**
     * Asigna el color de fondo
     *
     * @param \PlanB\Console\Message\Style\Color $color
     *
     * @return \PlanB\Console\Message\Style\Attributes
     */
    public function setBackgroundColor(Color $color): Attributes
    {
        $this->bgColor = $color;

        return $this;
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
     * Devuelve la lista de opciones
     *
     * @return \PlanB\Console\Message\Style\OptionList
     */
    public function getOptions(): OptionList
    {
        return $this->options;
    }

    /**
     * Añade una opcion (bold|blink|reverse|underscore)
     *
     * @param mixed $option
     *
     * @return \PlanB\Console\Message\Style\Attributes
     */
    public function addOption($option): Attributes
    {
        $this->options->add($option);

        return $this;
    }

    /**
     * Indica si hay algún atributo distinto a los dados por defecto
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->bgColor->is(Color::DEFAULT())
            and $this->fgColor->is(Color::DEFAULT())
            and $this->options->isEmpty();
    }


    /**
     * __toString alias
     *
     * @return string
     */
    public function stringify(): string
    {
        if ($this->isEmpty()) {
            return Text::EMPTY_TEXT;
        }

        $pieces = TextListBuilder::make()
            ->ignoreBlank()
            ->values([
                $this->fgColor->toAttributeFormat('fg'),
                $this->bgColor->toAttributeFormat('bg'),
                $this->options->toAttributeFormat('options'),
            ])
            ->vector();

        return $pieces->concat(';')->stringify();
    }
}
