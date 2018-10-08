
                                                                                                                                            
    
# ObjectFormatter


> Formatea un objeto
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


protected **ObjectFormatter::__construct**(mixed $value) : 


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### getValue



**ObjectFormatter::getValue**() : mixed



---


### full



**ObjectFormatter::full**() : string



---


### simple



**ObjectFormatter::simple**() : string



---


### parseType



protected **ObjectFormatter::parseType**([Data](../../../../Data.md) $data) : string


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### parseKey



protected **ObjectFormatter::parseKey**([Data](../../../../Data.md) $data) : null|string


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### parseValue



protected **ObjectFormatter::parseValue**([Data](../../../../Data.md) $data) : 


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### makeIfPossible
Named constructor


static **ObjectFormatter::makeIfPossible**([Data](../../../../Data.md) $data) : null|[ObjectFormatter](../../../../ObjectFormatter.md)


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### make
Named constructor


static **ObjectFormatter::make**([object](../../../../object.md) $value) : [ObjectFormatter](../../../../ObjectFormatter.md)


|Parameters: | | |
| --- | --- | --- |
|[object](../../../../object.md) |$value |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                