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

namespace PlanB\DS\Vector;

use PlanB\DS\AbstractBuilder;
use PlanB\DS\Resolver\Resolver;

/**
 * Builder para Vector
 */
class VectorBuilder extends AbstractBuilder
{

    /**
     * Named constructor.
     *
     * @return \PlanB\DS\Vector\VectorBuilder
     */
    public static function make(): VectorBuilder
    {
        return new static(Resolver::make());
    }

    /**
     * Named constructor.
     *
     * @param string $type
     *
     * @return \PlanB\DS\Vector\VectorBuilder
     */
    public static function typed(string $type): VectorBuilder
    {
        return new static(Resolver::make($type));
    }

    /**
     * @inheritdoc
     *
     * @return \PlanB\DS\Vector\Vector
     */
    public function build(): Vector
    {
        return Vector::make(
            $this->getInput(),
            $this->getResolver()
        );
    }
}
