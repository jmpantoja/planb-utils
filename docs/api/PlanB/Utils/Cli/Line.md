
                                                                                                                                            
    
# Line


> Representa a una linea con un estilo determinado
>
> 








## Methods

### __toString
Devuelve la cadena de texto


**Line::__toString**() : string



---


### style
Asigna un estilo a este elemento


**Line::style**([Style](../../../Style.md) $style) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### getStyle
Devuelve el estilo


**Line::getStyle**() : [Style](../../../Style.md)



---


### apply
Aplica un estilo y da por finalizada la definición de elemento


**Line::apply**([Style](../../../Style.md) $style) : [OutputAggregate](../../../OutputAggregate.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### setParent
Asigna un objeto OutputAggregate como padre de este elemento


protected **Line::setParent**([OutputAggregate](../../../OutputAggregate.md) $parent) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[OutputAggregate](../../../OutputAggregate.md) |$parent |  |

---


### end
Da por finalizada la definición de este elemento, y devuelve el padre


**Line::end**() : [OutputAggregate](../../../OutputAggregate.md)



---


### __construct



protected **Line::__construct**() : 



---


### stringify
__toString alias


**Line::stringify**(string $format = null) : string


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |

---


### add



protected **Line::add**([Output](../../../Output.md) $output) : 


|Parameters: | | |
| --- | --- | --- |
|[Output](../../../Output.md) |$output |  |

---


### count
Devuelve el número de elementos


**Line::count**() : int



---


### getSeparator
Devuelve el caracter separador


protected **Line::getSeparator**() : string



---


### create
Crea una nueva instancia


static **Line::create**(string $format = null, string ...$arguments) : [Line](../../../Line.md)


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |
|string |...$arguments |  |

---


### parent
Asigna un objeto Message como padre de este elemento


**Line::parent**([Message](../../../Message.md) $message) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[Message](../../../Message.md) |$message |  |

---


### word
Agrega un objeto Word a la lista


**Line::word**(string $format, string ...$arguments) : [Word](../../../Word.md)


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |
|string |...$arguments |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                