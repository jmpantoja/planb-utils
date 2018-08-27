
                                                                                                                                            
    
# OptionList


> Lista de opciones
>
> 


## Traits
- PlanB\DS\ItemList\Traits\Accessors




## Properties
- items
- resolution


## Methods

### add



**OptionList::add**(mixed $value) : [ListInterface](../../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### addAll



**OptionList::addAll**([iterable](../../../../iterable.md) $items) : [$this](../../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../../iterable.md) |$items |  |

---


### clearAndAdd



**OptionList::clearAndAdd**([iterable](../../../../iterable.md) $items) : [$this](../../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../../iterable.md) |$items |  |

---


### set



**OptionList::set**(mixed $key, mixed $value) : [$this](../../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### setAll



**OptionList::setAll**([iterable](../../../../iterable.md) $items) : [$this](../../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../../iterable.md) |$items |  |

---


### clearAndSet



**OptionList::clearAndSet**([iterable](../../../../iterable.md) $items) : [$this](../../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../../iterable.md) |$items |  |

---


### get



**OptionList::get**(mixed $key, mixed|null $default = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed|null |$default |  |

---


### exists



**OptionList::exists**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### has



**OptionList::has**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### remove



**OptionList::remove**(mixed $key) : [ListInterface](../../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### clear



**OptionList::clear**() : [ListInterface](../../../../ListInterface.md)



---


### tryAddItem
Resuelve y añade un item


protected **OptionList::tryAddItem**([Item](../../../../Item.md) $item) : [ListInterface](../../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[Item](../../../../Item.md) |$item |  |

---


### __construct
TextList constructor.


protected **OptionList::__construct**() : 



---


### customize
Configura el comportamiento de  la lista


protected **OptionList::customize**() : void



---


### count
Devuelve el número total de elementos


**OptionList::count**() : int



---


### isEmpty
Indica si la lista está vacia


**OptionList::isEmpty**() : bool



---


### each
Ejecuta una acción para cada elemento de la lista


**OptionList::each**(callable $callable, mixed ...$userdata) : [ItemList](../../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### map
Devuelve el resultado de aplicar una acción a cada elemento de la lista
La lista original permanece inmutable

**OptionList::map**(callable $callable, mixed ...$userdata) : [ItemList](../../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### filter
Devuelve una lista con los elementos que cumplen un criterio


**OptionList::filter**(callable $callable, mixed ...$userdata) : [ItemList](../../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### search
Devuelve el primer elemento que cumpla con el criterio,
o nulo si no encuentra ninguno


**OptionList::search**(callable $callable, mixed ...$userdata) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### find
Devuelve el primer elemento que cumpla con el criterio,
o lanza una excepción si no encuentra ninguno


**OptionList::find**(callable $callable, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### reduce
Reduce una lista, a un unico valor


**OptionList::reduce**(callable $callable, mixed|null $initial = null, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed|null |$initial |  |
|mixed |...$userdata |  |

---


### toArray
Convierte la lista en un array de strings


**OptionList::toArray**(callable $callable = null, mixed ...$userdata) : mixed[]


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### getIterator
Retrieve an external iterator


**OptionList::getIterator**() : [Traversable](../../../../Traversable.md)



---


### jsonSerialize
Specify data which should be serialized to JSON


**OptionList::jsonSerialize**() : mixed



---


### toJson
Convierte el array en una cadena json


**OptionList::toJson**(int $options = 0, int $depth = 512) : string


|Parameters: | | |
| --- | --- | --- |
|int |$options |  |
|int |$depth |  |

---


### silentExceptions
Silencia las excepciones


**OptionList::silentExceptions**() : [ListInterface](../../../../ListInterface.md)



---


### throwException
Hook para lanzar una excepción personalizada


**OptionList::throwException**(callable $callback) : [ListInterface](../../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### addHydrator
Añade un hydrator


**OptionList::addHydrator**(string $type, callable $hydrator) : [ListInterface](../../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$hydrator |  |

---


### addValidator
Añade un validador


**OptionList::addValidator**(callable $validator, int $order = 1) : [ListInterface](../../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$order |  |

---


### addNormalizer
Añade un normalizador


**OptionList::addNormalizer**(callable $normalizer, int $order = 1) : [ListInterface](../../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$order |  |

---


### addKeyNormalizer
Añade un normalizador de clave


**OptionList::addKeyNormalizer**(callable $normalizer, int $order = 1) : [ListInterface](../../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$order |  |

---


### max
Devuelve el valor máximo
El valor a comparar se calcula con un callback


**OptionList::max**(callable $callback) : null


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### min
Devuelve el valor mínimo
El valor a comparar se calcula con un callback


**OptionList::min**(callable $callback) : null


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### create
Crea una instancia a partir de un conjunto de valores


static **OptionList::create**([iterable](../../../../iterable.md) $input = []) : [ListInterface](../../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../../iterable.md) |$input |  |

---


### getInnerType
Devuelve el tipo de la lista


**OptionList::getInnerType**() : null|string



---


### disallowBlank
Impide que se puedan añadir texto en blanco


**OptionList::disallowBlank**() : [TextList](../../../../TextList.md)



---


### disallowEmpty
Impide que se puedan añadir cadenas vacias


**OptionList::disallowEmpty**() : [TextList](../../../../TextList.md)



---


### concat
Concatena los textos


**OptionList::concat**(string $delimiter = Text::BLANK_TEXT) : [Text](../../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$delimiter |  |

---


### toAttributeFormat
Convierte la lista al formato de atributo


**OptionList::toAttributeFormat**(string $key) : string


|Parameters: | | |
| --- | --- | --- |
|string |$key |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                