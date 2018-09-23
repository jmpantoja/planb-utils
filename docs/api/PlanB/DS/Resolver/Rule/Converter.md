
                                                                                                                                            
    
# Converter


> Regla que transforma un valor de un tipo dado, en otro
>
> 








## Methods

### typed
Resolver named constructor.


static **Converter::typed**(string $type, callable $callback) : [Rule](../../../../Rule.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$callback |  |

---


### make
Resolver named constructor.


static **Converter::make**(callable $callback) : [Rule](../../../../Rule.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### __construct
Resolver constructor.


protected **Converter::__construct**(callable $callback, string $type = null) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |$type |  |

---


### setInnerType
Informa a la regla de cual es el tipo del resolver padre


**Converter::setInnerType**([DataType](../../../../DataType.md) $type) : [RuleQueue](../../../../RuleQueue.md)


|Parameters: | | |
| --- | --- | --- |
|[DataType](../../../../DataType.md) |$type |  |

---


### isOfInnerType
Indica si un valor es del tipo interno de esta regla
El tipo interno es el tipo del resolver al que pertenece esta regla


protected **Converter::isOfInnerType**(mixed $value) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### __invoke
Ejecuta la regla


**Converter::__invoke**([InputInterface](../../../../InputInterface.md) $input) : [InputInterface](../../../../InputInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[InputInterface](../../../../InputInterface.md) |$input |  |

---


### resolve
Ejecuta la regla


**Converter::resolve**([InputInterface](../../../../InputInterface.md) $input) : [InputInterface](../../../../InputInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[InputInterface](../../../../InputInterface.md) |$input |  |

---


### buildInput
Convierte la respuesta obtenida en un objeto InputInterface


**Converter::buildInput**(mixed $response, mixed $value) : [InputInterface](../../../../InputInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$response |  |
|mixed |$value |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                