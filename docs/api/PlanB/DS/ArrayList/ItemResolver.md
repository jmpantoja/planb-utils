
                                                                                                                                            
    
# ItemResolver


> Procesa una pareja clave/valor antes de ser añadida a la colección
>
> 








## Methods

### __construct
ItemResolver constructor.


**ItemResolver::__construct**() : 



---


### create
Crea una nueva instancia


static **ItemResolver::create**() : [ItemResolver](../../../ItemResolver.md)



---


### setValidator
Asigna el validador personalizado


**ItemResolver::setValidator**(callable $validator) : [ItemResolver](../../../ItemResolver.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |

---


### setNormalizer
Asigna el normalizador personalizado


**ItemResolver::setNormalizer**(callable $normalizer) : [ItemResolver](../../../ItemResolver.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |

---


### setKeyNormalizer
Asigna el normalizador de clave personalizado


**ItemResolver::setKeyNormalizer**(callable $normalizer) : [ItemResolver](../../../ItemResolver.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |

---


### configure
Configura el ItemResolver a partir de lo que se deduce de una coleccion


**ItemResolver::configure**([ArrayList](../../../ArrayList.md) $collection) : [ItemResolver](../../../ItemResolver.md)


|Parameters: | | |
| --- | --- | --- |
|[ArrayList](../../../ArrayList.md) |$collection |  |

---


### normalize
Normaliza un valor antes de ser añadido


protected **ItemResolver::normalize**([KeyValue](../../../KeyValue.md) $pair) : [KeyValue](../../../KeyValue.md)


|Parameters: | | |
| --- | --- | --- |
|[KeyValue](../../../KeyValue.md) |$pair |  |

---


### normalizeKey
Normaliza una clave antes de ser usada


protected **ItemResolver::normalizeKey**([KeyValue](../../../KeyValue.md) $pair) : [KeyValue](../../../KeyValue.md)


|Parameters: | | |
| --- | --- | --- |
|[KeyValue](../../../KeyValue.md) |$pair |  |

---


### validate
Valida una pareja clave valor


protected **ItemResolver::validate**([KeyValue](../../../KeyValue.md) $pair) : bool


|Parameters: | | |
| --- | --- | --- |
|[KeyValue](../../../KeyValue.md) |$pair |  |

---


### resolve
Resuelve una pareja clave/valor


**ItemResolver::resolve**([KeyValue](../../../KeyValue.md) $pair) : [KeyValue](../../../KeyValue.md)|null


|Parameters: | | |
| --- | --- | --- |
|[KeyValue](../../../KeyValue.md) |$pair |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                