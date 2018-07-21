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

use PlanB\ValueObject\Path\Exception\InvalidPathException;

/**
 * Garantiza que una ruta cumple una serie de condiciones
 */
class PathAssurance
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
    public static function fromString(string ...$segments): self
    {
        $path = Path::create(...$segments);

        return new self($path);
    }

    /**
     * Devuelve la ruta
     *
     * @return \PlanB\ValueObject\Path\Path
     */
    public function getPath(): Path
    {
        return $this->path;
    }

    /**
     * Verifica que la ruta es un directorio, o lanza una excepción si no lo es
     *
     * @return \PlanB\ValueObject\Path\PathAssurance
     */
    public function ensureThatIsADirectory(): self
    {
        if (!$this->path->isDirectory()) {
            throw InvalidPathException::isNotADirectory($this->path);
        }

        return $this;
    }

    /**
     * * Verifica que la ruta es un archivo, o lanza una excepción si no lo es
     *
     * @return $this
     */
    public function ensureThatIsAFile()
    {
        if (!$this->path->isFile()) {
            throw InvalidPathException::isNotAFile($this->path);
        }

        return $this;
    }


    /**
     * * Verifica que la ruta es un enlace simbólico, o lanza una excepción si no lo es
     *
     * @return $this
     */
    public function ensureThatIsALink()
    {
        if (!$this->path->isLink()) {
            throw InvalidPathException::isNotALink($this->path);
        }

        return $this;
    }

    /**
     * Verifica que una ruta tiene extensión, o si tiene una de entre las pasadas como argumento
     *
     * @param string ...$expected Las extensiones que se consideran válidas
     *
     * @return \PlanB\ValueObject\Path\PathAssurance
     */
    public function ensureThatHaveExtension(string ...$expected): self
    {
        if ($this->path->haveExtension(...$expected)) {
            return $this;
        }

        if (count($expected) > 0) {
            throw InvalidPathException::hasNotExpectedExtension($this->path, $expected);
        }

        throw InvalidPathException::hasNotExtension($this->path);
    }
}
