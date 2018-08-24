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

namespace PlanB\Type\Path;

use PlanB\Type\Assurance\Assurance;
use PlanB\Type\Stringifable;

/**
 * Garantiza que una ruta cumple una serie de condiciones
 */
class PathAssurance extends Assurance implements Stringifable
{
    /**
     * @var \PlanB\Type\Path\Path
     */
    private $path;

    /**
     * PathAssurance constructor.
     *
     * @param \PlanB\Type\Path\Path $path
     */
    protected function __construct(Path $path)
    {
        $this->path = $path;
    }

    /**
     * Crea una nueva instancia a partir de un Path
     *
     * @param \PlanB\Type\Path\Path $path
     *
     * @return \PlanB\Type\Path\PathAssurance
     */
    public static function fromPath(Path $path): self
    {
        return new static($path);
    }


    /**
     * Crea una nueva instancia a partir de una (o varias) cadena de texto
     *
     * @param string ...$segments
     *
     * @return \PlanB\Type\Path\PathAssurance
     */
    public static function create(string ...$segments): self
    {
        $path = Path::create(...$segments);

        return new static($path);
    }

    /**
     * @inheritDoc
     */
    public function stringify(): string
    {
        return $this->end()->stringify();
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->stringify();
    }

    /**
     * Devuelve el objeto sujeto a evaluación
     *
     * @return mixed
     */
    protected function getEvaluatedObject(): object
    {
        return $this->path;
    }
}
