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

namespace PlanB\ValueObject\Path;

use PlanB\Utils\Assurance\Assurance;
use PlanB\ValueObject\Stringifable;

/**
 * Garantiza que una ruta cumple una serie de condiciones
 */
class PathAssurance extends Assurance implements Stringifable
{
    /**
     * @var \PlanB\ValueObject\Path\Path
     */
    private $path;

    /**
     * PathAssurance constructor.
     *
     * @param \PlanB\ValueObject\Path\Path $path
     */
    public function __construct(Path $path)
    {
        $this->path = $path;
    }

    /**
     * Crea una nueva instancia a partir de un Path
     *
     * @param \PlanB\ValueObject\Path\Path $path
     *
     * @return \PlanB\ValueObject\Path\PathAssurance
     */
    public static function fromPath(Path $path): self
    {
        return new self($path);
    }


    /**
     * Crea una nueva instancia a partir de una (o varias) cadena de texto
     *
     * @param string ...$segments
     *
     * @return \PlanB\ValueObject\Path\PathAssurance
     */
    public static function create(string ...$segments): self
    {
        $path = Path::create(...$segments);

        return new self($path);
    }

    /**
     * @inheritDoc
     */
    public function stringify(?string $format = null): string
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
