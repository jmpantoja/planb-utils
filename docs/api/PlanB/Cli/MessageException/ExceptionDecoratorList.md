
                                                                                                                                            
    
# ExceptionDecoratorList


> Lista de decoradores para el mensaje de excepción
>
> 


## Traits
- PlanB\DS\ItemList\Traits\Accessors




## Properties
- items
- resolution


## Methods

### add



**ExceptionDecoratorList::add**(mixed $value) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### addAll



**ExceptionDecoratorList::addAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### clearAndAdd



**ExceptionDecoratorList::clearAndAdd**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### set



**ExceptionDecoratorList::set**(mixed $key, mixed $value) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### setAll



**ExceptionDecoratorList::setAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### clearAndSet



**ExceptionDecoratorList::clearAndSet**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### get



**ExceptionDecoratorList::get**(mixed $key, mixed|null $default = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed|null |$default |  |

---


### exists



**ExceptionDecoratorList::exists**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### has



**ExceptionDecoratorList::has**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### remove



**ExceptionDecoratorList::remove**(mixed $key) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### clear



**ExceptionDecoratorList::clear**() : [ListInterface](../../../ListInterface.md)



---


### tryAddItem
Resuelve y añade un item


protected **ExceptionDecoratorList::tryAddItem**([Item](../../../Item.md) $item) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[Item](../../../Item.md) |$item |  |

---


### __construct
MessageExceptionDecorators constructor.


protected **ExceptionDecoratorList::__construct**() : 



---


### customize
Configura el comportamiento de  la lista


protected **ExceptionDecoratorList::customize**() : void



---


### count



**ExceptionDecoratorList::count**() : int



---


### isEmpty



**ExceptionDecoratorList::isEmpty**() : bool



---


### each



**ExceptionDecoratorList::each**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### map



**ExceptionDecoratorList::map**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### filter



**ExceptionDecoratorList::filter**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### search



**ExceptionDecoratorList::search**(callable $callable, mixed ...$userdata) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### find



**ExceptionDecoratorList::find**(callable $callable, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### reduce



**ExceptionDecoratorList::reduce**(callable $callable, mixed|null $initial = null, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed|null |$initial |  |
|mixed |...$userdata |  |

---


### toArray



**ExceptionDecoratorList::toArray**(callable $callable = null, mixed ...$userdata) : mixed[]


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### getIterator
Retrieve an external iterator


**ExceptionDecoratorList::getIterator**() : [Traversable](../../../Traversable.md)



---


### jsonSerialize
Specify data which should be serialized to JSON


**ExceptionDecoratorList::jsonSerialize**() : mixed



---


### toJson
Convierte el array en una cadena json


**ExceptionDecoratorList::toJson**(int $options = 0, int $depth = 512) : string


|Parameters: | | |
| --- | --- | --- |
|int |$options |  |
|int |$depth |  |

---


### silentExceptions
Silencia las excepciones


**ExceptionDecoratorList::silentExceptions**() : [ListInterface](../../../ListInterface.md)



---


### addHydrator
Añade un hydrator


**ExceptionDecoratorList::addHydrator**(string $type, callable $hydrator) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$hydrator |  |

---


### addValidator
Añade un validador


**ExceptionDecoratorList::addValidator**(callable $validator, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$order |  |

---


### addNormalizer
Añade un normalizador


**ExceptionDecoratorList::addNormalizer**(callable $normalizer, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$order |  |

---


### addKeyNormalizer
Añade un normalizador de clave


**ExceptionDecoratorList::addKeyNormalizer**(callable $normalizer, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$order |  |

---


### max
Devuelve el valor máximo
El valor a comparar se calcula con un callback


**ExceptionDecoratorList::max**(callable $callback) : null


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### min
Devuelve el valor mínimo
El valor a comparar se calcula con un callback


**ExceptionDecoratorList::min**(callable $callback) : null


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### create
MessageExceptionDecorators named constructor.


static **ExceptionDecoratorList::create**() : [ExceptionDecoratorList](../../../ExceptionDecoratorList.md)



---


### getInnerType
Devuelve el tipo de la lista


**ExceptionDecoratorList::getInnerType**() : null|string



---


### addTrace
Añade el decorador trace


**ExceptionDecoratorList::addTrace**() : 



---


### decorate



**ExceptionDecoratorList::decorate**([Message](../../../Message.md) $message, [Throwable](../../../Throwable.md) $exception) : [Message](../../../Message.md)


|Parameters: | | |
| --- | --- | --- |
|[Message](../../../Message.md) |$message |  |
|[Throwable](../../../Throwable.md) |$exception |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                