
                                                                                                                                            
    
# ItemResolver


> Procesa una pareja clave/valor antes de ser añadida a la colección
>
> 








## Methods

### __construct
ItemResolver constructor.


protected **ItemResolver::__construct**(string $type) : 


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### ofType
Crea una nueva instancia, para un tipo


static **ItemResolver::ofType**(string $type) : [ItemResolver](../../../ItemResolver.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### getType
Devuelve el tipo base de la colección


**ItemResolver::getType**() : string



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


**ItemResolver::configure**([Collection](../../../Collection.md) $collection) : [ItemResolver](../../../ItemResolver.md)


|Parameters: | | |
| --- | --- | --- |
|[Collection](../../../Collection.md) |$collection |  |

---


### resolve
Resuelve una pareja clave/valor


**ItemResolver::resolve**([KeyValue](../../../KeyValue.md) $pair) : [KeyValue](../../../KeyValue.md)|null


|Parameters: | | |
| --- | --- | --- |
|[KeyValue](../../../KeyValue.md) |$pair |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                