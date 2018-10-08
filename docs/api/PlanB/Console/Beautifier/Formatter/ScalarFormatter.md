
                                                                                                                                            
    
# ScalarFormatter


> Formatea un objeto como una cadena de texto
>
> 




## Constants
- FULL_WITH_KEY
- FULL_WITHOUT_KEY
- NUMERIC
- TEXT
- CLASSNAME




## Methods

### __construct
AbstractFormatter constructor.


protected **ScalarFormatter::__construct**(mixed $value) : 


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### getValue



**ScalarFormatter::getValue**() : mixed



---


### full



**ScalarFormatter::full**() : string



---


### simple



**ScalarFormatter::simple**() : string



---


### parseType
Calcula el token Type


protected **ScalarFormatter::parseType**([Data](../../../../Data.md) $data) : string


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### parseKey



protected **ScalarFormatter::parseKey**([Data](../../../../Data.md) $data) : null|string


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### parseValue



protected **ScalarFormatter::parseValue**([Data](../../../../Data.md) $data) : 


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### makeIfPossible
Named constructor


static **ScalarFormatter::makeIfPossible**([Data](../../../../Data.md) $data) : null|[ScalarFormatter](../../../../ScalarFormatter.md)


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### make
Named constructor


static **ScalarFormatter::make**(mixed $value) : [ScalarFormatter](../../../../ScalarFormatter.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                