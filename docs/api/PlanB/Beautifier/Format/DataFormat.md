
                                                                                                                                            
    
# DataFormat


> Formato base para datos
>
> 








## Methods

### make
DataFormat named constructor.


static **DataFormat::make**([Data](../../../Data.md) $data) : [DataFormat](../../../DataFormat.md)


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../Data.md) |$data |  |

---


### __construct
DataFormat constructor.


protected **DataFormat::__construct**([Data](../../../Data.md) $data) : 


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../Data.md) |$data |  |

---


### getTemplate



**DataFormat::getTemplate**() : string



---


### getReplacements



**DataFormat::getReplacements**() : mixed[]



---


### getType
Devuelve el atributo tipo


**DataFormat::getType**() : string



---


### getKey
Devuelve el atributo key


**DataFormat::getKey**() : string



---


### getValue
Devuelve el atributo tipo value


**DataFormat::getValue**() : string



---


### parseValue
Devuelve el atributo valor


abstract protected **DataFormat::parseValue**([Data](../../../Data.md) $data) : string


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../Data.md) |$data |  |

---


### parseKey
Devuelve el atributo key


abstract protected **DataFormat::parseKey**([Data](../../../Data.md) $data) : string


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../Data.md) |$data |  |

---


### parseType
Devuelve el atributo type


abstract protected **DataFormat::parseType**([Data](../../../Data.md) $data) : string


|Parameters: | | |
| --- | --- | --- |
|[Data](../../../Data.md) |$data |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                