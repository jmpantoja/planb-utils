
                                                                                                                                            
    
# Block


> Párrafo con estilo
>
> 








## Methods

### __construct
Block constructor.


protected **Block::__construct**([Text](../../../Text.md) $content) : 


|Parameters: | | |
| --- | --- | --- |
|[Text](../../../Text.md) |$content |  |

---


### stringify
__toString alias


**Block::stringify**(string $format = null) : string


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |

---


### __toString
Devuelve la cadena de texto


**Block::__toString**() : string



---


### parent
Asigna el padre de este elemento


**Block::parent**([ComposedOutput](../../../ComposedOutput.md) $parent) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[ComposedOutput](../../../ComposedOutput.md) |$parent |  |

---


### end
Finaliza la configuración,
y devuelve el padre para seguir encadenando elementos


**Block::end**() : [ComposedOutput](../../../ComposedOutput.md)



---


### append
Añade un elemento a la lista


protected **Block::append**([Output](../../../Output.md) $output) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[Output](../../../Output.md) |$output |  |

---


### count
Devuelve el número total de elementos de la lista


**Block::count**() : int



---


### getIterator
Retrieve an external iterator


**Block::getIterator**() : 



---


### render
Devuelve el contenido con el estilo aplicado


**Block::render**() : string



---


### create
Block Named Constructor


static **Block::create**(string $format, mixed ...$arguments) : [Block](../../../Block.md)


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |
|mixed |...$arguments |  |

---


### getInnerType
Devuelve el tipo de la lista


**Block::getInnerType**() : null|string



---


### add
Añade una sub bloque


**Block::add**(string $format = &#039;&#039;, mixed ...$arguments) : [Line](../../../Line.md)


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |
|mixed |...$arguments |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                