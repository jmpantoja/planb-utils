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

namespace PlanB\DS\TypedList;

use PlanB\DS\ItemList\AbstractList;
use PlanB\DS\TypedList\Resolver\TypeValidator;

/**
 * Lista de elementos del mismo tipo
 */
abstract class AbstractTypedList extends AbstractList implements TypedListInterface
{

    /**
     * TypedList constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $validator = TypeValidator::create($this->getInnerType());
        $this->addValidator($validator, PHP_INT_MAX);
    }
}
