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

use PlanB\Type\DataType\Type;
use PlanB\Type\Text\Text;
use PlanB\Type\Text\TextList;

/**
 * Lista de opciones
 */
class OptionList extends TextList
{
    /**
     * Configura el comportamiento de  la lista
     *
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     *
     * @return void
     */
    protected function customize(): void
    {
        $this
            ->addHydrator(Type::STRING, function ($value) {
                return Option::get($value);
            })
            ->addHydrator(Option::class, function (Option $option) {
                return Text::create($option->getValue());
            })
            ->addKeyNormalizer(function ($key, Text $text) {
                return $text->stringify();
            });
    }

    /**
     * Añade una nueva option solo si es valida
     *
     * @param string $option
     * @return OptionList
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

    public function merge(OptionList $optionList): self
    {
        $instance = clone $optionList;

        $this->each(function (Text $option) use ($instance) {
            $instance->add($option);
        });

        return $instance;
    }
}
