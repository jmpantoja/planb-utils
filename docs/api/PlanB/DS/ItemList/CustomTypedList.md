
                                                                                                                                            
    
# CustomTypedList


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



**CustomTypedList::addAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### clearAndAdd



**CustomTypedList::clearAndAdd**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### setAll



**CustomTypedList::setAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### clearAndSet



**CustomTypedList::clearAndSet**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### get



**CustomTypedList::get**(mixed $key, mixed|null $default = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed|null |$default |  |

---


### exists



**CustomTypedList::exists**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### has



**CustomTypedList::has**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### remove



**CustomTypedList::remove**(mixed $key) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### clear



**CustomTypedList::clear**() : [ListInterface](../../../ListInterface.md)



---


### trySet
Resuelve y añade una pareja clave / valor


protected **CustomTypedList::trySet**(mixed $key, mixed $value) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### tryAdd
Resuelve y añade un valor


protected **CustomTypedList::tryAdd**(mixed $value) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### tryAddItem
Resuelve y añade un item


protected **CustomTypedList::tryAddItem**([Item](../../../Item.md) $item) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[Item](../../../Item.md) |$item |  |

---


### __construct
CustomTypedListInterface constructor.


protected **CustomTypedList::__construct**() : 



---


### customize
Configura el comportamiento de  la lista


protected **CustomTypedList::customize**() : void



---


### count



**CustomTypedList::count**() : int



---


### isEmpty



**CustomTypedList::isEmpty**() : bool



---


### each



**CustomTypedList::each**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### map



**CustomTypedList::map**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### filter



**CustomTypedList::filter**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### search



**CustomTypedList::search**(callable $callable, mixed ...$userdata) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### find



**CustomTypedList::find**(callable $callable, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### reduce



**CustomTypedList::reduce**(callable $callable, mixed|null $initial = null, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed|null |$initial |  |
|mixed |...$userdata |  |

---


### toArray



**CustomTypedList::toArray**(callable $callable = null, mixed ...$userdata) : mixed[]


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### getIterator
Retrieve an external iterator


**CustomTypedList::getIterator**() : [Traversable](../../../Traversable.md)



---


### jsonSerialize
Specify data which should be serialized to JSON


**CustomTypedList::jsonSerialize**() : mixed



---


### toJson
Convierte el array en una cadena json


**CustomTypedList::toJson**(int $options = 0, int $depth = 512) : string


|Parameters: | | |
| --- | --- | --- |
|int |$options |  |
|int |$depth |  |

---


### silentExceptions
Silencia las excepciones


**CustomTypedList::silentExceptions**() : [ListInterface](../../../ListInterface.md)



---


### addHydrator
Añade un hydrator


**CustomTypedList::addHydrator**(string $type, callable $hydrator) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$hydrator |  |

---


### addValidator
Añade un validador


**CustomTypedList::addValidator**(callable $validator, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$order |  |

---


### addNormalizer
Añade un normalizador


**CustomTypedList::addNormalizer**(callable $normalizer, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$order |  |

---


### addKeyNormalizer
Añade un normalizador de clave


**CustomTypedList::addKeyNormalizer**(callable $normalizer, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$order |  |

---


### newInstance



protected **CustomTypedList::newInstance**() : [AbstractList](../../../AbstractList.md)



---


### create
Crea una instancia a partir de un conjunto de valores


static **CustomTypedList::create**([iterable](../../../iterable.md) $input = []) : [TypedList](../../../TypedList.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### getInnerType
Devuelve el tipo de la lista


abstract **CustomTypedList::getInnerType**() : null|string



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                