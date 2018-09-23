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

namespace PlanB\DS\Resolver;

use Ds\Map;
use PlanB\DS\Resolver\Input\FailedInput;
use PlanB\DS\Resolver\Input\Input;
use PlanB\DS\Resolver\Input\InputInterface;
use PlanB\DS\Resolver\Rule\Converter;
use PlanB\DS\Resolver\Rule\Filter;
use PlanB\DS\Resolver\Rule\Normalizer;
use PlanB\DS\Resolver\Rule\Rule;
use PlanB\DS\Resolver\Rule\Validator;
use PlanB\Type\DataType\DataType;

/**
 * Procesa un valor antes de ser añadido a una colección
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Resolver
{
    private const FILTERS = 'filters';

    private const CONVERTERS = 'converters';

    private const ENSURE_TYPE = 'ensure_type';

    private const VALIDATORS = 'validators';

    private const NORMALIZERS = 'normalizers';

    /**
     * @var \PlanB\DS\Resolver\RuleQueue
     */
    private $mapOfRules;

    /**
     * @var null|\PlanB\Type\DataType\DataType
     */
    private $type;

    /**
     * Resolver named constructor.
     *
     * @param string|null $type
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public static function make(?string $type = null): Resolver
    {
        return new static($type);
    }

    /**
     * Resolver constructor.
     *
     * @param null|\PlanB\Type\DataType\DataType $type
     */
    protected function __construct(?string $type = null)
    {
        $this->type = null;

        $this->mapOfRules = new Map();
        $this->mapOfRules[self::FILTERS] = RuleQueue::make();
        $this->mapOfRules[self::CONVERTERS] = RuleQueue::make();
        $this->mapOfRules[self::ENSURE_TYPE] = RuleQueue::make();
        $this->mapOfRules[self::VALIDATORS] = RuleQueue::make();
        $this->mapOfRules[self::NORMALIZERS] = RuleQueue::make();

        if (!is_string($type)) {
            return;
        }

        $this->setType($type);
    }

    /**
     * Asigna un tipo
     *
     * @param string $type
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public function setType(string $type): self
    {

        $type = ensure_type($type)
            ->isValid()
            ->end();

        $this->type = $type;

        $validator = Validator::make(function ($input) use ($type) {
            return $type->isTheTypeOf($input);
        });

        $this->mapOfRules[self::ENSURE_TYPE]->push($validator, 0);

        return $this;
    }

    /**
     * Devuelve el tipo del resolver
     *
     * @return null|string
     */
    public function getType(): ?DataType
    {
        return $this->type;
    }

    /**
     * Añade un filtro a la cola
     *
     * @param callable $filter
     * @param int      $priority
     *
     * @return \PlanB\DS\Resolver\Resolver
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
     * @return \PlanB\DS\Resolver\Resolver
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
     * @return \PlanB\DS\Resolver\Resolver
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
     * @return \PlanB\DS\Resolver\Resolver
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
     * @return \PlanB\DS\Resolver\Resolver
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
     * @return \PlanB\DS\Resolver\Resolver
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
     * @return \PlanB\DS\Resolver\Resolver
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
        $type = $this->getType();

        foreach ($this->mapOfRules as $queue) {
            $queue->setInnerType($type);

            $input = $queue->resolve($input);
        }

        if ($input instanceof FailedInput) {
            $input->setOriginal($value);
        }

        return $input;
    }
}
