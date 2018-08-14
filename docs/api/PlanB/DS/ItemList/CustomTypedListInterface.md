
                                                                                                                                            
    
# CustomTypedListInterface


> Una lista donde sus elementos son del mismo tipo
>
> 


## Traits
- PlanB\DS\ItemList\Traits\Accessors




## Properties
- items
- resolution


## Methods

### addAll



**CustomTypedListInterface::addAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### clearAndAdd



**CustomTypedListInterface::clearAndAdd**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### setAll



**CustomTypedListInterface::setAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### clearAndSet



**CustomTypedListInterface::clearAndSet**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### get



**CustomTypedListInterface::get**(mixed $key, mixed|null $default = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed|null |$default |  |

---


### exists



**CustomTypedListInterface::exists**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### has



**CustomTypedListInterface::has**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### remove



**CustomTypedListInterface::remove**(mixed $key) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### clear



**CustomTypedListInterface::clear**() : [ListInterface](../../../ListInterface.md)



---


### trySet
Resuelve y añade una pareja clave / valor


protected **CustomTypedListInterface::trySet**(mixed $key, mixed $value) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### tryAdd
Resuelve y añade un valor


protected **CustomTypedListInterface::tryAdd**(mixed $value) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### tryAddItem
Resuelve y añade un item


protected **CustomTypedListInterface::tryAddItem**([Item](../../../Item.md) $item) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[Item](../../../Item.md) |$item |  |

---


### __construct
CustomTypedListInterface constructor.


protected **CustomTypedListInterface::__construct**() : 



---


### customize
Configura el comportamiento de  la lista


protected **CustomTypedListInterface::customize**() : void



---


### count
Devuelve el número total de elementos


**CustomTypedListInterface::count**() : int



---


### isEmpty
Indica si la lista está vacia


**CustomTypedListInterface::isEmpty**() : bool



---


### each
Ejecuta una acción para cada elemento de la lista


**CustomTypedListInterface::each**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### map
Devuelve el resultado de aplicar una acción a cada elemento de la lista
La lista original permanece inmutable

**CustomTypedListInterface::map**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### filter
Devuelve una lista con los elementos que cumplen un criterio


**CustomTypedListInterface::filter**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### search
Devuelve el primer elemento que cumpla con el criterio,
o nulo si no encuentra ninguno


**CustomTypedListInterface::search**(callable $callable, mixed ...$userdata) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### find
Devuelve el primer elemento que cumpla con el criterio,
o lanza una excepción si no encuentra ninguno


**CustomTypedListInterface::find**(callable $callable, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### reduce
Reduce una lista, a un unico valor


**CustomTypedListInterface::reduce**(callable $callable, mixed|null $initial = null, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed|null |$initial |  |
|mixed |...$userdata |  |

---


### toArray
Devuelve un array con los elementos de la lista


**CustomTypedListInterface::toArray**(callable $callable = null, mixed ...$userdata) : mixed[]


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### getIterator
Retrieve an external iterator


**CustomTypedListInterface::getIterator**() : [Traversable](../../../Traversable.md)



---


### jsonSerialize
Specify data which should be serialized to JSON


**CustomTypedListInterface::jsonSerialize**() : mixed



---


### toJson
Convierte el array en una cadena json


**CustomTypedListInterface::toJson**(int $options = 0, int $depth = 512) : string


|Parameters: | | |
| --- | --- | --- |
|int |$options |  |
|int |$depth |  |

---


### silentExceptions
Silencia las excepciones


**CustomTypedListInterface::silentExceptions**() : [ListInterface](../../../ListInterface.md)



---


### addHydrator
Añade un hydrator


**CustomTypedListInterface::addHydrator**(string $type, callable $hydrator) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$hydrator |  |

---


### addValidator
Añade un validador


**CustomTypedListInterface::addValidator**(callable $validator, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$order |  |

---


### addNormalizer
Añade un normalizador


**CustomTypedListInterface::addNormalizer**(callable $normalizer, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$order |  |

---


### addKeyNormalizer
Añade un normalizador de clave


**CustomTypedListInterface::addKeyNormalizer**(callable $normalizer, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$order |  |

---


### create
Crea una instancia a partir de un conjunto de valores


static **CustomTypedListInterface::create**([iterable](../../../iterable.md) $input = []) : [TypedList](../../../TypedList.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### getInnerType
Devuelve el tipo de la lista


abstract **CustomTypedListInterface::getInnerType**() : null|string



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                