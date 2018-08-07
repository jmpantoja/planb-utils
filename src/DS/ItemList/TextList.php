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

namespace PlanB\DS\ItemList;

use PlanB\ValueObject\Text\Text;

/**
 * Lista de elementos tipo Text
 */
class TextList extends AbstractList implements TypableList
{

    /**
     * TextList constructor.
     */
    public function __construct()
    {
        $normalizer = function ($value) {
            return Text::create($value);
        };

        parent::__construct();
        $this->addNormalizer($normalizer, -PHP_INT_MAX);
    }

    /**
     * Crea una instancia a partir de un conjunto de valores
     *
     * @param mixed[] $input
     *
     * @return \PlanB\DS\ItemList\TextList
     */
    public static function create(iterable $input = []): self
    {
        $list = new static();
        $list->setAll($input);

        return $list;
    }

    /**
     * Devuelve el tipo de la lista
     *
     * @return string
     */
    public function getInnerType(): string
    {
        return Text::class;
    }

    /**
     * Impide que se puedan añadir texto en blanco
     *
     * @return \PlanB\DS\ItemList\TextList
     */
    public function disallowBlank(): self
    {
        $this->addValidator(function (Text $text) {
            return !$text->isBlank();
        });

        return $this;
    }

    /**
     * Impide que se puedan añadir cadenas vacias
     *
     * @return \PlanB\DS\ItemList\TextList
     */
    public function disallowEmpty(): self
    {
        $this->addValidator(function (Text $text) {
            return !$text->isEmpty();
        });

        return $this;
    }
}
