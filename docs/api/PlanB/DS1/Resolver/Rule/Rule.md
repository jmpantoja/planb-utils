
                                                                                                                                            
    
# Rule


> Regla que tiene que cumplir un valor antes de ser añadido
a una colección
>
> 








## Methods

### __construct
Resolver constructor.


protected **Rule::__construct**(callable $callback, string $type = null) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |$type |  |

---


### typed
Resolver named constructor.


static **Rule::typed**(string $type, callable $callback) : [Rule](../../../../Rule.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$callback |  |

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


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                