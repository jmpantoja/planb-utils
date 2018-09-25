
                                                                                                                                            
    
# TextListBuilder


> Builder para TextList
>
> 








## Methods

### make
Named constructor.


static **TextListBuilder::make**() : mixed



---


### __construct
AbstractBuilder constructor.


protected **TextListBuilder::__construct**([Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInput
Devuelve el input


protected **TextListBuilder::getInput**() : mixed[]|[Traversable](../../../Traversable.md)



---


### getResolver
Devuelve el resolver


protected **TextListBuilder::getResolver**() : [Resolver](../../../Resolver.md)



---


### values
Asigna una colección de valores para incializar la colección


**TextListBuilder::values**([iterable](../../../iterable.md) $input) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### addFilter
Añade un filtro a la cola


**TextListBuilder::addFilter**(callable $filter, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$filter |  |
|int |$priority |  |

---


### addTypedFilter
Añade un filtro para un tipo determinado


**TextListBuilder::addTypedFilter**(string $type, callable $filter, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$filter |  |
|int |$priority |  |

---


### addConverter
Añade un converter


**TextListBuilder::addConverter**(string $type, callable $converter, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$converter |  |
|int |$priority |  |

---


### addValidator
Añade un validator


**TextListBuilder::addValidator**(callable $validator, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$priority |  |

---


### addTypedValidator
Añade un validator para un tipo determinado


**TextListBuilder::addTypedValidator**(string $type, callable $validator, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$validator |  |
|int |$priority |  |

---


### addNormalizer
Añade un normalizer


**TextListBuilder::addNormalizer**(callable $normalizer, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$priority |  |

---


### addTypedNormalizer
Añade un normalizer para un tipo determinado


**TextListBuilder::addTypedNormalizer**(string $type, callable $normalizer, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$normalizer |  |
|int |$priority |  |

---


### build
Crea la colección de textos por defecto


**TextListBuilder::build**() : mixed



---


### vector
Crea un TextVector


**TextListBuilder::vector**() : [TextVector](../../../TextVector.md)



---


### deque
Crea un deque


**TextListBuilder::deque**() : [TextDeque](../../../TextDeque.md)



---


### stack
Crea un stack


**TextListBuilder::stack**() : [TextStack](../../../TextStack.md)



---


### queue
Crea un queue


**TextListBuilder::queue**() : [TextQueue](../../../TextQueue.md)



---


### priorityQueue
Crea un prioriy queue


**TextListBuilder::priorityQueue**() : [TextPriorityQueue](../../../TextPriorityQueue.md)



---


### map
Crea un map


**TextListBuilder::map**() : [TextMap](../../../TextMap.md)



---


### set
Crea un set


**TextListBuilder::set**() : [TextSet](../../../TextSet.md)



---


### ignoreBlank
Añade un filtro que ignora los textos en blanco


**TextListBuilder::ignoreBlank**() : [$this](../../../$this.md)



---


### ignoreEmpty
Añade un filtro que ignora los textos vacios


**TextListBuilder::ignoreEmpty**() : [$this](../../../$this.md)



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                