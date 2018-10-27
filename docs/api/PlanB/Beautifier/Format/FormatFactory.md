
                                                                                                                                            
    
# FormatFactory


> Factory para crear objectos Format
>
> 








## Methods

### evaluate
Evalua una condición y devuelve el valor apropiado


static **FormatFactory::evaluate**(mixed ...$arguments) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |...$arguments |  |

---


### __construct
Factory constructor.


protected **FormatFactory::__construct**() : 



---


### configure
Registra métodos en este factory


protected **FormatFactory::configure**() : void



---


### register
Registra un método


**FormatFactory::register**(string|mixed[] $method) : 


|Parameters: | | |
| --- | --- | --- |
|string|mixed[] |$method |  |

---


### create
Crea un valor para ser devuelto


protected **FormatFactory::create**(mixed ...$arguments) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |...$arguments |  |

---


### factory



static **FormatFactory::factory**(mixed $value) : null|[FormatInterface](../../../FormatInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### makeCountable
Crea un objeto CountableFormat


**FormatFactory::makeCountable**([Data](../../../Data.md) $data) : null|[CountableFormat](../../../CountableFormat.md)


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../Data.md) |$data |  |

---


### makeThrowable
Crea un objeto ExceptionFormat


**FormatFactory::makeThrowable**([Data](../../../Data.md) $data) : null|[ExceptionFormat](../../../ExceptionFormat.md)


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../Data.md) |$data |  |

---


### makeStringifable
Crea un objeto ScalarFormat


**FormatFactory::makeStringifable**([Data](../../../Data.md) $data) : null|[ScalarFormat](../../../ScalarFormat.md)


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../Data.md) |$data |  |

---


### makeHashable
Crea un objeto HashableFormat


**FormatFactory::makeHashable**([Data](../../../Data.md) $data) : null|[HashableFormat](../../../HashableFormat.md)


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../Data.md) |$data |  |

---


### makeData
Crea un objeto DataFormat


**FormatFactory::makeData**([Data](../../../Data.md) $data) : null|[DataFormat](../../../DataFormat.md)


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../Data.md) |$data |  |

---


### makeObject
Crea un objeto ObjectFormat


**FormatFactory::makeObject**([Data](../../../Data.md) $data) : [DataFormat](../../../DataFormat.md)


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../Data.md) |$data |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                