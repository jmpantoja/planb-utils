
                                                                                                                                            
    
# AbstractBuilder


> Clase Base para Builders
>
> 








## Methods

### make
AbstractBuilder named constructor.


static **AbstractBuilder::make**() : [AbstractBuilder](../../AbstractBuilder.md)



---


### typed
AbstractBuilder named constructor.


static **AbstractBuilder::typed**(string $type) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### __construct
AbstractBuilder constructor.


protected **AbstractBuilder::__construct**() : 



---


### getInput
Devuelve el input


protected **AbstractBuilder::getInput**() : mixed[]|[Traversable](../../Traversable.md)



---


### getResolver
Devuelve el resolver


protected **AbstractBuilder::getResolver**() : [Resolver](../../Resolver.md)



---


### values
Asigna una colección de valores para incializar la colección


**AbstractBuilder::values**([iterable](../../iterable.md) $input) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../iterable.md) |$input |  |

---


### addFilter
Añade un filtro a la cola


**AbstractBuilder::addFilter**(callable $filter, int $priority = 0) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$filter |  |
|int |$priority |  |

---


### addTypedFilter
Añade un filtro para un tipo determinado


**AbstractBuilder::addTypedFilter**(string $type, callable $filter, int $priority = 0) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$filter |  |
|int |$priority |  |

---


### addConverter
Añade un converter


**AbstractBuilder::addConverter**(string $type, callable $converter, int $priority = 0) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$converter |  |
|int |$priority |  |

---


### addValidator
Añade un validator


**AbstractBuilder::addValidator**(callable $validator, int $priority = 0) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$priority |  |

---


### addTypedValidator
Añade un validator para un tipo determinado


**AbstractBuilder::addTypedValidator**(string $type, callable $validator, int $priority = 0) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$validator |  |
|int |$priority |  |

---


### addNormalizer
Añade un normalizer


**AbstractBuilder::addNormalizer**(callable $normalizer, int $priority = 0) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$priority |  |

---


### addTypedNormalizer
Añade un normalizer para un tipo determinado


**AbstractBuilder::addTypedNormalizer**(string $type, callable $normalizer, int $priority = 0) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$normalizer |  |
|int |$priority |  |

---


### build
Crea el objeto


abstract **AbstractBuilder::build**() : mixed



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                