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

use Ds\PriorityQueue;
use PlanB\Console\Beautifier\Beautifier;
use PlanB\DS\Resolver\Rule\Rule;
use PlanB\DS\Resolver\Rule\RuleFactory;
use PlanB\DS\Resolver\Rule\RuleInterface;
use PlanB\Type\DataType\DataType;
use PlanB\Type\Text\Text;

/**
 * Resuelve un valor antes de ser añadido a una colección
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class Resolver
{

    public const VERY_HIGHT_PRIORITY = PHP_INT_MAX;
    public const HIGHT_PRIORITY = PHP_INT_MAX - 10;
    public const NORMAL_PRIORITY = 0;
    public const LOW_PRIORITY = PHP_INT_MIN + 10;
    public const VERY_LOW_PRIORITY = PHP_INT_MIN;


    /**
     * @var \Ds\PriorityQueue
     */
    private $queueOfRules;

    /**
     * @var null|\PlanB\Type\DataType\DataType
     */
    private $type = null;

    /**
     * Resolver named constructor.
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * Resolver named constructor.
     *
     * @param string $type
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public static function typed(string $type): self
    {
        return new static($type);
    }


    /**
     * Resolver constructor.
     *
     * @param string|null $type
     */
    protected function __construct(?string $type = null)
    {
        $this->queueOfRules = new PriorityQueue();

        if (is_null($type)) {
            return;
        }

        $this->type($type);
    }

    /**
     * Indica si aun no se han añadido reglas
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->queueOfRules->isEmpty();
    }

    /**
     * Asigna un tipo a este resolver
     *
     * @param string $type
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public function type(string $type): self
    {
        $this->type = DataType::make($type);

        return $this;
    }

    /**
     * Devuelve el tipo de este resolver
     *
     * @return null|\PlanB\Type\DataType\DataType
     */
    public function getType(): ?DataType
    {
        return $this->type;
    }

    /**
     * Añade un nuevo loader
     *
     * @param callable $callback
     * @param string   ...$types
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public function loader(callable $callback, string ...$types): self
    {

        $rule = RuleFactory::loader($callback, ...$types);
        $this->addRule($rule, self::VERY_HIGHT_PRIORITY);

        return $this;
    }

    /**
     * Asigna varios loaders
     *
     * @param callable[] $loaders
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public function loaders(array $loaders): self
    {
        foreach ($loaders as $type => $loader) {
            $this->loader($loader, $type);
        }

        return $this;
    }


    /**
     * Añade una nueva regla
     *
     * @param callable $callback
     * @param string   ...$types
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public function rule(callable $callback, string ...$types): self
    {
        $rule = RuleFactory::rule($callback, ...$types);
        $this->addRule($rule, self::HIGHT_PRIORITY);

        return $this;
    }

    /**
     * Asigna varias reglas
     *
     * @param callable[] $rules
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public function rules(array $rules): self
    {
        foreach ($rules as $type => $rule) {
            $this->rule($rule, $type);
        }

        return $this;
    }


    /**
     * Añade un nuevo converter
     *
     * @param callable $callback
     * @param string   ...$types
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public function converter(callable $callback, string ...$types): self
    {
        $rule = RuleFactory::converter($callback, ...$types);
        $this->addRule($rule, self::NORMAL_PRIORITY);

        return $this;
    }

    /**
     * Asigna varios converters
     *
     * @param callable[] $converters
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public function converters(array $converters): self
    {
        foreach ($converters as $type => $converter) {
            $this->converter($converter, $type);
        }

        return $this;
    }


    /**
     * Añade un nuevo converter
     *
     * @param callable $callback
     * @param string   ...$types
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public function validator(callable $callback, string ...$types): self
    {
        $rule = RuleFactory::validator($callback, ...$types);
        $this->addRule($rule, self::NORMAL_PRIORITY);

        return $this;
    }

    /**
     * Asigna varios validators
     *
     * @param callable[] $validators
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public function validators(array $validators): self
    {
        foreach ($validators as $type => $validator) {
            $this->validator($validator, $type);
        }

        return $this;
    }

    /**
     * Añade un nuevo filter
     *
     * @param callable $callback
     * @param string   ...$types
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public function filter(callable $callback, string ...$types): self
    {
        $rule = RuleFactory::filter($callback, ...$types);
        $this->addRule($rule, self::NORMAL_PRIORITY);

        return $this;
    }

    /**
     * Asigna varios filters
     *
     * @param callable[] $filters
     *
     * @return \PlanB\DS\Resolver\Resolver
     */
    public function filters(array $filters): self
    {
        foreach ($filters as $type => $filter) {
            $this->filter($filter, $type);
        }

        return $this;
    }


    /**
     * Añade una nueva regla, con prioridad
     *
     * @param \PlanB\DS\Resolver\Rule\RuleInterface $rule
     * @param int                                   $priority
     */
    private function addRule(RuleInterface $rule, int $priority): void
    {
        $this->queueOfRules->push($rule, $priority);
    }

    /**
     * Resuelve un valor
     *
     * @param callable $callback
     * @param mixed    $value
     *
     * @param mixed    $key
     *
     * @throws \Throwable
     */
    public function value(callable $callback, $value, $key = null): void
    {
        $input = $this->resolve($value);

        if (!$input->isValid()) {
            return;
        }

        call_user_func($callback, $input->value(), $key);
    }

    /**
     * Resuelve un conjunto de valores
     *
     * @param callable $callback
     * @param mixed[]  $values
     *
     * @throws \Throwable
     */
    public function values(callable $callback, iterable $values): void
    {
        $listOfValues = ResolvedValuesList::make();

        foreach ($values as $key => $value) {
            $input = $this->resolve($value);
            $listOfValues->set($key, $input);
        }

        if ($listOfValues->isEmpty()) {
            return;
        }

        call_user_func($callback, $listOfValues->getValues());
    }

    /**
     * Evalua un valor
     *
     * @param mixed $value
     *
     * @return \PlanB\DS\Resolver\Input
     *
     * @throws \Throwable
     */
    private function resolve($value): Input
    {
        $rules = $this->queueOfRules->toArray();
        $input = Input::make($value);

        foreach ($rules as $rule) {
            $input = $rule->execute($input);
        }

        $input = $this->applyTypeValidation($input);

        return $input;
    }

    /**
     * Nos aseguramos de que el valor añadido es del tipo correcto
     *
     * @param \PlanB\DS\Resolver\Input $input
     *
     * @return \PlanB\DS\Resolver\Input
     *
     * @throws \Throwable
     */
    private function applyTypeValidation(Input $input): Input
    {
        return Rule::make(function ($value, Input $input): void {
            if ($this->isValidType($value)) {
                return;
            }

            $beautifier = Beautifier::make();
            $input->reject('a %s was expected', $beautifier->type(Text::class));
        })->execute($input);
    }

    /**
     * Indica si un valor es del tipo correcto
     *
     * @param mixed $value
     *
     * @return bool
     */
    private function isValidType($value): bool
    {
        if ($this->type instanceof DataType) {
            return $this->type->isTheTypeOf($value);
        }

        return true;
    }
}
