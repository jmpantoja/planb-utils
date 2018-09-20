
                                                                                                                                            
    
# Validator


> Regla que comprueba si un valor es valido
>
> 








## Methods

### typed
Resolver named constructor.


static **Validator::typed**(string $type, callable $callback) : [Rule](../../../../Rule.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$callback |  |

---


### make
Resolver named constructor.


static **Validator::make**(callable $callback) : [Rule](../../../../Rule.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### __construct
Resolver constructor.


protected **Validator::__construct**(callable $callback, string $type = null) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |$type |  |

---


### setInnerType
Informa a la regla de cual es el tipo del resolver padre


**Validator::setInnerType**([DataType](../../../../DataType.md) $type) : [RuleQueue](../../../../RuleQueue.md)


|Parameters: | | |
| --- | --- | --- |
|[DataType](../../../../DataType.md) |$type |  |

---


### isOfInnerType
Indica si un valor es del tipo interno de esta regla
El tipo interno es el tipo del resolver al que pertenece esta regla


protected **Validator::isOfInnerType**(mixed $value) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### __invoke
Ejecuta la regla


**Validator::__invoke**([InputInterface](../../../../InputInterface.md) $input) : [InputInterface](../../../../InputInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[InputInterface](../../../../InputInterface.md) |$input |  |

---


### resolve
Ejecuta la regla


**Validator::resolve**([InputInterface](../../../../InputInterface.md) $input) : [InputInterface](../../../../InputInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[InputInterface](../../../../InputInterface.md) |$input |  |

---


### buildInput
Convierte la respuesta obtenida en un objeto InputInterface


**Validator::buildInput**(mixed $response, mixed $value) : [InputInterface](../../../../InputInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$response |  |
|mixed |$value |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                