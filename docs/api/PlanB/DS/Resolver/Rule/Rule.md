
                                                                                                                                            
    
# Rule


> Regla que tiene que cumplir un valor antes de ser añadido
a una colección
>
> 








## Methods

### typed
Resolver named constructor.


static **Rule::typed**(string $type, callable $callback) : [Rule](../../../../Rule.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$callback |  |

---


### make
Resolver named constructor.


static **Rule::make**(callable $callback) : [Rule](../../../../Rule.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### __construct
Resolver constructor.


protected **Rule::__construct**(callable $callback, string $type = null) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |$type |  |

---


### setInnerType
Informa a la regla de cual es el tipo del resolver padre


**Rule::setInnerType**([DataType](../../../../DataType.md) $type) : [RuleQueue](../../../../RuleQueue.md)


|Parameters: | | |
| --- | --- | --- |
|[DataType](../../../../DataType.md) |$type |  |

---


### isOfInnerType
Indica si un valor es del tipo interno de esta regla
El tipo interno es el tipo del resolver al que pertenece esta regla


protected **Rule::isOfInnerType**(mixed $value) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### __invoke
Ejecuta la regla


**Rule::__invoke**([InputInterface](../../../../InputInterface.md) $input) : [InputInterface](../../../../InputInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[InputInterface](../../../../InputInterface.md) |$input |  |

---


### resolve
Ejecuta la regla


**Rule::resolve**([InputInterface](../../../../InputInterface.md) $input) : [InputInterface](../../../../InputInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[InputInterface](../../../../InputInterface.md) |$input |  |

---


### buildInput
Convierte la respuesta obtenida en un objeto InputInterface


abstract **Rule::buildInput**(mixed $response, mixed $value) : [InputInterface](../../../../InputInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$response |  |
|mixed |$value |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                