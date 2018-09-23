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

/**
 * Builder para Vector
 */
class VectorBuilder extends AbstractBuilder
{
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
