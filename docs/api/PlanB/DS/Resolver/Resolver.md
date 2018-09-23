
                                                                                                                                            
    
# Resolver


> Procesa un valor antes de ser añadido a una colección
>
> 




## Constants
- FILTERS
- CONVERTERS
- ENSURE_TYPE
- VALIDATORS
- NORMALIZERS




## Methods

### make
Resolver named constructor.


static **Resolver::make**(string $type = null) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### __construct
Resolver constructor.


protected **Resolver::__construct**(string $type = null) : 


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### setType
Asigna un tipo


**Resolver::setType**(string $type) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### getType
Devuelve el tipo del resolver


**Resolver::getType**() : null|string



---


### addFilter
Añade un filtro a la cola


**Resolver::addFilter**(callable $filter, int $priority = 0) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$filter |  |
|int |$priority |  |

---


### addTypedFilter
Añade un filtro para un tipo determinado


**Resolver::addTypedFilter**(string $type, callable $filter, int $priority = 0) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$filter |  |
|int |$priority |  |

---


### addConverter
Añade un converter


**Resolver::addConverter**(string $type, callable $converter, int $priority = 0) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$converter |  |
|int |$priority |  |

---


### addValidator
Añade un validator


**Resolver::addValidator**(callable $validator, int $priority = 0) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$priority |  |

---


### addTypedValidator
Añade un validator para un tipo determinado


**Resolver::addTypedValidator**(string $type, callable $validator, int $priority = 0) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$validator |  |
|int |$priority |  |

---


### addNormalizer
Añade un normalizer


**Resolver::addNormalizer**(callable $normalizer, int $priority = 0) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$priority |  |

---


### addTypedNormalizer
Añade un normalizer para un tipo determinado


**Resolver::addTypedNormalizer**(string $type, callable $normalizer, int $priority = 0) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$normalizer |  |
|int |$priority |  |

---


### resolve



**Resolver::resolve**($value) : 


|Parameters: | | |
| --- | --- | --- |
| |$value |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                