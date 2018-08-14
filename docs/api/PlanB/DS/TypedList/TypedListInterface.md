
                                                                                                                                            
    
# TypedListInterface


> Intefaz para listas donde todos los elementos son del mismo tipo
>
> 








## Methods

### add



**TypedListInterface::add**(mixed $value) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### addAll
Agrega un conjunto de items sin clave


**TypedListInterface::addAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### clearAndAdd
Elimina todos los elemntos de la lista  y
agrega un nuevo conjunto de Items sin clave


**TypedListInterface::clearAndAdd**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### set



**TypedListInterface::set**(mixed $key, mixed $value) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### setAll
Agrega un conjunto de Items con clave


**TypedListInterface::setAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### clearAndSet
Elimina todos los elemntos de la lista  y
agrega un nuevo conjunto de Items con clave


**TypedListInterface::clearAndSet**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### get
Devuelve un elemento


**TypedListInterface::get**(mixed $key, mixed|null $default = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed|null |$default |  |

---


### exists
Indica si un elemento existe


**TypedListInterface::exists**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### has
exists alias


**TypedListInterface::has**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### remove
Elimina un elemento


**TypedListInterface::remove**(mixed $key) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### clear
Elimina todos los elementos de la lista


**TypedListInterface::clear**() : [ListInterface](../../../ListInterface.md)



---


### count
Devuelve el número total de elementos


**TypedListInterface::count**() : int



---


### isEmpty
Indica si la lista está vacia


**TypedListInterface::isEmpty**() : bool



---


### each
Ejecuta una acción para cada elemento de la lista


**TypedListInterface::each**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### map
Devuelve el resultado de aplicar una acción a cada elemento de la lista
La lista original permanece inmutable

**TypedListInterface::map**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### filter
Devuelve una lista con los elementos que cumplen un criterio


**TypedListInterface::filter**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### search
Devuelve el primer elemento que cumpla con el criterio,
o nulo si no encuentra ninguno


**TypedListInterface::search**(callable $callable, mixed ...$userdata) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### find
Devuelve el primer elemento que cumpla con el criterio,
o lanza una excepción si no encuentra ninguno


**TypedListInterface::find**(callable $callable, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### reduce
Reduce una lista, a un unico valor


**TypedListInterface::reduce**(callable $callable, mixed|null $initial = null, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed|null |$initial |  |
|mixed |...$userdata |  |

---


### toArray
Devuelve un array con los elementos de la lista


**TypedListInterface::toArray**(callable $callable = null, mixed ...$userdata) : mixed[]


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### getIterator
Retrieve an external iterator


**TypedListInterface::getIterator**() : [Traversable](../../../Traversable.md)



---


### jsonSerialize
Specify data which should be serialized to JSON


**TypedListInterface::jsonSerialize**() : mixed



---


### toJson
Convierte el array en una cadena json


**TypedListInterface::toJson**(int $options = 0, int $depth = 512) : string


|Parameters: | | |
| --- | --- | --- |
|int |$options |  |
|int |$depth |  |

---


### silentExceptions
Silencia las excepciones


**TypedListInterface::silentExceptions**() : [ListInterface](../../../ListInterface.md)



---


### addHydrator
Añade un hydrator


**TypedListInterface::addHydrator**(string $type, callable $hydrator) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$hydrator |  |

---


### addValidator
Añade un validador


**TypedListInterface::addValidator**(callable $validator, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$order |  |

---


### addNormalizer
Añade un normalizador


**TypedListInterface::addNormalizer**(callable $normalizer, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$order |  |

---


### addKeyNormalizer
Añade un normalizador de clave


**TypedListInterface::addKeyNormalizer**(callable $validator, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$order |  |

---


### getInnerType
Devuelve el tipo de la lista


**TypedListInterface::getInnerType**() : null|string



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                