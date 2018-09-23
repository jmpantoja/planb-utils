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

namespace PlanB\DS\Set;

use PlanB\DS\AbstractBuilder;

/**
 * Builder para Set
 */
class SetBuilder extends AbstractBuilder
{
    /**
     * Crea el objeto
     *
     * @return mixed
     */
    public function build()
    {
        return Set::make(
            $this->getInput(),
            $this->getResolver()
        );
    }
}
