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

use PlanB\DS\Queue\AbstractQueue;
use PlanB\DS\Resolver\Resolver;

/**
 * Queue de objetos Text
 */
class TextQueue extends AbstractQueue
{
    use TraitTextList;

    /**
     * @param mixed[]                           $input
     *
     * @param null|\PlanB\DS\Resolver\Resolver $resolver
     *
     * @return \PlanB\DS\Queue
     */
    public static function make(iterable $input = [], ?Resolver $resolver = null): TextQueue
    {
        return (new static($resolver))
            ->pushAll($input);
    }
}
