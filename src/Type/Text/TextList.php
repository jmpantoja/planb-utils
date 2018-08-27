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

use PlanB\DS\TypedList\AbstractTypedList;

/**
 * Lista de elementos tipo Text
 */
class TextList extends AbstractTypedList
{

    /**
     * TextList constructor.
     */
    protected function __construct()
    {
        $normalizer = function ($value) {
            return Text::create($value);
        };

        parent::__construct();
        $this->addNormalizer($normalizer, PHP_INT_MAX - 1);
    }

    /**
     * Crea una instancia a partir de un conjunto de valores
     *
     * @param mixed[] $input
     *
     * @return \PlanB\Type\Text\ListInterface
     */
    public static function create(iterable $input = []): TextList
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
     * @return \PlanB\Type\Text\TextList
     */
    public function disallowBlank(): self
    {
        $this->addValidator(function (Text $text) {
            return !$text->isBlank();
        }, PHP_INT_MAX);

        return $this;
    }

    /**
     * Impide que se puedan añadir cadenas vacias
     *
     * @return \PlanB\Type\Text\TextList
     */
    public function disallowEmpty(): self
    {
        $this->addValidator(function (Text $text) {
            return !$text->isEmpty();
        }, PHP_INT_MAX);

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
     * @param callable|null $callable
     * @param mixed         ...$userdata
     *
     * @return string[]
     */
    public function toArray(?callable $callable = null, ...$userdata): array
    {
        if (is_null($callable)) {
            $callable = function (Text $text) {
                return $text->stringify();
            };
        }

        return parent::toArray($callable, ...$userdata);
    }
}
