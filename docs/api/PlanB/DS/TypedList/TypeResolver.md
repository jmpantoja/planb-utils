
                                                                                                                                            
    
# TypeResolver


> Resolver para asegurar que el valor es del tipo adecuado
>
> 








## Methods

### execute
Ejecuta el resolver


**TypeResolver::execute**([KeyValue](../../../KeyValue.md) $pair, [ListInterface](../../../ListInterface.md) $context) : 


|Parameters: | | |
| --- | --- | --- |
|[KeyValue](../../../KeyValue.md) |$pair |  |
|[ListInterface](../../../ListInterface.md) |$context |  |

---


### resolve
Resuelve una pareja clave/valor


**TypeResolver::resolve**(mixed $value, mixed $key, [ListInterface](../../../ListInterface.md) $context) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |
|mixed |$key |  |
|[ListInterface](../../../ListInterface.md) |$context |  |

---


### markAsInvalid
Marca la pareja clave/valor como ignorada


**TypeResolver::markAsInvalid**() : void



---


### setKey
Modifica la pareja clave/valor


**TypeResolver::setKey**(mixed $key) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### setValue
Modifica la pareja clave/valor


**TypeResolver::setValue**(mixed $value) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### setPair
Modifica la pareja clave/valor


**TypeResolver::setPair**(mixed $key, mixed $value) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### __construct
TypeResolver constructor.


**TypeResolver::__construct**(string $type) : 


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### create
Crea una nueva instancia


static **TypeResolver::create**(string $type) : [TypeResolver](../../../TypeResolver.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                