
                                                                                                                                            
    
# ValueFormatter


> Clase base para formatters
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


protected **ValueFormatter::__construct**(mixed $value) : 


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### getValue



**ValueFormatter::getValue**() : mixed



---


### full



**ValueFormatter::full**() : string



---


### simple



**ValueFormatter::simple**() : string



---


### parseType
Calcula el token Type


protected **ValueFormatter::parseType**([Data](../../../../Data.md) $data) : string


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### parseKey
Calcula el token Key


abstract protected **ValueFormatter::parseKey**([Data](../../../../Data.md) $data) : null|string


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### parseValue



abstract protected **ValueFormatter::parseValue**([Data](../../../../Data.md) $data) : 


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                