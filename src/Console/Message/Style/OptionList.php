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

use PlanB\DS\Resolver\Resolver;
use PlanB\DS\Set\AbstractSet;
use PlanB\Type\DataType\Type;
use PlanB\Type\Text\Text;
use PlanB\Type\Text\TextVector;

/**
 * Lista de opciones
 */
class OptionList extends AbstractSet
{
    /**
     * Named constructor.
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\Collection
     */
    public static function make(iterable $input = []): OptionList
    {
        return new static($input);
    }

    /**
     * @inheritdoc
     */
    public function configure(Resolver $resolver): void
    {
        $resolver
            ->type(Type::STRING)
            ->converter(function ($value) {
                return Option::get($value);
            }, Type::STRING)
            ->converter(function (Option $option) {
                return $option->getValue();
            }, Option::class);
    }

    /**
     * Añade las opciones contenidas en una cadena de texto
     * ignorando las que no sean correctas
     *
     * @param string $options
     *
     * @return \PlanB\Console\Message\Style\OptionList
     */
    public function addFromString(string $options): self
    {
        $this->clear();

        $pieces = explode(',', $options);
        foreach ($pieces as $optionName) {
            $this->addIfIsValid($optionName);
        }

        return $this;
    }

    /**
     * Añade una nueva option solo si es valida
     *
     * @param string $option
     *
     * @return \PlanB\Console\Message\Style\OptionList
     */
    private function addIfIsValid(string $option): self
    {
        if (Option::has($option)) {
            $this->add($option);
        }

        return $this;
    }

    /**
     * Convierte la lista al formato de atributo
     *
     * @param string $key
     *
     * @return string
     */
    public function toAttributeFormat(string $key): Text
    {
        if ($this->isEmpty()) {
            return Text::make();
        }

        return Text::format('%s=%s', $key, $this->concat(','));
    }


    /**
     * Devuelve el resultado de mezclar este objeto con otro
     *
     * @param \PlanB\Console\Message\Style\OptionList $optionList
     *
     * @return \PlanB\Console\Message\Style\OptionList
     */
    public function blend(OptionList $optionList): self
    {
        $instance = $optionList->copy();
        $instance->addAll($this);

        return $instance;
    }

    /**
     * Concatena los textos
     *
     * @param string $delimiter
     *
     * @return \PlanB\Type\Text\Text
     */
    public function concat(string $delimiter = Text::BLANK_TEXT): Text
    {
        return TextVector::make($this)->concat($delimiter);
    }
}
