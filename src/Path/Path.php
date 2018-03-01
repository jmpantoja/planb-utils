<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace PlanB\Utils\Path;

use PlanB\Utils\Path\Exception\EmptyPathException;
use PlanB\Utils\Path\Exception\OverFlowRootDirException;

/**
 * Clase de Utilidades para la manipulacion de rutas
 *
 * @see https://nodejs.org/docs/latest/api/path.html#path_path_resolve_paths
 *
 * @package PlanB\Utils\Path
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
final class Path
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
    private function __construct(string $path)
    {
        $this->setPath($path);
    }

    private function setPath(string $path): void
    {
        if (empty($path)) {
            throw EmptyPathException::create();
        }
        $this->path = $path;
    }

    /**
     * Crea una nueva ruta
     *
     * @param string[] ...$parts
     * @return \PlanB\Utils\Path\Path
     */
    public static function create(string ...$parts): self
    {
        $path = self::join(...$parts);
        return new self($path);
    }

    /**
     * Devuelve una listado, con las rutas que coinciden con un patrón
     *
     * @param string[] ...$parts
     * @return \PlanB\Utils\Path\Path[]
     */
    public static function glob(string ...$parts): array
    {

        $paths = [];
        $pattern = self::join(...$parts);

        foreach (glob($pattern) as $path) {
            $paths[] = self::create($path);
        }

        return $paths;
    }


    /**
     * Devuelve una ruta normalizada a partir de varios segmentos
     *
     * @param string[] ...$parts
     * @return string
     */
    public static function join(string ...$parts): string
    {
        return PathNormalizer::create(...$parts)->build();
    }

    /**
     * Devuelve una ruta normalizada
     *
     * @param string $path
     * @return string
     */
    public static function normalize(string $path): string
    {
        return self::join($path);
    }

    /**
     * Modifica la ruta, añadiendo uno o varios segmentos al final
     *
     * @param string[] ...$parts
     * @return \PlanB\Utils\Path\Path
     */
    public function append(string ...$parts): self
    {
        array_unshift($parts, $this->path);
        return self::create(...$parts);
    }

    /**
     * Modifica la ruta, añadiendo uno o varios segmentos al principio
     *
     * @param string[] ...$parts
     * @return \PlanB\Utils\Path\Path
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
        return substr($this->path, 0, 1) === DIRECTORY_SEPARATOR;
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
     * @return \PlanB\Utils\Path\Path
     *
     * @throws \PlanB\Utils\Path\Exception\OverFlowRootDirException
     */
    public function parent(int $level = 1): self
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
    public function basename(): string
    {
        return pathinfo($this->path, PATHINFO_BASENAME);
    }

    /**
     * Devuelve filename
     *
     * @return string
     */
    public function filename(): string
    {
        return pathinfo($this->path, PATHINFO_FILENAME);
    }

    /**
     * Devuelve extension
     *
     * @return string
     */
    public function extension(): ?string
    {
        $exentension = pathinfo($this->path, PATHINFO_EXTENSION);
        return !empty($exentension) ? $exentension : null;
    }

    /**
     * Devuelve la ruta normalizada
     *
     * @return string
     */
    public function build(): string
    {
        return $this->path;
    }


    /**
     * Devuelve la ruta normalizada
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->build();
    }
}
