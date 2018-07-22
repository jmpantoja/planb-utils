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
use PlanB\ValueObject\Stringifable;

/**
 * Garantiza que una ruta cumple una serie de condiciones
 */
class PathAssurance implements Stringifable
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
    public function end(): Path
    {
        return $this->path;
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
     * Verifica que la ruta es un directorio, o lanza una excepción si no lo es
     *
     * @return \PlanB\ValueObject\Path\PathAssurance
     */
    public function isDirectory(): self
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
    public function isFile(): self
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
    public function isLink(): self
    {
        if (!$this->path->isLink()) {
            throw InvalidPathException::isNotALink($this->path);
        }

        return $this;
    }

    /**
     * * Verifica si la ruta tiene permisos de lectura, o lanza una excepción en caso contrario
     *
     * @return $this
     */
    public function isReadable(): self
    {
        if (!$this->path->isReadable()) {
            throw InvalidPathException::isNotReadable($this->path);
        }

        return $this;
    }

    /**
     * Verifica si la ruta es un archivo con permisos de lectura, o lanza una excepción en caso contrario
     *
     * @return \PlanB\ValueObject\Path\PathAssurance
     */
    public function isReadableFile(): self
    {
        $this->isFile();
        $this->isReadable();

        return $this;
    }

    /**
     * Verifica si la ruta es un archivo con permisos de lectura y con una (o varias) determinada extensión,
     * o lanza una excepción en caso contrario
     *
     * @param string ...$expected
     *
     * @return \PlanB\ValueObject\Path\PathAssurance
     */
    public function isReadableFileWithExtension(string ...$expected): self
    {
        $this->isFile();
        $this->isReadable();
        $this->hasExtension(...$expected);

        return $this;
    }

    /**
     * * Verifica si la ruta tiene permisos de escritura, o lanza una excepción en caso contrario
     *
     * @return $this
     */
    public function isWritable(): self
    {
        if (!$this->path->isWritable()) {
            throw InvalidPathException::isNotWritable($this->path);
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
    public function hasExtension(string ...$expected): self
    {
        if ($this->path->hasExtension(...$expected)) {
            return $this;
        }

        if (count($expected) > 0) {
            throw InvalidPathException::hasNotExpectedExtension($this->path, $expected);
        }

        throw InvalidPathException::hasNotExtension($this->path);
    }
}
