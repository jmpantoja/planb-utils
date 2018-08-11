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

namespace PlanB\Utils\Cli;

use PlanB\DS\ItemList\TypedList;

/**
 * Objetos Output, que a su vez pueden contener otros objetos Output
 */
abstract class OutputAggregate extends Output implements \Countable
{

    /**
     * OutputAggregate constructor.
     */
    protected function __construct()
    {
        $this->children = TypedList::ofType(Output::class)
            ->addNormalizer(function (Output $output) {
                return $output->parent($this);
            });
    }


    /**
     * __toString alias
     *
     * @param string $format
     *
     * @return string
     */
    public function stringify(?string $format = null): string
    {
        $pieces = $this->children->map(function (Output $output) {
            return $output->stringify();
        });

        return implode($this->getSeparator(), $pieces->toArray());
    }

    /**
     * Añade un elemento
     *
     * @param \PlanB\Utils\Cli\Output $output
     *
     * @return \PlanB\Utils\Cli\Output
     */
    protected function add(Output $output): Output
    {
        $this->children->add($output);

        return $output;
    }

    /**
     * Devuelve el número de elementos
     *
     * @return  int
     */
    public function count(): int
    {
        return $this->children->count();
    }

    /**
     * Devuelve el caracter separador
     *
     * @return string
     */
    abstract protected function getSeparator(): string;
}
