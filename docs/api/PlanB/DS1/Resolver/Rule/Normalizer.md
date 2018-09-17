
                                                                                                                                            
    
# Normalizer


> Regla capaz de tomar un valor valido y transformarlo en otro
>
> 








## Methods

### __construct
Resolver constructor.


protected **Normalizer::__construct**(callable $callback, string $type = null) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |$type |  |

---


### typed
Resolver named constructor.


static **Normalizer::typed**(string $type, callable $callback) : [Rule](../../../../Rule.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$callback |  |

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


### make
Resolver named constructor.


static **Normalizer::make**(callable $callback) : [Normalizer](../../../../Normalizer.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                