
                                                                                                                                            
    
# ResolverInterface


> Interfaz para resolvers
>
> 








## Methods

### execute
Ejecuta el resolver


**ResolverInterface::execute**([KeyValue](../../../../KeyValue.md) $pair, [ListInterface](../../../../ListInterface.md) $context) : 


|Parameters: | | |
| --- | --- | --- |
|[KeyValue](../../../../KeyValue.md) |$pair |  |
|[ListInterface](../../../../ListInterface.md) |$context |  |

---


### resolve
Resuelve una pareja clave valor


**ResolverInterface::resolve**(mixed $value, mixed $key, [ListInterface](../../../../ListInterface.md) $context) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |
|mixed |$key |  |
|[ListInterface](../../../../ListInterface.md) |$context |  |

---


### markAsInvalid
Marca la pareja clave/valor como ignorada


**ResolverInterface::markAsInvalid**() : void



---


### setKey
Modifica la pareja clave/valor


**ResolverInterface::setKey**(mixed $key) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### setValue
Modifica la pareja clave/valor


**ResolverInterface::setValue**(mixed $value) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### setPair
Modifica la pareja clave/valor


**ResolverInterface::setPair**(mixed $key, mixed $value) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                