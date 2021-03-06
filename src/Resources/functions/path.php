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

use PlanB\Type\Path\PathAssurance;

if (!function_exists('ensure_path')) {

    /**
     * Assurance para Path
     *
     * @param string ...$segments
     * @return PathAssurance
     */
    function ensure_path(string ...$segments): PathAssurance
    {
        return PathAssurance::make(...$segments);
    }
}

