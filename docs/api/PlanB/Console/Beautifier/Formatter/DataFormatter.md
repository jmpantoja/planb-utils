
                                                                                                                                            
    
# DataFormatter


> Formatea un objeto PlanB\Type\Data\Data
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


protected **DataFormatter::__construct**(mixed $value) : 


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### getValue



**DataFormatter::getValue**() : mixed



---


### full



**DataFormatter::full**() : string



---


### simple



**DataFormatter::simple**() : string



---


### parseType
Calcula el token Type


protected **DataFormatter::parseType**([Data](../../../../Data.md) $data) : string


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### parseKey
Calcula el token Key


protected **DataFormatter::parseKey**([Data](../../../../Data.md) $data) : null|string


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### parseValue



protected **DataFormatter::parseValue**([Data](../../../../Data.md) $data) : 


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### makeIfPossible
Named constructor


static **DataFormatter::makeIfPossible**([Data](../../../../Data.md) $data) : [DataFormatter](../../../../DataFormatter.md)


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


### make
Named constructor


static **DataFormatter::make**([Data](../../../../Data.md) $value) : [DataFormatter](../../../../DataFormatter.md)


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$value |  |

---


### hasKeyLikeType
Indica si se debe usar el nombre de tipo como clave


protected **DataFormatter::hasKeyLikeType**([Data](../../../../Data.md) $data) : bool


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../../Data.md) |$data |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                