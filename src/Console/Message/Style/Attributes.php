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
use PlanB\Type\Text\TextList;
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
     * @var \PlanB\DS\TypedList\TypedList
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
        $options = OptionList::create();

        return new static($fgColor, $bgColor, $options);
    }

    /**
     * Attributes named constructor.
     *
     * @return \PlanB\Console\Message\Style\Attributes
     */
    public static function fromString(string $content)
    {
        $parser = AttributeParser::create($content);

        $fgColor = $parser->getForegroundColor();
        $bgColor = $parser->getBackgroundColor();
        $options = $parser->getOptions();

        return new static($fgColor, $bgColor, $options);
    }


    /**
     * Attributes constructor.
     */
    protected function __construct(Color $fgColor, Color $bgColor, OptionList $options)
    {
        $this->fgColor = $fgColor;
        $this->bgColor = $bgColor;
        $this->options = $options;
    }


    public function merge(Attributes $attributes)
    {
        $fgColor = $this->fgColor->merge($attributes->getForegroundColor());
        $bgColor = $this->bgColor->merge($attributes->getBackgroundColor());
        $options = $this->options->merge($attributes->getOptions());

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
     * @return \PlanB\DS\TypedList\TypedList
     */
    public function getOptions(): TextList
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

        $pieces = TextList::create()
            ->silentExceptions()
            ->disallowBlank()
            ->setAll([
                $this->fgColor->toAttributeFormat('fg'),
                $this->bgColor->toAttributeFormat('bg'),
                $this->options->toAttributeFormat('options'),
            ]);

        return $pieces->concat(';')->stringify();
    }
}
