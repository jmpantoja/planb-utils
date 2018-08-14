
                                                                                                                                            
    
# ComposedOutput


> Elemento con una salida compuesta por otros elementos
>
> 








## Methods

### __construct
ComposedOutput constructor.


protected **ComposedOutput::__construct**() : 



---


### stringify
__toString alias


**ComposedOutput::stringify**(string $format = null) : string


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |

---


### __toString
Devuelve la cadena de texto


**ComposedOutput::__toString**() : string



---


### parent
Asigna el padre de este elemento


**ComposedOutput::parent**([ComposedOutput](../../../ComposedOutput.md) $parent) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[ComposedOutput](../../../ComposedOutput.md) |$parent |  |

---


### end
Finaliza la configuración,
y devuelve el padre para seguir encadenando elementos


**ComposedOutput::end**() : [ComposedOutput](../../../ComposedOutput.md)



---


### append
Añade un elemento a la lista


protected **ComposedOutput::append**([Output](../../../Output.md) $output) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[Output](../../../Output.md) |$output |  |

---


### count
Devuelve el número total de elementos de la lista


**ComposedOutput::count**() : int



---


### getIterator
Retrieve an external iterator


**ComposedOutput::getIterator**() : 



---


### render
Devuelve el contenido con el estilo aplicado


**ComposedOutput::render**() : string



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                