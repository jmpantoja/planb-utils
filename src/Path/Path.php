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
     * @var string[]
     */
    private $segments = [];

    /**
     * Path private constructor.
     *
     * @param string $path
     */
    private function __construct(string $path)
    {
        $this->path = $path;
        $this->segments = explode(DIRECTORY_SEPARATOR, $path);
    }

    /**
     *
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
     * Devuelve una ruta normalizada a partir de varios segmentos
     *
     * @param string[] ...$parts
     * @return string
     */
    public static function join(string ...$parts): ?string
    {
        return PathNormalizer::create(...$parts)->build();
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
