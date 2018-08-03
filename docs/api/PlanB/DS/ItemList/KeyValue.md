
                                                                                                                                            
    
# KeyValue


> Value Object que encapsula una pareja clave/valor
>
> 








## Methods

### __construct
KeyValue constructor.


protected **KeyValue::__construct**(mixed $value, null|mixed $key = null) : 


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


### setValue
Asigna un nuevo valor


**KeyValue::setValue**(mixed $newValue) : [KeyValue](../../../KeyValue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$newValue |  |

---


### getKey
Devuelve la clave


**KeyValue::getKey**() : mixed



---


### setKey
Asigna una nueva clave


**KeyValue::setKey**(mixed $newKey) : [KeyValue](../../../KeyValue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$newKey |  |

---


### removeKey
Elimina la clave de esta paraja clave/valor


**KeyValue::removeKey**() : [KeyValue](../../../KeyValue.md)



---


### getType
Devuelve el tipo


**KeyValue::getType**() : string



---


### isInvalid
Indica si esta pareja ha sido marcada para como invalida


**KeyValue::isInvalid**() : bool



---


### markAsInvalid
Marca esta pareja como ignorada


**KeyValue::markAsInvalid**() : [KeyValue](../../../KeyValue.md)



---


### setValueIfNotNull
Asigna un valor, solo si no es nulo


**KeyValue::setValueIfNotNull**(mixed $value) : [KeyValue](../../../KeyValue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### __toString
Devuelve la pareja clave/valor como una cadena de texto


**KeyValue::__toString**() : string



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                