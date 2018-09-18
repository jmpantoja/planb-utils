
                                                                                                                                            
    
# TraitResolver


> Métodos asociados con la interfaz resolvable
>
> 






## Properties
- items


## Methods

### make



static **TraitResolver::make**([iterable](../../../iterable.md) $input = []) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### typed



static **TraitResolver::typed**(string $type, [iterable](../../../iterable.md) $input = []) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|[iterable](../../../iterable.md) |$input |  |

---


### like



static **TraitResolver::like**([iterable](../../../iterable.md) $input = []) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### __construct



protected **TraitResolver::__construct**([iterable](../../../iterable.md) $input = [], [Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**TraitResolver::getInnerType**() : null|string



---


### makeInternal
Crea la estructura de datos interna


abstract protected **TraitResolver::makeInternal**([iterable](../../../iterable.md) $input) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### duplicate
Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver


protected **TraitResolver::duplicate**([iterable](../../../iterable.md) $input = []) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### bind
Asocia un nuevo resolver


**TraitResolver::bind**([Resolver](../../../Resolver.md) $resolver) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### addFilter
Añade un filtro a la cola


**TraitResolver::addFilter**(callable $filter, int $priority = 0) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$filter |  |
|int |$priority |  |

---


### addTypedFilter
Añade un filtro para un tipo determinado


**TraitResolver::addTypedFilter**(string $type, callable $filter, int $priority = 0) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$filter |  |
|int |$priority |  |

---


### addConverter
Añade un converter


**TraitResolver::addConverter**(string $type, callable $converter, int $priority = 0) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$converter |  |
|int |$priority |  |

---


### addValidator
Añade un validator


**TraitResolver::addValidator**(callable $validator, int $priority = 0) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$priority |  |

---


### addTypedValidator
Añade un validator para un tipo determinado


**TraitResolver::addTypedValidator**(string $type, callable $validator, int $priority = 0) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$validator |  |
|int |$priority |  |

---


### addNormalizer
Añade un normalizer


**TraitResolver::addNormalizer**(callable $normalizer, int $priority = 0) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$priority |  |

---


### addTypedNormalizer
Añade un normalizer para un tipo determinado


**TraitResolver::addTypedNormalizer**(string $type, callable $normalizer, int $priority = 0) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$normalizer |  |
|int |$priority |  |

---


### preventChangesOnFullyCollection
Lanza una excepción si se trata de modificar el resolver de  una colección que no está vacia


protected **TraitResolver::preventChangesOnFullyCollection**() : 



---


### hook
Resuelve los valores antes de ser añadidos desde algun método


protected **TraitResolver::hook**(callable $callback, mixed ...$values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|mixed |...$values |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                