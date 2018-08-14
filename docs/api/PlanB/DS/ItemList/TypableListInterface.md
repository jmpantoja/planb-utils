
                                                                                                                                            
    
# TypableListInterface


> Listas con los elementos del mismo tipo
>
> 








## Methods

### addAll
Agrega un conjunto de items sin clave


**TypableListInterface::addAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### clearAndAdd
Elimina todos los elemntos de la lista  y
agrega un nuevo conjunto de Items sin clave


**TypableListInterface::clearAndAdd**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### setAll
Agrega un conjunto de Items con clave


**TypableListInterface::setAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### clearAndSet
Elimina todos los elemntos de la lista  y
agrega un nuevo conjunto de Items con clave


**TypableListInterface::clearAndSet**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### get
Devuelve un elemento


**TypableListInterface::get**(mixed $key, mixed|null $default = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed|null |$default |  |

---


### exists
Indica si un elemento existe


**TypableListInterface::exists**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### has
exists alias


**TypableListInterface::has**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### remove
Elimina un elemento


**TypableListInterface::remove**(mixed $key) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### clear
Elimina todos los elementos de la lista


**TypableListInterface::clear**() : [ListInterface](../../../ListInterface.md)



---


### count
Devuelve el número total de elementos


**TypableListInterface::count**() : int



---


### isEmpty
Indica si la lista está vacia


**TypableListInterface::isEmpty**() : bool



---


### each
Ejecuta una acción para cada elemento de la lista


**TypableListInterface::each**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### map
Devuelve el resultado de aplicar una acción a cada elemento de la lista
La lista original permanece inmutable

**TypableListInterface::map**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### filter
Devuelve una lista con los elementos que cumplen un criterio


**TypableListInterface::filter**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### search
Devuelve el primer elemento que cumpla con el criterio,
o nulo si no encuentra ninguno


**TypableListInterface::search**(callable $callable, mixed ...$userdata) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### find
Devuelve el primer elemento que cumpla con el criterio,
o lanza una excepción si no encuentra ninguno


**TypableListInterface::find**(callable $callable, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### reduce
Reduce una lista, a un unico valor


**TypableListInterface::reduce**(callable $callable, mixed|null $initial = null, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed|null |$initial |  |
|mixed |...$userdata |  |

---


### toArray
Devuelve un array con los elementos de la lista


**TypableListInterface::toArray**(callable $callable = null, mixed ...$userdata) : mixed[]


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### getIterator
Retrieve an external iterator


**TypableListInterface::getIterator**() : [Traversable](../../../Traversable.md)



---


### jsonSerialize
Specify data which should be serialized to JSON


**TypableListInterface::jsonSerialize**() : mixed



---


### toJson
Convierte el array en una cadena json


**TypableListInterface::toJson**(int $options = 0, int $depth = 512) : string


|Parameters: | | |
| --- | --- | --- |
|int |$options |  |
|int |$depth |  |

---


### silentExceptions
Silencia las excepciones


**TypableListInterface::silentExceptions**() : [ListInterface](../../../ListInterface.md)



---


### addHydrator
Añade un hydrator


**TypableListInterface::addHydrator**(string $type, callable $hydrator) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$hydrator |  |

---


### addValidator
Añade un validador


**TypableListInterface::addValidator**(callable $validator, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$order |  |

---


### addNormalizer
Añade un normalizador


**TypableListInterface::addNormalizer**(callable $normalizer, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$order |  |

---


### addKeyNormalizer
Añade un normalizador de clave


**TypableListInterface::addKeyNormalizer**(callable $validator, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$order |  |

---


### getInnerType
Devuelve el tipo de la lista


**TypableListInterface::getInnerType**() : null|string



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                