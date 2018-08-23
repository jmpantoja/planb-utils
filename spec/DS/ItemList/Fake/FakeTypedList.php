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

namespace spec\PlanB\DS\ItemList\Fake;

use PlanB\DS\ItemList\ItemList;
use PlanB\DS\ItemList\TypedList;
use PlanB\Type\Text\Text;


/**
 * Esta lista solo admite cadenas de texto menores o iguales a 10 caracteres,
 *
 * Puede normalizar una cadena de texto, añadiendo espacios en blanco a la izquierda hasta completar los 10 caracteres
 * La clave  es la longitud de la cadena
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class FakeTypedList extends TypedList
{

    /**
     * @inheritDoc
     */
    protected function customize(): void
    {
        $toText = function (string $value) {
            return Text::create($value);
        };

        $noBlank = function (Text $value) {
            return !$value->isBlank();
        };

        $this
            ->addNormalizer($toText)
            ->addValidator($noBlank);

    }

    /**
     * Devuelve el tipo de la lista
     *
     * @return string
     */
    public function getInnerType(): string
    {

    }
}
