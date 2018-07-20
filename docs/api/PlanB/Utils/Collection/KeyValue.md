
                                                                                                                                            
    
# KeyValue


> Value Object que encapsula una pareja clave/valor
>
> 








## Methods

### __construct
KeyValue constructor.


**KeyValue::__construct**(mixed $value, null|mixed $key = null) : 


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |
|null|mixed |$key |  |

---


### fromPair



static **KeyValue::fromPair**(mixed $key, mixed $value) : [KeyValue](../../../KeyValue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### fromValue
Crea un objeto KeyValue solo con valor


static **KeyValue::fromValue**(mixed $value) : [KeyValue](../../../KeyValue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### hasKey
Indica si esta instancia contiene una key


**KeyValue::hasKey**() : bool



---


### getValue
Devuelve el valor


**KeyValue::getValue**() : mixed



---


### getKey
Devuelve la clave


**KeyValue::getKey**() : mixed



---


### changeValue
Crea una nueva clave/valor, con la misma clave que la actual, pero un valor distinto


**KeyValue::changeValue**(mixed $newValue) : [KeyValue](../../../KeyValue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$newValue |  |

---


### changeKey
Crea una nueva clave/valor, con el mismo valor que el actual, pero con una clave distinta


**KeyValue::changeKey**(mixed $newKey) : [KeyValue](../../../KeyValue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$newKey |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                