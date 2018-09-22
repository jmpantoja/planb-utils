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

use PlanB\DS1\AbstractBuilder;

/**
 * Builder para TextList
 */
class TextListBuilder extends AbstractBuilder
{

    /**
     * Crea el objeto
     *
     * @return \PlanB\Type\Text\TextList
     */
    public function build(): TextList
    {
        return TextList::make(
            $this->getInput(),
            $this->getResolver()
        );
    }
}
