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

namespace PlanB\DS\Map;

use PlanB\DS\AbstractBuilder;
use PlanB\DS\Resolver\Resolver;

/**
 * Builder para Map
 */
class MapBuilder extends AbstractBuilder
{

    /**
     * Named constructor.
     *
     * @return \PlanB\DS\Map\MapBuilder
     */
    public static function make(): MapBuilder
    {
        return new static(Resolver::make());
    }

    /**
     * Named constructor.
     *
     * @param string $type
     *
     * @return \PlanB\DS\Map\MapBuilder
     */
    public static function typed(string $type): MapBuilder
    {
        return new static(Resolver::typed($type));
    }


    /**
     * Crea el objeto
     *
     * @return mixed
     */
    public function build(): Map
    {
        return new Map(
            $this->getInput(),
            $this->getResolver()
        );
    }
}
