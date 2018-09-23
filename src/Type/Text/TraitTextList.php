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

namespace PlanB\Type\Text;

use PlanB\DS\Collection;
use PlanB\DS\Resolver\Resolver;
use PlanB\Type\DataType\Type;

/**
 * Métodos relacionados con colecciones de objetos Text
 */
trait TraitTextList
{

    /**
     * @inheritdoc
     */
    public function configure(Resolver $resolver): Collection
    {
        $resolver
            ->setType(Text::class)
            ->addConverter(Type::SCALAR, function ($value) {
                return Text::make($value);
            });

        return $this;
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
        $imploded = implode($delimiter, $this->toArray());

        return Text::make($imploded);
    }

    /**
     * Convierte la lista en un array de strings
     *
     * @return string[]
     */
    public function toArrayOfStrings(): array
    {
        $items = [];

        foreach ($this as $text) {
            $items[] = $text->stringify();
        }

        return $items;
    }
}
