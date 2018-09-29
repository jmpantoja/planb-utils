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

use PlanB\DS\AbstractBuilder;
use PlanB\DS\Resolver\Resolver;
use PlanB\Type\DataType\Type;

/**
 * Builder para TextList
 */
class TextListBuilder extends AbstractBuilder
{


    /**
     * Named constructor.
     *
     * @return \PlanB\Type\Text\TextListBuilder
     */
    public static function make(): TextListBuilder
    {
        return new static(Resolver::make());
    }

    /**
     * Crea la colección de textos por defecto
     *
     * @return \PlanB\Type\Text\TextVector
     */
    public function build(): TextVector
    {
        return new TextVector(
            $this->getInput(),
            $this->getResolver()
        );
    }


    /**
     * Crea un TextVector
     *
     * @return \PlanB\Type\Text\TextVector
     */
    public function vector(): TextVector
    {
        return $this->build();
    }

    /**
     * Crea un deque
     *
     * @return \PlanB\Type\Text\TextDeque
     */
    public function deque(): TextDeque
    {
        return new TextDeque(
            $this->getInput(),
            $this->getResolver()
        );
    }

    /**
     * Crea un stack
     *
     * @return \PlanB\Type\Text\TextStack
     */
    public function stack(): TextStack
    {
        return new TextStack(
            $this->getInput(),
            $this->getResolver()
        );
    }

    /**
     * Crea un queue
     *
     * @return \PlanB\Type\Text\TextQueue
     */
    public function queue(): TextQueue
    {
        return new TextQueue(
            $this->getInput(),
            $this->getResolver()
        );
    }

    /**
     * Crea un prioriy queue
     *
     * @return \PlanB\Type\Text\TextPriorityQueue
     */
    public function priorityQueue(): TextPriorityQueue
    {
        return new TextPriorityQueue(
            $this->getInput(),
            $this->getResolver()
        );
    }

    /**
     * Crea un map
     *
     * @return \PlanB\Type\Text\TextMap
     */
    public function map(): TextMap
    {
        return new TextMap(
            $this->getInput(),
            $this->getResolver()
        );
    }

    /**
     * Crea un set
     *
     * @return \PlanB\Type\Text\TextSet
     */
    public function set(): TextSet
    {
        return new TextSet(
            $this->getInput(),
            $this->getResolver()
        );
    }

    /**
     * Añade un filtro que ignora los textos en blanco
     *
     * @return $this
     */
    public function ignoreBlank()
    {
        $this->filter(function ($value) {
            return !Text::make($value)->isBlank();
        }, Type::STRINGIFABLE);

        return $this;
    }


    /**
     * Añade un filtro que ignora los textos vacios
     *
     * @return $this
     */
    public function ignoreEmpty()
    {
        $this->filter(function ($value) {
            return !Text::make($value)->isEmpty();
        }, Type::STRINGIFABLE);

        return $this;
    }
}
