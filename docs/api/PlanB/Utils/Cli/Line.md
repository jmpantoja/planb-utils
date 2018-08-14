
                                                                                                                                            
    
# Line


> Una linea con estilo
>
> 








## Methods

### __construct
Line constructor.


protected **Line::__construct**(string $content) : 


|Parameters: | | |
| --- | --- | --- |
|string |$content |  |

---


### stringify
__toString alias


**Line::stringify**(string $format = null) : string


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |

---


### __toString
Devuelve la cadena de texto


**Line::__toString**() : string



---


### parent
Asigna el padre de este elemento


**Line::parent**([ComposedOutput](../../../ComposedOutput.md) $parent) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[ComposedOutput](../../../ComposedOutput.md) |$parent |  |

---


### end
Finaliza la configuración,
y devuelve el padre para seguir encadenando elementos


**Line::end**() : [ComposedOutput](../../../ComposedOutput.md)



---


### append
Añade un elemento a la lista


protected **Line::append**([Output](../../../Output.md) $output) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[Output](../../../Output.md) |$output |  |

---


### count
Devuelve el número total de elementos de la lista


**Line::count**() : int



---


### getIterator
Retrieve an external iterator


**Line::getIterator**() : 



---


### render
Devuelve el contenido con el estilo aplicado


**Line::render**() : string



---


### create
Message Named Constructor


static **Line::create**(string $content) : [Line](../../../Line.md)


|Parameters: | | |
| --- | --- | --- |
|string |$content |  |

---


### getInnerType
Devuelve el tipo de la lista


**Line::getInnerType**() : null|string



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                