
                                                                                                                                            
    
# HashFormatter


> Formatea un objeto Hashable
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


protected **HashFormatter::__construct**(mixed $value) : 


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### getValue



**HashFormatter::getValue**() : mixed



---


### full



**HashFormatter::full**() : string



---


### simple



**HashFormatter::simple**() : string



---


### parseType
Calcula el token Type


protected **HashFormatter::parseType**([Data](../../../../Data.md) $data) : string


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### parseKey
Calcula el token Key


protected **HashFormatter::parseKey**([Data](../../../../Data.md) $data) : null|string


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### parseValue
Calcula el token Value


protected **HashFormatter::parseValue**([Data](../../../../Data.md) $data) : 


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### makeIfPossible
Named constructor


static **HashFormatter::makeIfPossible**([Data](../../../../Data.md) $data) : null|[HashFormatter](../../../../HashFormatter.md)


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### make
Named constructor


static **HashFormatter::make**([Hashable](../../../../Hashable.md) $value) : [HashFormatter](../../../../HashFormatter.md)


|Parameters: | | |
| --- | --- | --- |
|[Hashable](../../../../Hashable.md) |$value |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                