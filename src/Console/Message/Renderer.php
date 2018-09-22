<?php
/**
 * This file is part of the planb project.
 *
 * (c) Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace PlanB\Console\Message;

use PlanB\Console\Message\Decorator\AlignDecorator;
use PlanB\Console\Message\Decorator\DecoratorInterface;
use PlanB\Console\Message\Decorator\MarginDecorator;
use PlanB\Console\Message\Decorator\PaddingDecorator;
use PlanB\Console\Message\Decorator\TagDecorator;
use PlanB\Console\Message\Style\Style;
use PlanB\DS\Vector\Vector;
use PlanB\Type\Text\Text;

/**
 * Aplica un estilo a una cadena de texto
 */
class Renderer
{

    /**
     * @var \PlanB\DS\Vector\Vector
     */
    private $decorators;

    /**
     * Renderer named constructor.
     *
     * @return \PlanB\Console\Message\Renderer
     */
    public static function create(): self
    {
        return new static();
    }

    /**
     * Renderer constructor.
     */
    protected function __construct()
    {
        $this->decorators = Vector::typed(DecoratorInterface::class, [
            PaddingDecorator::create(),
            AlignDecorator::create(),
            TagDecorator::create(),
            MarginDecorator::create(),
        ]);
    }

    /**
     * Aplica el estilo al texto
     *
     * @param \PlanB\Console\Message\Line        $line
     * @param \PlanB\Console\Message\Style\Style $style
     *
     * @return \PlanB\Type\Text\Text
     */
    public function render(Line $line, Style $style): Text
    {
        return $this->decorators->reduce(function (Line $line, DecoratorInterface $decorator) use ($style): Line {
            return $decorator->render($line, $style);
        }, $line, $style);
    }
}
