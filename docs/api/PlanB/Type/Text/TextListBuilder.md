
                                                                                                                                            
    
# TextListBuilder


> Builder para TextList
>
> 








## Methods

### make
AbstractBuilder named constructor.


static **TextListBuilder::make**() : [AbstractBuilder](../../../AbstractBuilder.md)



---


### __construct
AbstractBuilder constructor.


protected **TextListBuilder::__construct**() : 



---


### getInput
Devuelve el input


protected **TextListBuilder::getInput**() : mixed[]



---


### getResolver
Devuelve el resolver


protected **TextListBuilder::getResolver**() : [Resolver](../../../Resolver.md)



---


### type
Asigna un tipo a la colección


**TextListBuilder::type**(string $type) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

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
Crea el objeto


**TextListBuilder::build**() : mixed



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                