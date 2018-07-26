
                                                                                                                                            
    
# ClassNameAssurance


> Garantiza que un nombre de clase cumple con una serie de condiciones
>
> 








## Methods

### __construct
PathAssurance constructor.


**ClassNameAssurance::__construct**([ClassName](../../../ClassName.md) $className) : 


|Parameters: | | |
| --- | --- | --- |
|[ClassName](../../../ClassName.md) |$className |  |

---


### fromString
Crea una nueva instancia a partir de una cadena de texto


static **ClassNameAssurance::fromString**(string $className) : [ClassNameAssurance](../../../ClassNameAssurance.md)


|Parameters: | | |
| --- | --- | --- |
|string |$className |  |

---


### end
Devuelve la ruta


**ClassNameAssurance::end**() : [Path](../../../Path.md)



---


### stringify



**ClassNameAssurance::stringify**() : string



---


### __toString



**ClassNameAssurance::__toString**() : string



---


### isChildOf
Comprueba que la clase es hija de otra, o lanza una excepción en caso contrario


**ClassNameAssurance::isChildOf**(string $classOrInterfaceName) : [ClassNameAssurance](../../../ClassNameAssurance.md)


|Parameters: | | |
| --- | --- | --- |
|string |$classOrInterfaceName |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                