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

namespace PlanB\Type\Text;

use PlanB\DS1\Collection;
use PlanB\DS1\Resolver\Resolver;
use PlanB\DS1\Vector;
use PlanB\Type\DataType\Type;

/**
 * Lista de elementos tipo Text
 */
class TextList extends Vector
{

    /**
     * Crea una instancia a partir de un conjunto de valores
     *
     * @param mixed[] $input
     *
     * @return \PlanB\Type\Text\ListInterface
     */
    public static function create(iterable $input = []): TextList
    {
        return static::make($input);
    }

    /**
     * @inheritdoc
     */
    public function configure(Resolver $resolver): Collection
    {
        $resolver
            ->setType(Text::class)
            ->addConverter(Type::SCALAR, function ($value) {
                return Text::create($value);
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

        return Text::create($imploded);
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
