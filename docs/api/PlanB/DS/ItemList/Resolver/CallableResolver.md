
                                                                                                                                            
    
# CallableResolver


> Permite crear un resolver a partir de un callable
>
> 








## Methods

### execute
Ejecuta el resolver


**CallableResolver::execute**([KeyValue](../../../../KeyValue.md) $pair, [ListInterface](../../../../ListInterface.md) $context) : 


|Parameters: | | |
| --- | --- | --- |
|[KeyValue](../../../../KeyValue.md) |$pair |  |
|[ListInterface](../../../../ListInterface.md) |$context |  |

---


### resolve
Resuelve una pareja clave/valor


**CallableResolver::resolve**(mixed $value, mixed $key, [ListInterface](../../../../ListInterface.md) $context) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |
|mixed |$key |  |
|[ListInterface](../../../../ListInterface.md) |$context |  |

---


### markAsInvalid
Marca la pareja clave/valor como ignorada


**CallableResolver::markAsInvalid**() : void



---


### setKey
Modifica la pareja clave/valor


**CallableResolver::setKey**(mixed $key) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### setValue
Modifica la pareja clave/valor


**CallableResolver::setValue**(mixed $value) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### setPair
Modifica la pareja clave/valor


**CallableResolver::setPair**(mixed $key, mixed $value) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### fromCallable
Crea una instancia desde un callable


static **CallableResolver::fromCallable**(callable $callback) : [CallableResolver](../../../../CallableResolver.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                