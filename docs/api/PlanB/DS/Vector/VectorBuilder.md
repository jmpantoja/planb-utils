
                                                                                                                                            
    
# VectorBuilder


> Builder para Vector
>
> 








## Methods

### make
AbstractBuilder named constructor.


static **VectorBuilder::make**() : [AbstractBuilder](../../../AbstractBuilder.md)



---


### typed
AbstractBuilder named constructor.


static **VectorBuilder::typed**(string $type) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### __construct
AbstractBuilder constructor.


protected **VectorBuilder::__construct**() : 



---


### getInput
Devuelve el input


protected **VectorBuilder::getInput**() : mixed[]



---


### getResolver
Devuelve el resolver


protected **VectorBuilder::getResolver**() : [Resolver](../../../Resolver.md)



---


### values
Asigna una colección de valores para incializar la colección


**VectorBuilder::values**([iterable](../../../iterable.md) $input) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### addFilter
Añade un filtro a la cola


**VectorBuilder::addFilter**(callable $filter, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$filter |  |
|int |$priority |  |

---


### addTypedFilter
Añade un filtro para un tipo determinado


**VectorBuilder::addTypedFilter**(string $type, callable $filter, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$filter |  |
|int |$priority |  |

---


### addConverter
Añade un converter


**VectorBuilder::addConverter**(string $type, callable $converter, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$converter |  |
|int |$priority |  |

---


### addValidator
Añade un validator


**VectorBuilder::addValidator**(callable $validator, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$priority |  |

---


### addTypedValidator
Añade un validator para un tipo determinado


**VectorBuilder::addTypedValidator**(string $type, callable $validator, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$validator |  |
|int |$priority |  |

---


### addNormalizer
Añade un normalizer


**VectorBuilder::addNormalizer**(callable $normalizer, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$priority |  |

---


### addTypedNormalizer
Añade un normalizer para un tipo determinado


**VectorBuilder::addTypedNormalizer**(string $type, callable $normalizer, int $priority = 0) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$normalizer |  |
|int |$priority |  |

---


### build



**VectorBuilder::build**() : mixed



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                