
                                                                                                                                            
    
# PriorityQueueBuilder


> Builder para PriorityQueue
>
> 








## Methods

### make
AbstractBuilder named constructor.


static **PriorityQueueBuilder::make**() : [AbstractBuilder](../../../AbstractBuilder.md)



---


### __construct
AbstractBuilder constructor.


protected **PriorityQueueBuilder::__construct**() : 



---


### getInput
Devuelve el input


protected **PriorityQueueBuilder::getInput**() : mixed[]



---


### getResolver
Devuelve el resolver


protected **PriorityQueueBuilder::getResolver**() : [Resolver](../../../Resolver.md)



---


### type
Asigna un tipo a la colección


**PriorityQueueBuilder::type**(string $type) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### values
Asigna una colección de valores para incializar la colección


**PriorityQueueBuilder::values**([iterable](../../../iterable.md) $input) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### addFilter
Añade un filtro a la cola


**PriorityQueueBuilder::addFilter**(callable $filter, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$filter |  |
|int |$priority |  |

---


### addTypedFilter
Añade un filtro para un tipo determinado


**PriorityQueueBuilder::addTypedFilter**(string $type, callable $filter, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$filter |  |
|int |$priority |  |

---


### addConverter
Añade un converter


**PriorityQueueBuilder::addConverter**(string $type, callable $converter, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$converter |  |
|int |$priority |  |

---


### addValidator
Añade un validator


**PriorityQueueBuilder::addValidator**(callable $validator, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$priority |  |

---


### addTypedValidator
Añade un validator para un tipo determinado


**PriorityQueueBuilder::addTypedValidator**(string $type, callable $validator, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$validator |  |
|int |$priority |  |

---


### addNormalizer
Añade un normalizer


**PriorityQueueBuilder::addNormalizer**(callable $normalizer, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$priority |  |

---


### addTypedNormalizer
Añade un normalizer para un tipo determinado


**PriorityQueueBuilder::addTypedNormalizer**(string $type, callable $normalizer, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$normalizer |  |
|int |$priority |  |

---


### build
Crea el objeto


**PriorityQueueBuilder::build**() : mixed



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                