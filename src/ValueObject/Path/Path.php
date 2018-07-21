<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PlanB\ValueObject\Path;

use PlanB\ValueObject\Path\Exception\EmptyPathException;
use PlanB\ValueObject\Path\Exception\OverFlowRootDirException;
use PlanB\ValueObject\Stringifable;

/**
 * Clase de Utilidades para la manipulacion de rutas
 *
 * @see https://nodejs.org/docs/latest/api/path.html#path_path_resolve_paths
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
class Path implements Stringifable
{
    /**
     * @var string $path
     */
    private $path;

    /**
     * Path private constructor.
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        $isEmpty = isBlankText($path);

        if ($isEmpty) {
            throw EmptyPathException::create();
        }
        $this->path = $path;
    }

    /**
     * Crea una nueva ruta
     *
     * @param string ...$parts
     *
     * @return \PlanB\ValueObject\Path\Path
     */
    public static function create(string ...$parts): self
    {
        $path = self::normalize(...$parts);

        return new self($path);
    }

    /**
     * Devuelve una ruta normalizada a partir de varios segmentos
     *
     * @param string ...$parts
     *
     * @return string
     */
    public static function normalize(string ...$parts): string
    {
        return PathNormalizer::normalize(...$parts);
    }


    /**
     * Modifica la ruta, añadiendo uno o varios segmentos al final
     *
     * @param string ...$parts
     *
     * @return \PlanB\ValueObject\Path\Path
     */
    public function append(string ...$parts): self
    {
        array_unshift($parts, $this->path);

        return self::create(...$parts);
    }

    /**
     * Modifica la ruta, añadiendo uno o varios segmentos al principio
     *
     * @param string ...$parts
     *
     * @return \PlanB\ValueObject\Path\Path
     */
    public function prepend(string ...$parts): self
    {
        array_push($parts, $this->path);

        return self::create(...$parts);
    }


    /**
     * Indica si es una ruta absoluta
     *
     * @return bool
     */
    public function isAbsolute(): bool
    {
        return DIRECTORY_SEPARATOR === substr($this->path, 0, 1);
    }

    /**
     * Indica si es una ruta relativa
     *
     * @return bool
     */
    public function isRelative(): bool
    {
        return !$this->isAbsolute();
    }


    /**
     * Indica si la ruta existe
     *
     * @return bool
     */
    public function exists(): bool
    {
        return file_exists($this->path);
    }

    /**
     * Indica si la ruta es de un fichero
     *
     * @return bool
     */
    public function isFile(): bool
    {
        return is_file($this->path);
    }

    /**
     * Indica si la ruta es de un directorio
     *
     * @return bool
     */
    public function isDirectory(): bool
    {

        return is_dir($this->path);
    }

    /**
     * Indica si la ruta es de un enlace simbolico
     *
     * @return bool
     */
    public function isLink(): bool
    {
        return is_link($this->path);
    }


    /**
     * Devuelve el directorio padre del nivel indicado
     *
     * 0: devuelve la ruta actual
     * 1: devuelve el directorio padre
     * 2: devuelve el directorio "abuelo"
     * etc.
     *
     * @param int $level
     *
     * @return \PlanB\ValueObject\Path\Path
     *
     * @throws \PlanB\ValueObject\Path\Exception\OverFlowRootDirException
     */
    public function getParent(int $level = 1): self
    {
        $tree = PathTree::create($this->path)
            ->getInversedPathTree();

        if ($level > count($tree) - 1) {
            throw OverFlowRootDirException::create();
        }

        return $tree[$level];
    }


    /**
     * Devuelve basename
     *
     * @return string
     */
    public function getBasename(): string
    {
        return pathinfo($this->path, PATHINFO_BASENAME);
    }

    /**
     * Devuelve dirname
     *
     * @return string
     */
    public function getDirname(): string
    {
        return pathinfo($this->path, PATHINFO_DIRNAME);
    }

    /**
     * Devuelve filename
     *
     * @return string
     */
    public function getFilename(): string
    {
        return pathinfo($this->path, PATHINFO_FILENAME);
    }

    /**
     * Devuelve extension
     *
     * @return string
     */
    public function getExtension(): ?string
    {
        $exentension = pathinfo($this->path, PATHINFO_EXTENSION);

        if (isBlankText($exentension)) {
            return null;
        };

        return $exentension;
    }

    /**
     * Indica si la ruta tiene extensión, o si tiene una de entre las pasadas como argumento
     * ´´´
     * /path/to/file | hasExtension() => false
     * /path/to/file.txt | hasExtension() => true
     * /path/to/file.txt | hasExtension('php') => false
     * /path/to/file.txt | hasExtension('php', 'txt') => true
     *
     * ´´´
     *
     * @param string ...$expected Las extensiones que se consideran válidas
     *
     * @return bool
     */
    public function haveExtension(string ...$expected): bool
    {
        $extension = $this->getExtension();

        if (is_null($extension)) {
            return false;
        }

        return in_array($extension, $expected);
    }


    /**
     * __toString alias
     *
     * @return string
     */
    public function stringify(): string
    {
        return $this->__toString();
    }


    /**
     * Devuelve la ruta normalizada como una cadena de texto
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->path;
    }
}
