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

use \PlanB\ValueObject\Path\PathAssurance;
use \PlanB\ValueObject\Path\Path;

if (!function_exists('ensureThatIsADirectory')) {

    function ensureThatIsADirectory(string ...$segments): Path
    {
        return PathAssurance::fromString(...$segments)
            ->ensureThatIsADirectory()
            ->getPath();
    }

}

if (!function_exists('ensureThatIsAFile')) {

    function ensureThatIsAFile(string ...$segments): Path
    {
        return PathAssurance::fromString(...$segments)
            ->ensureThatIsAFile()
            ->getPath();
    }

}

if (!function_exists('ensureThatIsALink')) {

    function ensureThatIsALink(string ...$segments): Path
    {
        return PathAssurance::fromString(...$segments)
            ->ensureThatIsALink()
            ->getPath();
    }

}

if (!function_exists('ensurePath')) {

    function ensurePath(callable $callback, string ...$segments): Path
    {
        $path = Path::create(...$segments);
        $assurance = PathAssurance::fromPath($path);

        call_user_func($callback, $assurance, $path);

        return $path;
    }

}
