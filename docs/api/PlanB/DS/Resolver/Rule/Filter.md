
                                                                                                                                            
    
# Filter


> Discrimina los valores que se consideran validos de los que no
No lanza excepciones ante un valor incorrecto, simplemente lo ignora
>
> 








## Methods

### typed
Resolver named constructor.


static **Filter::typed**(string $type, callable $callback) : [Rule](../../../../Rule.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$callback |  |

---


### make
Resolver named constructor.


static **Filter::make**(callable $callback) : [Rule](../../../../Rule.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### __construct
Resolver constructor.


protected **Filter::__construct**(callable $callback, string $type = null) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |$type |  |

---


### setInnerType
Informa a la regla de cual es el tipo del resolver padre


**Filter::setInnerType**([DataType](../../../../DataType.md) $type) : [RuleQueue](../../../../RuleQueue.md)


|Parameters: | | |
| --- | --- | --- |
|[DataType](../../../../DataType.md) |$type |  |

---


### isOfInnerType
Indica si un valor es del tipo interno de esta regla
El tipo interno es el tipo del resolver al que pertenece esta regla


protected **Filter::isOfInnerType**(mixed $value) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### __invoke
Ejecuta la regla


**Filter::__invoke**([InputInterface](../../../../InputInterface.md) $input) : [InputInterface](../../../../InputInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[InputInterface](../../../../InputInterface.md) |$input |  |

---


### resolve
Ejecuta la regla


**Filter::resolve**([InputInterface](../../../../InputInterface.md) $input) : [InputInterface](../../../../InputInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[InputInterface](../../../../InputInterface.md) |$input |  |

---


### buildInput



**Filter::buildInput**(mixed $response, mixed $value) : [InputInterface](../../../../InputInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$response |  |
|mixed |$value |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                