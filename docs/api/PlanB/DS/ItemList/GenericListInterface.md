
                                                                                                                                            
    
# GenericListInterface


> Representa a un conjunto de elementos sin tipo definido que cumplen una serie de normas
>
> 








## Methods

### addAll
Agrega un conjunto de items sin clave


**GenericListInterface::addAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### clearAndAdd
Elimina todos los elemntos de la lista  y
agrega un nuevo conjunto de Items sin clave


**GenericListInterface::clearAndAdd**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### setAll
Agrega un conjunto de Items con clave


**GenericListInterface::setAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### clearAndSet
Elimina todos los elemntos de la lista  y
agrega un nuevo conjunto de Items con clave


**GenericListInterface::clearAndSet**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### get
Devuelve un elemento


**GenericListInterface::get**(mixed $key, mixed|null $default = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed|null |$default |  |

---


### exists
Indica si un elemento existe


**GenericListInterface::exists**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### has
exists alias


**GenericListInterface::has**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### remove
Elimina un elemento


**GenericListInterface::remove**(mixed $key) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### clear
Elimina todos los elementos de la lista


**GenericListInterface::clear**() : [ListInterface](../../../ListInterface.md)



---


### count
Devuelve el número total de elementos


**GenericListInterface::count**() : int



---


### isEmpty
Indica si la lista está vacia


**GenericListInterface::isEmpty**() : bool



---


### each
Ejecuta una acción para cada elemento de la lista


**GenericListInterface::each**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### map
Devuelve el resultado de aplicar una acción a cada elemento de la lista
La lista original permanece inmutable

**GenericListInterface::map**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### filter
Devuelve una lista con los elementos que cumplen un criterio


**GenericListInterface::filter**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### search
Devuelve el primer elemento que cumpla con el criterio,
o nulo si no encuentra ninguno


**GenericListInterface::search**(callable $callable, mixed ...$userdata) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### find
Devuelve el primer elemento que cumpla con el criterio,
o lanza una excepción si no encuentra ninguno


**GenericListInterface::find**(callable $callable, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### reduce
Reduce una lista, a un unico valor


**GenericListInterface::reduce**(callable $callable, mixed|null $initial = null, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed|null |$initial |  |
|mixed |...$userdata |  |

---


### toArray
Devuelve un array con los elementos de la lista


**GenericListInterface::toArray**(callable $callable = null, mixed ...$userdata) : mixed[]


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### getIterator
Retrieve an external iterator


**GenericListInterface::getIterator**() : [Traversable](../../../Traversable.md)



---


### jsonSerialize
Specify data which should be serialized to JSON


**GenericListInterface::jsonSerialize**() : mixed



---


### toJson
Convierte el array en una cadena json


**GenericListInterface::toJson**(int $options = 0, int $depth = 512) : string


|Parameters: | | |
| --- | --- | --- |
|int |$options |  |
|int |$depth |  |

---


### silentExceptions
Silencia las excepciones


**GenericListInterface::silentExceptions**() : [ListInterface](../../../ListInterface.md)



---


### addHydrator
Añade un hydrator


**GenericListInterface::addHydrator**(string $type, callable $hydrator) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$hydrator |  |

---


### addValidator
Añade un validador


**GenericListInterface::addValidator**(callable $validator, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$order |  |

---


### addNormalizer
Añade un normalizador


**GenericListInterface::addNormalizer**(callable $normalizer, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$order |  |

---


### addKeyNormalizer
Añade un normalizador de clave


**GenericListInterface::addKeyNormalizer**(callable $validator, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$order |  |

---


### add
Agrega un nuevo item a la lista, sin clave


**GenericListInterface::add**(mixed $value) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### set
Agrega un nuevo Item a la lista, con clave


**GenericListInterface::set**(mixed $key, mixed $value) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                