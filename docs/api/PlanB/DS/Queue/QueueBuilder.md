
                                                                                                                                            
    
# QueueBuilder


> Builder para Queue
>
> 








## Methods

### make
Named constructor.


static **QueueBuilder::make**() : mixed



---


### __construct
AbstractBuilder constructor.


protected **QueueBuilder::__construct**([Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInput
Devuelve el input


protected **QueueBuilder::getInput**() : mixed[]|[Traversable](../../../Traversable.md)



---


### getResolver
Devuelve el resolver


protected **QueueBuilder::getResolver**() : [Resolver](../../../Resolver.md)



---


### values
Asigna una colección de valores para incializar la colección


**QueueBuilder::values**([iterable](../../../iterable.md) $input) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### addFilter
Añade un filtro a la cola


**QueueBuilder::addFilter**(callable $filter, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$filter |  |
|int |$priority |  |

---


### addTypedFilter
Añade un filtro para un tipo determinado


**QueueBuilder::addTypedFilter**(string $type, callable $filter, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$filter |  |
|int |$priority |  |

---


### addConverter
Añade un converter


**QueueBuilder::addConverter**(string $type, callable $converter, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$converter |  |
|int |$priority |  |

---


### addValidator
Añade un validator


**QueueBuilder::addValidator**(callable $validator, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$priority |  |

---


### addTypedValidator
Añade un validator para un tipo determinado


**QueueBuilder::addTypedValidator**(string $type, callable $validator, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$validator |  |
|int |$priority |  |

---


### addNormalizer
Añade un normalizer


**QueueBuilder::addNormalizer**(callable $normalizer, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$priority |  |

---


### addTypedNormalizer
Añade un normalizer para un tipo determinado


**QueueBuilder::addTypedNormalizer**(string $type, callable $normalizer, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$normalizer |  |
|int |$priority |  |

---


### build
Crea el objeto


**QueueBuilder::build**() : mixed



---


### typed
Named constructor.


static **QueueBuilder::typed**(string $type) : [QueueBuilder](../../../QueueBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                