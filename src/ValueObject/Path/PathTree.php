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

/**
 * Gestiona un arbol de directorios
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 */
final class PathTree
{

    /**
     * @var string[]
     */
    private $segments = [];

    /**
     * Path private constructor.
     *
     * @param \PlanB\ValueObject\Path\Path $path
     */
    public function __construct(Path $path)
    {
        $this->segments = explode(DIRECTORY_SEPARATOR, $path->stringify());

        if (!$path->isAbsolute()) {
            return;
        }

        $this->segments[0] = DIRECTORY_SEPARATOR;
    }

    /**
     * @param string[] ...$parts
     *
     * @return \PlanB\ValueObject\Path\PathTree
     */
    public static function create(string ...$parts): self
    {
        $path = Path::create(...$parts);

        return new self($path);
    }


    /**
     * Devuelve el arbol de directorios, desde la raiz hasta la ruta actual,
     * como un array de strings
     *
     * @return string[]
     */
    public function getTree(): array
    {
        $tree = [];
        $size = count($this->segments);

        for ($index = 0; $index < $size; $index = $index + 1) {
            $temp = array_slice($this->segments, 0, $index + 1);
            $path = implode(DIRECTORY_SEPARATOR, $temp);

            $tree[] = Path::normalize($path);
        }

        return $tree;
    }

    /**
     * Devuelve el arbol de directorios, desde la raiz hasta la ruta actual,
     * como un array de strings
     *
     * @return string[]
     */
    public function getInversedTree(): array
    {
        $tree = $this->getTree();

        return array_reverse($tree);
    }

    /**
     * Devuelve el arbol de directorios, desde la raiz hasta la ruta actual,
     * como un array de objetos Paths
     *
     * @return \PlanB\ValueObject\Path\Path[]
     */
    public function getPathTree(): array
    {
        $tree = [];
        foreach ($this->getTree() as $branch) {
            $tree[] = Path::create($branch);
        }

        return $tree;
    }

    /**
     * Devuelve el arbol de directorios, desde la raiz hasta la ruta actual,
     * como un array de objetos Path
     *
     * @return \PlanB\ValueObject\Path\Path[]
     */
    public function getInversedPathTree(): array
    {
        $tree = $this->getPathTree();

        return array_reverse($tree);
    }
}
