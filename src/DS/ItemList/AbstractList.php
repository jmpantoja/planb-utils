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

namespace PlanB\DS\ItemList;

use PlanB\DS\ItemList\Exception\ItemNotFoundException;
use PlanB\DS\ItemList\Resolver\CustomKeyNormalizer;
use PlanB\DS\ItemList\Resolver\CustomNormalizer;
use PlanB\DS\ItemList\Resolver\CustomValidator;
use PlanB\DS\ItemList\Resolver\Hydrator;
use PlanB\DS\ItemList\Resolver\KeyNormalizer;
use PlanB\DS\ItemList\Resolver\Normalizer;
use PlanB\DS\ItemList\Resolver\Resolution;
use PlanB\DS\ItemList\Resolver\Validator;
use PlanB\DS\TypedList\LazyList;

/**
 * Generic Collection
 *
 * @author Jose Manuel Pantoja <jmpantoja@gmail.com>
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
abstract class AbstractList implements ListInterface
{

    use Traits\Accessors;

    /**
     * @var mixed[]
     */
    protected $items = [];

    /**
     * @var \PlanB\DS\ItemList\Resolver\Resolution
     */
    protected $resolution;


    /**
     * List constructor.
     */
    protected function __construct()
    {
        $this->items = [];
        $this->resolution = Resolution::create($this);

        $this->customize();
    }

    /**
     * Configura el comportamiento de  la lista
     *
     * @return void
     */
    protected function customize(): void
    {
    }

    /**
     * @inheritdoc
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @inheritdoc
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return 0 === $this->count();
    }

    /**
     * @inheritdoc
     *
     * @param callable $callable
     * @param mixed ...$userdata
     *
     * @return \PlanB\DS\ItemList\ItemList
     */
    public function each(callable $callable, ...$userdata): ListInterface
    {
        foreach ($this->items as $key => $value) {
            $callable($value, $key, ...$userdata);
        }

        return $this;
    }


    /**
     * @inheritdoc
     *
     * @param callable $callable
     * @param mixed ...$userdata
     *
     * @return \PlanB\DS\ItemList\ItemList
     */
    public function map(callable $callable, ...$userdata): ListInterface
    {

        if ($this->isEmpty()) {
            return clone $this;
        }

        $mapped = LazyList::create($this);

        foreach ($this->items as $key => $value) {
            $item = $callable($value, $key, ...$userdata);
            $mapped->set($key, $item);
        }

        return $mapped->getInnerList();
    }


    /**
     * @inheritdoc
     *
     * @param callable $callable
     * @param mixed ...$userdata
     *
     * @return \PlanB\DS\ItemList\ItemList
     */
    public function filter(callable $callable, ...$userdata): ListInterface
    {

        $filtered = new static();
        foreach ($this->items as $key => $value) {
            if (!$callable($value, $key, ...$userdata)) {
                continue;
            }

            $filtered->set($key, $value);
        }

        return $filtered;
    }

    /**
     * @inheritdoc
     *
     * @param callable $callable
     * @param mixed ...$userdata
     *
     * @return mixed|null
     */
    public function search(callable $callable, ...$userdata)
    {

        foreach ($this->items as $key => $value) {
            if ($callable($value, $key, ...$userdata)) {
                return $value;
            }
        }
    }

    /**
     * @inheritdoc
     *
     * @param callable $callable
     * @param mixed ...$userdata
     *
     * @return mixed
     */
    public function find(callable $callable, ...$userdata)
    {
        foreach ($this->items as $key => $value) {
            if ($callable($value, $key, ...$userdata)) {
                return $value;
            }
        }

        throw ItemNotFoundException::forCondition();
    }

    /**
     * @inheritdoc
     *
     * @param callable $callable
     * @param mixed|null $initial
     * @param mixed ...$userdata
     *
     * @return mixed
     */
    public function reduce(callable $callable, $initial = null, ...$userdata)
    {
        foreach ($this->items as $value) {
            $initial = $callable($value, $initial, ...$userdata);
        }

        return $initial;
    }

    /**
     * @inheritdoc
     *
     * @param callable|null $callable
     * @param mixed ...$userdata
     *
     * @return mixed[]
     */
    public function toArray(?callable $callable = null, ...$userdata): array
    {
        if (!is_callable($callable)) {
            return $this->items;
        }

        $map = [];
        foreach ($this->items as $key => $value) {
            $map[] = $callable($value, $key, ...$userdata);
        }

        return $map;
    }

    /**
     * Retrieve an external iterator
     *
     * @return \Traversable An instance of an object implementing <b>Iterator</b> or
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->items);
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @return mixed data which can be serialized by <b>json_encode</b>,
     */
    public function jsonSerialize()
    {
        return $this->items;
    }

    /**
     * Convierte el array en una cadena json
     *
     * @param int $options [optional] <p>
     *
     *                     Bitmask consisting of <b>JSON_HEX_QUOT</b>,
     *                     <b>JSON_HEX_TAG</b>,
     *                     <b>JSON_HEX_AMP</b>,
     *                     <b>JSON_HEX_APOS</b>,
     *                     <b>JSON_NUMERIC_CHECK</b>,
     *                     <b>JSON_PRETTY_PRINT</b>,
     *                     <b>JSON_UNESCAPED_SLASHES</b>,
     *                     <b>JSON_FORCE_OBJECT</b>,
     *                     <b>JSON_UNESCAPED_UNICODE</b>. The behaviour of these
     *                     constants is described on
     *                     the JSON constants page.
     *                     </p>
     * @param int $depth   [optional] <p>
     *                     Set the
     *                     maximum depth.
     *                     Must be
     *                     greater than
     *                     zero.
     *
     * @return string
     */
    public function toJson(int $options = 0, int $depth = 512): string
    {
        return json_encode($this, $options, $depth);
    }

    /**
     * Silencia las excepciones
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function silentExceptions(): ListInterface
    {
        $this->resolution->silentExceptions();

        return $this;
    }

    /**
     * Hook para lanzar una excepción personalizada
     *
     * @param callable $callback
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function throwException(callable $callback): ListInterface
    {
        $this->resolution->throwException($callback);

        return $this;
    }


    /**
     * Añade un hydrator
     *
     * @param string   $type
     * @param callable $hydrator
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function addHydrator(string $type, callable $hydrator): ListInterface
    {

        if (!($hydrator instanceof Hydrator)) {
            $hydrator = Hydrator::create($type, $hydrator);
        }

        $this->resolution->add($hydrator, -PHP_INT_MAX);

        return $this;
    }

    /**
     * Añade un validador
     *
     * @param callable $validator
     * @param int      $order
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function addValidator(callable $validator, int $order = 1): ListInterface
    {
        if (!($validator instanceof Validator)) {
            $validator = CustomValidator::create($validator);
        }

        $this->resolution->add($validator, $order);

        return $this;
    }

    /**
     * Añade un normalizador
     *
     * @param callable $normalizer
     * @param int      $order
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function addNormalizer(callable $normalizer, int $order = 1): ListInterface
    {
        if (!($normalizer instanceof Normalizer)) {
            $normalizer = CustomNormalizer::create($normalizer);
        }

        $this->resolution->add($normalizer, $order);

        return $this;
    }


    /**
     * Añade un normalizador de clave
     *
     * @param callable $normalizer
     * @param int      $order
     *
     * @return \PlanB\DS\ItemList\ListInterface
     */
    public function addKeyNormalizer(callable $normalizer, int $order = 1): ListInterface
    {
        if (!($normalizer instanceof KeyNormalizer)) {
            $normalizer = CustomKeyNormalizer::create($normalizer);
        }

        $this->resolution->add($normalizer, $order);

        return $this;
    }

    public function __debugInfo()
    {
        return $this->items;
    }
}
