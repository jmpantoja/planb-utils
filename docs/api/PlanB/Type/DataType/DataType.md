
                                                                                                                                            
    
# DataType


> Representa al nombre de una clase
>
> 


## Traits
- PlanB\Utils\Traits\Stringify


## Constants
- EQUIVALENTS




## Methods

### stringify
__toString alias


**DataType::stringify**() : string



---


### __toString
Devuelve la cadena de texto


**DataType::__toString**() : string



---


### __construct
DataType constructor.


protected **DataType::__construct**(string $type) : 


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### make
Crea una nueva instancia a partir de un nombre de clase


static **DataType::make**(string $type) : [DataType](../../../DataType.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### isSameOf
Indica si la clase es la misma


**DataType::isSameOf**(string $classOrInterfaceName) : bool


|Parameters: | | |
| --- | --- | --- |
|string |$classOrInterfaceName |  |

---


### isChildOf
Indica si es un subtipo de una clase o interfaz
Para nombres de clase iguales devuelve false

**DataType::isChildOf**(string $classOrInterfaceName) : bool


|Parameters: | | |
| --- | --- | --- |
|string |$classOrInterfaceName |  |

---


### isClassOf
Indica si es un subtipo de una clase o interfaz
Para nombres de clase iguales devuelve true

**DataType::isClassOf**(string $classOrInterfaceName) : bool


|Parameters: | | |
| --- | --- | --- |
|string |$classOrInterfaceName |  |

---


### isTypeOf
Indica si pertenece a alguno de los tipos dados


**DataType::isTypeOf**(string ...$allowed) : bool


|Parameters: | | |
| --- | --- | --- |
|string |...$allowed |  |

---


### isClass
Indica si es un nombre de clase


**DataType::isClass**() : bool



---


### isInterface
Indica si es un nombre de interfaz


**DataType::isInterface**() : bool



---


### isClassOrInterface
Indica si es un nombre de clase o interfaz


**DataType::isClassOrInterface**() : bool



---


### isClassOrInterfaceOrTrait
Indica si es un nombre de clase, de interfaz o de trait


**DataType::isClassOrInterfaceOrTrait**() : bool



---


### isTrait
Indica si es un nombre de rasgo


**DataType::isTrait**() : bool



---


### isNative
Indica si es un nombre de rasgo


**DataType::isNative**() : bool



---


### isValid
Indica si es un nombre de tipo nativo, de clase, de rasgo o de interfaz


**DataType::isValid**() : bool



---


### isTheTypeOf
Indica si el valor pasado es de este tipo


**DataType::isTheTypeOf**(mixed $value) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                