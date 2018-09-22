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

use PlanB\DS1\Collection;
use PlanB\DS1\Resolver\Resolver;
use PlanB\DS1\Set;
use PlanB\Type\DataType\Type;
use PlanB\Type\Text\Text;
use PlanB\Type\Text\TextList;

/**
 * Lista de opciones
 */
class OptionList extends Set
{
    /**
     * @inheritdoc
     */
    public function configure(Resolver $resolver): Collection
    {
        $resolver
            ->setType(Type::STRING)
            ->addConverter(Type::STRING, function ($value) {
                return Option::get($value);
            })
            ->addConverter(Option::class, function (Option $option) {
                return $option->getValue();
            });

        return $this;
    }


    /**
     * Añade una nueva option solo si es valida
     *
     * @param string $option
     *
     * @return \PlanB\Console\Message\Style\OptionList
     */
    public function addIfIsValid(string $option): self
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
            return Text::create();
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
        return TextList::make($this)->concat($delimiter);
    }
}
