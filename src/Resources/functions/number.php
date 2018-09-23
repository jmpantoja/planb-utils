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

use \PlanB\Type\Text\Text;
use \PlanB\Type\Text\TextAssurance;
use \PlanB\Type\Value\Value;
use \PlanB\Type\Number\NumberAssurance;


if (!function_exists('ensure_number')) {
    
    /**
     * Assurance para Number
     *
     * @param $number
     * @return NumberAssurance
     */
    function ensure_number($number): NumberAssurance
    {
        return NumberAssurance::make($number);
    }
}
