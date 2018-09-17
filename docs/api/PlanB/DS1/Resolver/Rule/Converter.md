
                                                                                                                                            
    
# Converter


> Regla que transforma un valor de un tipo dado, en otro
>
> 








## Methods

### __construct
Resolver constructor.


protected **Converter::__construct**(callable $callback, string $type = null) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |$type |  |

---


### typed
Resolver named constructor.


static **Converter::typed**(string $type, callable $callback) : [Resolver](../../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$callback |  |

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


**Converter::resolve**([InputInterface](../../../../InputInterface.md) $input) : 


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


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                