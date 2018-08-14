
                                                                                                                                            
    
# ItemList


> Generic Collection
>
> 


## Traits
- PlanB\DS\ItemList\Traits\Accessors




## Properties
- items
- resolution


## Methods

### add



**ItemList::add**(mixed $value) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### addAll



**ItemList::addAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### clearAndAdd



**ItemList::clearAndAdd**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### set



**ItemList::set**(mixed $key, mixed $value) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### setAll



**ItemList::setAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### clearAndSet



**ItemList::clearAndSet**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### get



**ItemList::get**(mixed $key, mixed|null $default = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed|null |$default |  |

---


### exists



**ItemList::exists**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### has



**ItemList::has**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### remove



**ItemList::remove**(mixed $key) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### clear



**ItemList::clear**() : [ListInterface](../../../ListInterface.md)



---


### tryAddItem
Resuelve y añade un item


protected **ItemList::tryAddItem**([Item](../../../Item.md) $item) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[Item](../../../Item.md) |$item |  |

---


### __construct
List constructor.


protected **ItemList::__construct**() : 



---


### customize
Configura el comportamiento de  la lista


protected **ItemList::customize**() : void



---


### count



**ItemList::count**() : int



---


### isEmpty



**ItemList::isEmpty**() : bool



---


### each



**ItemList::each**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### map



**ItemList::map**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### filter



**ItemList::filter**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### search



**ItemList::search**(callable $callable, mixed ...$userdata) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### find



**ItemList::find**(callable $callable, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### reduce



**ItemList::reduce**(callable $callable, mixed|null $initial = null, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed|null |$initial |  |
|mixed |...$userdata |  |

---


### toArray



**ItemList::toArray**(callable $callable = null, mixed ...$userdata) : mixed[]


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### getIterator
Retrieve an external iterator


**ItemList::getIterator**() : [Traversable](../../../Traversable.md)



---


### jsonSerialize
Specify data which should be serialized to JSON


**ItemList::jsonSerialize**() : mixed



---


### toJson
Convierte el array en una cadena json


**ItemList::toJson**(int $options = 0, int $depth = 512) : string


|Parameters: | | |
| --- | --- | --- |
|int |$options |  |
|int |$depth |  |

---


### silentExceptions
Silencia las excepciones


**ItemList::silentExceptions**() : [ListInterface](../../../ListInterface.md)



---


### addHydrator
Añade un hydrator


**ItemList::addHydrator**(string $type, callable $hydrator) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$hydrator |  |

---


### addValidator
Añade un validador


**ItemList::addValidator**(callable $validator, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$order |  |

---


### addNormalizer
Añade un normalizador


**ItemList::addNormalizer**(callable $normalizer, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$order |  |

---


### addKeyNormalizer
Añade un normalizador de clave


**ItemList::addKeyNormalizer**(callable $normalizer, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$order |  |

---


### create
Crea una instancia a partir de un conjunto de valores


static **ItemList::create**([iterable](../../../iterable.md) $input = []) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                