
                                                                                                                                            
    
# CountableFormatter


> Formatea un objeto Countable
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


protected **CountableFormatter::__construct**(mixed $value) : 


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### getValue



**CountableFormatter::getValue**() : mixed



---


### full



**CountableFormatter::full**() : string



---


### simple



**CountableFormatter::simple**() : string



---


### parseType
Calcula el token Type


protected **CountableFormatter::parseType**([Data](../../../../Data.md) $data) : string


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### parseKey



protected **CountableFormatter::parseKey**([Data](../../../../Data.md) $data) : null|string


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### parseValue



protected **CountableFormatter::parseValue**([Data](../../../../Data.md) $data) : 


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### makeIfPossible
Named constructor


static **CountableFormatter::makeIfPossible**([Data](../../../../Data.md) $data) : null|[CountableFormatter](../../../../CountableFormatter.md)


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### make
Named constructor


static **CountableFormatter::make**(mixed $value) : [CountableFormatter](../../../../CountableFormatter.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                