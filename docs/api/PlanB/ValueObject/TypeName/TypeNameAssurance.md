
                                                                                                                                            
    
# TypeNameAssurance


> Garantiza que un nombre de clase cumple con una serie de condiciones
>
> 








## Methods

### __construct
PathAssurance constructor.


**TypeNameAssurance::__construct**([TypeName](../../../TypeName.md) $typeName) : 


|Parameters: | | |
| --- | --- | --- |
|[TypeName](../../../TypeName.md) |$typeName |  |

---


### create
Crea una nueva instancia a partir de una cadena de texto


static **TypeNameAssurance::create**(string $typeName) : [TypeNameAssurance](../../../TypeNameAssurance.md)


|Parameters: | | |
| --- | --- | --- |
|string |$typeName |  |

---


### fromVariable
Crea una nueva instancia a partir de una variable


static **TypeNameAssurance::fromVariable**(mixed $variable) : [TypeNameAssurance](../../../TypeNameAssurance.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$variable |  |

---


### end
Devuelve la ruta


**TypeNameAssurance::end**() : [Path](../../../Path.md)



---


### stringify



**TypeNameAssurance::stringify**() : string



---


### __toString



**TypeNameAssurance::__toString**() : string



---


### isSameOf
Comprueba que el nombre de tipo sea igual a la clase dada
o lanza una excepción en caso contrario


**TypeNameAssurance::isSameOf**(string $classOrInterfaceName) : [TypeNameAssurance](../../../TypeNameAssurance.md)


|Parameters: | | |
| --- | --- | --- |
|string |$classOrInterfaceName |  |

---


### isChildOf
Comprueba que el nombre de tipo sea un subtipo de la clase dada, pero no ella misma,
o lanza una excepción en caso contrario


**TypeNameAssurance::isChildOf**(string $classOrInterfaceName) : [TypeNameAssurance](../../../TypeNameAssurance.md)


|Parameters: | | |
| --- | --- | --- |
|string |$classOrInterfaceName |  |

---


### isClassOf
Comprueba que el nombre de tipo sea un subtipo de la clase dada, o ella misma,
o lanza una excepción en caso contrario


**TypeNameAssurance::isClassOf**(string $classOrInterfaceName) : [TypeNameAssurance](../../../TypeNameAssurance.md)


|Parameters: | | |
| --- | --- | --- |
|string |$classOrInterfaceName |  |

---


### isTypeOf
Comprueba que pertenezca a alguno de los tipos dados
o lanza una excepción en caso contrario


**TypeNameAssurance::isTypeOf**(string ...$allowed) : [TypeNameAssurance](../../../TypeNameAssurance.md)


|Parameters: | | |
| --- | --- | --- |
|string |...$allowed |  |

---


### isClassName
Comprueba que el nombre de tipo sea un nombre de clase
o lanza una excepción en caso contrario


**TypeNameAssurance::isClassName**() : [TypeNameAssurance](../../../TypeNameAssurance.md)



---


### isClassOrInterfaceName
Comprueba que el nombre de tipo sea un nombre de clase o interfaz
o lanza una excepción en caso contrario


**TypeNameAssurance::isClassOrInterfaceName**() : [TypeNameAssurance](../../../TypeNameAssurance.md)



---


### isInterfaceName
Comprueba que el nombre de tipo sea un nombre de interfaz
o lanza una excepción en caso contrario


**TypeNameAssurance::isInterfaceName**() : [TypeNameAssurance](../../../TypeNameAssurance.md)



---


### isTraitName
Comprueba que el nombre de tipo sea un nombre de rasgo
o lanza una excepción en caso contrario


**TypeNameAssurance::isTraitName**() : [TypeNameAssurance](../../../TypeNameAssurance.md)



---


### isNativeTypeName
Comprueba que el nombre de tipo sea un nombre de tipo nativo
o lanza una excepción en caso contrario


**TypeNameAssurance::isNativeTypeName**() : [TypeNameAssurance](../../../TypeNameAssurance.md)



---


### isValid
Comprueba que el nombre de tipo sea valido (nativo, clase, interfaz o rasgo)
o lanza una excepción en caso contrario


**TypeNameAssurance::isValid**() : [TypeNameAssurance](../../../TypeNameAssurance.md)



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                