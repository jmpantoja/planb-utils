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

namespace PlanB\DS\ArrayList\Traits;

use PlanB\DS\ArrayList\ArrayList;
use PlanB\DS\ItemResolver\ItemResolver;
use PlanB\DS\KeyValue;

/**
 * Configuración del ItemResolver
 */
trait ConfigureResolver
{

    /**
     * @var \PlanB\DS\ItemResolver\ItemResolver
     */
    protected $itemResolver;

    /**
     * Devuelve el objeto ItemResolver, configurado para una pareja clave/valor
     *
     * Este resolver se construye bajo demanda, para poder ignorarlo en la serialización
     * y que se "autoconstruya" desde el nuevo objeto en la unserialización
     *
     * Si, como parece lógico de primeras, se instanciara en el constructor de la clase, no se puede recuperar desde unserialize
     * y o bien perderiamos esa información, o bien tenemos que serializar datos + resolver
     *
     * @param \PlanB\DS\KeyValue $first
     *
     * @return \PlanB\DS\ItemResolver\ItemResolver
     */
    protected function getResolverFor(KeyValue $first): ItemResolver
    {
        if (is_null($this->itemResolver)) {
            $resolver = $this->buildItemResolver($first);

            $resolver->configure($this);
            $this->configureResolver($resolver);
            $this->itemResolver = $resolver;
        }

        return $this->itemResolver;
    }

    /**
     * Personaliza el resolver de esta colección,
     *
     * @param \PlanB\DS\ItemResolver\ItemResolver $resolver
     *
     * @@SuppressWarnings(PMD.UnusedFormalParameter)
     *
     * @return $this
     */
    protected function configureResolver(ItemResolver $resolver): ArrayList
    {
        return $this;
    }

}
