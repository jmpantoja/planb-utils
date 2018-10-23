
                                                                                                                                            
    
# StyleFactory


> Factory para crear estilos
>
> 








## Methods

### evaluate
Evalua una condición y devuelve el valor apropiado


static **StyleFactory::evaluate**(mixed ...$arguments) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |...$arguments |  |

---


### __construct
Factory constructor.


protected **StyleFactory::__construct**() : 



---


### configure
Configura esta factoria


protected **StyleFactory::configure**() : void



---


### register
Registra un método


**StyleFactory::register**(string|mixed[] $method) : 


|Parameters: | | |
| --- | --- | --- |
|string|mixed[] |$method |  |

---


### create
Crea un valor para ser devuelto


protected **StyleFactory::create**(mixed ...$arguments) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |...$arguments |  |

---


### factory
Crea objetos Style


static **StyleFactory::factory**([StyleType](../../../StyleType.md) $type) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[StyleType](../../../StyleType.md) |$type |  |

---


### makeType
Devuelte un style de tipo "Type"


**StyleFactory::makeType**([StyleType](../../../StyleType.md) $type) : null|[Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[StyleType](../../../StyleType.md) |$type |  |

---


### makeValue
Devuelte un style de tipo "Type"


**StyleFactory::makeValue**([StyleType](../../../StyleType.md) $type) : null|[Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[StyleType](../../../StyleType.md) |$type |  |

---


### makeArgument
Devuelte un style de tipo "argument"


**StyleFactory::makeArgument**([StyleType](../../../StyleType.md) $type) : null|[Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[StyleType](../../../StyleType.md) |$type |  |

---


### makeStrong
Devuelte un style de tipo "strong"


**StyleFactory::makeStrong**([StyleType](../../../StyleType.md) $type) : null|[Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[StyleType](../../../StyleType.md) |$type |  |

---


### makeExceptionHeader
Devuelte un style de tipo "exception_header"


**StyleFactory::makeExceptionHeader**([StyleType](../../../StyleType.md) $type) : null|[Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[StyleType](../../../StyleType.md) |$type |  |

---


### makeExceptionBody
Devuelte un style de tipo "exception_body"


**StyleFactory::makeExceptionBody**([StyleType](../../../StyleType.md) $type) : null|[Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[StyleType](../../../StyleType.md) |$type |  |

---


### makeExceptionTrace
Devuelte un style de tipo "exception_trace"


**StyleFactory::makeExceptionTrace**([StyleType](../../../StyleType.md) $type) : null|[Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[StyleType](../../../StyleType.md) |$type |  |

---


### makeEmpty
Devuelte un objeto Style por defecto


**StyleFactory::makeEmpty**() : null|[Style](../../../Style.md)



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                