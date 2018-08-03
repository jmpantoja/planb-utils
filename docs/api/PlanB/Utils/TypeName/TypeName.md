
                                                                                                                                            
    
# TypeName


> Representa al nombre de una clase
>
> 








## Methods

### __construct
ClassName constructor.


**TypeName::__construct**(string $typeName) : 


|Parameters: | | |
| --- | --- | --- |
|string |$typeName |  |

---


### create
Crea una nueva instancia a partir de un nombre de clase


static **TypeName::create**(string $typeName) : [TypeName](../../../TypeName.md)


|Parameters: | | |
| --- | --- | --- |
|string |$typeName |  |

---


### overwite
Cambia el valor del typename (inmutable)


**TypeName::overwite**(string $typeName) : [TypeName](../../../TypeName.md)


|Parameters: | | |
| --- | --- | --- |
|string |$typeName |  |

---


### getNativeTypes
Devuelve un array con los nombres de los tipos nativos


static **TypeName::getNativeTypes**() : string[]



---


### isSameOf
Indica si la clase es la misma


**TypeName::isSameOf**(string $classOrInterfaceName) : bool


|Parameters: | | |
| --- | --- | --- |
|string |$classOrInterfaceName |  |

---


### isChildOf
Indica si es un subtipo de una clase o interfaz
Para nombres de clase iguales devuelve false

**TypeName::isChildOf**(string $classOrInterfaceName) : bool


|Parameters: | | |
| --- | --- | --- |
|string |$classOrInterfaceName |  |

---


### isClassOf
Indica si es un subtipo de una clase o interfaz
Para nombres de clase iguales devuelve true

**TypeName::isClassOf**(string $classOrInterfaceName) : bool


|Parameters: | | |
| --- | --- | --- |
|string |$classOrInterfaceName |  |

---


### isTypeOf
Indica si pertenece a alguno de los tipos dados


**TypeName::isTypeOf**(string ...$allowed) : bool


|Parameters: | | |
| --- | --- | --- |
|string |...$allowed |  |

---


### stringify
__toString alias


**TypeName::stringify**(string $format = null) : string


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |

---


### __toString
Devuelve la cadena de texto


**TypeName::__toString**() : string



---


### isClassName
Indica si es un nombre de clase


**TypeName::isClassName**() : bool



---


### isInterfaceName
Indica si es un nombre de interfaz


**TypeName::isInterfaceName**() : bool



---


### isClassOrInterfaceName
Indica si es un nombre de clase o interfaz


**TypeName::isClassOrInterfaceName**() : bool



---


### isTraitName
Indica si es un nombre de rasgo


**TypeName::isTraitName**() : bool



---


### isNativeTypeName
Indica si es un nombre de rasgo


**TypeName::isNativeTypeName**() : bool



---


### isValid
Indica si es un nombre de tipo nativo, de clase, de rasgo o de interfaz


**TypeName::isValid**() : bool



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                