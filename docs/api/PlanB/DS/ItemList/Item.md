
                                                                                                                                            
    
# Item


> Value Object que encapsula una pareja clave/valor
>
> 








## Methods

### __construct
Item constructor.


protected **Item::__construct**(mixed $value, null|mixed $key = null) : 


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |
|null|mixed |$key |  |

---


### fromKeyValue
Crea una nueva instancia a partir de una pareja clave/valor


static **Item::fromKeyValue**(mixed $key, mixed $value) : [Item](../../../Item.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### fromValue
Crea un objeto Item solo con valor


static **Item::fromValue**(mixed $value) : [Item](../../../Item.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### hasKey
Indica si esta instancia contiene una key


**Item::hasKey**() : bool



---


### getValue
Devuelve el valor


**Item::getValue**() : mixed



---


### setValue
Asigna un nuevo valor


**Item::setValue**(mixed $newValue) : [Item](../../../Item.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$newValue |  |

---


### getKey
Devuelve la clave


**Item::getKey**() : mixed



---


### setKey
Asigna una nueva clave


**Item::setKey**(mixed $newKey) : [Item](../../../Item.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$newKey |  |

---


### getType
Devuelve el tipo


**Item::getType**() : string



---


### __toString
Convierte el item en una cadena de texto


**Item::__toString**() : string



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                