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

namespace PlanB\DS1\Resolver;

use Ds\Map;

use PlanB\DS1\Resolver\Input\InputInterface;
use PlanB\DS1\Resolver\Input\Input;
use PlanB\DS1\Resolver\Rule\Converter;
use PlanB\DS1\Resolver\Rule\Filter;
use PlanB\DS1\Resolver\Rule\Normalizer;
use PlanB\DS1\Resolver\Rule\Rule;
use PlanB\DS1\Resolver\Rule\TypeValidator;
use PlanB\DS1\Resolver\Rule\Validator;
use PlanB\Type\DataType\Type;

/**
 * Procesa un valor antes de ser añadido a una colección
 */
class Resolver
{
    private const FILTERS = 'filters';

    private const CONVERTERS = 'converters';

    private const VALIDATORS = 'validators';

    private const NORMALIZERS = 'normalizers';

    /**
     * @var RuleQueue
     */
    private $mapOfRules;

    /**
     * Resolver constructor.
     * @param null|string $type
     */
    protected function __construct(?string $type)
    {
        $this->mapOfRules = new Map();
        $this->mapOfRules[self::FILTERS] = RuleQueue::make();
        $this->mapOfRules[self::CONVERTERS] = RuleQueue::make();
        $this->mapOfRules[self::VALIDATORS] = RuleQueue::make();
        $this->mapOfRules[self::NORMALIZERS] = RuleQueue::make();

        if (!is_null($type)) {
            $this->addValidator(TypeValidator::make($type), PHP_INT_MAX);
        }
    }

    /**
     * Resolver named constructor.
     *
     * @param null|string $type
     * @return Resolver
     */
    public static function make(?string $type = null)
    {
        return new static($type);
    }

    /**
     * Añade un filtro a la cola
     *
     * @param callable $callback
     * @param int $priority
     * @return Resolver
     */
    public function addFilter(callable $filter, int $priority = 0): self
    {

        if (!($filter instanceof Rule)) {
            $filter = Filter::make($filter);
        }

        $this->mapOfRules[self::FILTERS]->push($filter, $priority);
        return $this;
    }

    /**
     * Añade un filtro para un tipo determinado
     *
     * @param string $type
     * @param callable $filter
     * @param int $priority
     * @return Resolver
     */
    public function addTypedFilter(string $type, callable $filter, int $priority = 0): self
    {
        return $this->addFilter(Filter::typed($type, $filter), $priority);
    }


    public function addConverter(string $type, callable $converter, int $priority = 0): self
    {
        if (!($converter instanceof Rule)) {
            $converter = Converter::typed($type, $converter);
        }

        $this->mapOfRules[self::CONVERTERS]->push($converter, $priority);
        return $this;
    }


    public function addValidator(callable $validator, int $priority = 0): self
    {
        if (!($validator instanceof Rule)) {
            $validator = Validator::make($validator);
        }

        $this->mapOfRules[self::VALIDATORS]->push($validator, $priority);
        return $this;
    }

    public function addTypedValidator(string $type, callable $validator, int $priority = 0): self
    {
        return $this->addFilter(Validator::typed($type, $validator), $priority);

    }

    public function addNormalizer(callable $normalizer, int $priority = 0): self
    {
        if (!($normalizer instanceof Rule)) {
            $normalizer = Normalizer::make($normalizer);
        }

        $this->mapOfRules[self::NORMALIZERS]->push($normalizer, $priority);
        return $this;
    }

    public function addTypedNormalizer(string $type, callable $normalizer, int $priority = 0): self
    {
        return $this->addFilter(Normalizer::typed($type, $normalizer), $priority);

    }

    /**
     * @param mixed $value
     * @return InputInterface
     */
    public function resolve($value): InputInterface
    {
        $input = Input::make($value);

        foreach ($this->mapOfRules as $name => $queue) {
            $input = $queue->resolve($input);
        }

        return $input;
    }

}
