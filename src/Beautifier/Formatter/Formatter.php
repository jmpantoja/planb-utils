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

namespace PlanB\Beautifier\Formatter;


use PlanB\Beautifier\Template\DefaultAbstractTemplate;
use PlanB\Beautifier\Template\AbstractTemplate;
use PlanB\Type\Data\Data;


/**
 * Clase base para Formatters
 */
abstract class Formatter implements FormatterInterface
{
    /**
     * Formatter constructor.
     */
    protected function __construct()
    {
    }

    /**
     * Devuelve la representación de una variable
     *
     * @param mixed $data
     * @return string
     */
    public function dump($data): string
    {
        $data = Data::make($data);
        $template = $this->makeTemplate($data);

        return $template->render();
    }

    /**
     * Devuelve el template adecuado para este dato
     * @param Data $data
     * @return AbstractTemplate
     */
    private function makeTemplate(Data $data): AbstractTemplate
    {
        /**
         * Solucion A
         *
         * Este método debe ser abstracto, y hacer que cada formatter tenga su factory
         * para generar las templates adecuadas
         * De cualquier forma, voy a tener una ScalarTemplate, CountableTemplate, ExceptionTemplate, para que hereden las de
         * los formatters
         *
         * ConsoleScalarTemplate extends ScalarTemplate ...
          *
         * ========================================================================================================================================
         *
         * Solucion B
         *
         * No me convence, buscar algo que no genera tanta cantidad de mini clases
         * Pensar en composición, o en un patron o algo asi
         *
         * A lo mejor, este método solo tiene que dedicarse a calcular el pattern para cada tipo,
         * que en realidad es lo que lleva el estilo y está intimimamene asociado la formatter
         * (el pattern es lo que cambia entre html, console y plain)
         *
         * Si hago eso, y por otra parte tengo un DataExtractor, que coja un Data y me devuelva las keys, y los values
         * para el pattern antes calculado, ya no hace falta replicar tanto template por todos lados
         *
         * Este DataExtractor, es rollo factory, me devuelve arrays distintos segun el objeto Data original sea una excepción
         * un Text, o lo que sea
         *
         * ========================================================================================================================================
         *
         * Solucion C
         *
         * Y si pudiera montar un TemplateBuilder ??
         *
         * $builder
         *  ->withData($data)
         *  ->withPattern($data)
         *  ->build()
         *
         */

        return DefaultAbstractTemplate::make($data, '%type%:%value%');
    }


}
