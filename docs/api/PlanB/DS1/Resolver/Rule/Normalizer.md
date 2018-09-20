
                                                                                                                                            
    
# Normalizer


> Regla capaz de tomar un valor valido y transformarlo en otro
>
> 








## Methods

### typed
Resolver named constructor.


static **Normalizer::typed**(string $type, callable $callback) : [Rule](../../../../Rule.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$callback |  |

---


### make
Resolver named constructor.


static **Normalizer::make**(callable $callback) : [Rule](../../../../Rule.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### __construct
Resolver constructor.


protected **Normalizer::__construct**(callable $callback, string $type = null) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |$type |  |

---


### setInnerType
Informa a la regla de cual es el tipo del resolver padre


**Normalizer::setInnerType**([DataType](../../../../DataType.md) $type) : [RuleQueue](../../../../RuleQueue.md)


|Parameters: | | |
| --- | --- | --- |
|[DataType](../../../../DataType.md) |$type |  |

---


### isOfInnerType
Indica si un valor es del tipo interno de esta regla
El tipo interno es el tipo del resolver al que pertenece esta regla


protected **Normalizer::isOfInnerType**(mixed $value) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### __invoke
Ejecuta la regla


**Normalizer::__invoke**([InputInterface](../../../../InputInterface.md) $input) : [InputInterface](../../../../InputInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[InputInterface](../../../../InputInterface.md) |$input |  |

---


### resolve
Ejecuta la regla


**Normalizer::resolve**([InputInterface](../../../../InputInterface.md) $input) : [InputInterface](../../../../InputInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[InputInterface](../../../../InputInterface.md) |$input |  |

---


### buildInput
Convierte la respuesta obtenida en un objeto InputInterface


**Normalizer::buildInput**(mixed $response, mixed $value) : [InputInterface](../../../../InputInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$response |  |
|mixed |$value |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                