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
use PlanB\DS1\Resolver\Input\Input;
use PlanB\DS1\Resolver\Input\InputInterface;
use PlanB\DS1\Resolver\Rule\Converter;
use PlanB\DS1\Resolver\Rule\Filter;
use PlanB\DS1\Resolver\Rule\Normalizer;
use PlanB\DS1\Resolver\Rule\Rule;
use PlanB\DS1\Resolver\Rule\TypeValidator;
use PlanB\DS1\Resolver\Rule\Validator;

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
     * @var \PlanB\DS1\Resolver\RuleQueue
     */
    private $mapOfRules;

    /**
     * Resolver constructor.
     *
     * @param null|string $type
     */
    protected function __construct(?string $type)
    {
        $this->mapOfRules = new Map();
        $this->mapOfRules[self::FILTERS] = RuleQueue::make();
        $this->mapOfRules[self::CONVERTERS] = RuleQueue::make();
        $this->mapOfRules[self::VALIDATORS] = RuleQueue::make();
        $this->mapOfRules[self::NORMALIZERS] = RuleQueue::make();

        if (is_null($type)) {
            return;
        }

        $this->addValidator(TypeValidator::make($type), PHP_INT_MAX);
    }

    /**
     * Resolver named constructor.
     *
     * @param null|string $type
     *
     * @return \PlanB\DS1\Resolver\Resolver
     */
    public static function make(?string $type = null): Resolver
    {
        return new static($type);
    }

    /**
     * Añade un filtro a la cola
     *
     * @param callable $filter
     * @param int      $priority
     *
     * @return \PlanB\DS1\Resolver\Resolver
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
     * @param string   $type
     * @param callable $filter
     * @param int      $priority
     *
     * @return \PlanB\DS1\Resolver\Resolver
     */
    public function addTypedFilter(string $type, callable $filter, int $priority = 0): self
    {
        return $this->addFilter(Filter::typed($type, $filter), $priority);
    }

    /**
     * Añade un converter
     *
     * @param string   $type
     * @param callable $converter
     * @param int      $priority
     *
     * @return \PlanB\DS1\Resolver\Resolver
     */
    public function addConverter(string $type, callable $converter, int $priority = 0): self
    {
        if (!($converter instanceof Rule)) {
            $converter = Converter::typed($type, $converter);
        }

        $this->mapOfRules[self::CONVERTERS]->push($converter, $priority);

        return $this;
    }


    /**
     * Añade un validator
     *
     * @param callable $validator
     * @param int      $priority
     *
     * @return \PlanB\DS1\Resolver\Resolver
     */
    public function addValidator(callable $validator, int $priority = 0): self
    {
        if (!($validator instanceof Rule)) {
            $validator = Validator::make($validator);
        }

        $this->mapOfRules[self::VALIDATORS]->push($validator, $priority);

        return $this;
    }

    /**
     * Añade un validator para un tipo determinado
     *
     * @param string   $type
     * @param callable $validator
     * @param int      $priority
     *
     * @return \PlanB\DS1\Resolver\Resolver
     */
    public function addTypedValidator(string $type, callable $validator, int $priority = 0): self
    {
        return $this->addFilter(Validator::typed($type, $validator), $priority);
    }

    /**
     * Añade un normalizer
     *
     * @param callable $normalizer
     * @param int      $priority
     *
     * @return \PlanB\DS1\Resolver\Resolver
     */
    public function addNormalizer(callable $normalizer, int $priority = 0): self
    {
        if (!($normalizer instanceof Rule)) {
            $normalizer = Normalizer::make($normalizer);
        }

        $this->mapOfRules[self::NORMALIZERS]->push($normalizer, $priority);

        return $this;
    }

    /**
     * Añade un normalizer para un tipo determinado
     *
     * @param string   $type
     * @param callable $normalizer
     * @param int      $priority
     *
     * @return \PlanB\DS1\Resolver\Resolver
     */
    public function addTypedNormalizer(string $type, callable $normalizer, int $priority = 0): self
    {
        return $this->addFilter(Normalizer::typed($type, $normalizer), $priority);
    }

    /**
     * @inheritdoc
     */
    public function resolve($value): InputInterface
    {
        $input = Input::make($value);

        foreach ($this->mapOfRules as $queue) {
            $input = $queue->resolve($input);
        }

        return $input;
    }
}
