
                                                                                                                                            
    
# Message


> Un mensaje de texto, formateado para mostrarlo por consola
>
> 








## Methods

### __toString
Devuelve la cadena de texto


**Message::__toString**() : string



---


### style
Asigna un estilo a este elemento


**Message::style**([Style](../../../Style.md) $style) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### getStyle
Devuelve el estilo


**Message::getStyle**() : [Style](../../../Style.md)



---


### apply
Aplica un estilo y da por finalizada la definición de elemento


**Message::apply**([Style](../../../Style.md) $style) : [OutputAggregate](../../../OutputAggregate.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### setParent
Asigna un objeto OutputAggregate como padre de este elemento


protected **Message::setParent**([OutputAggregate](../../../OutputAggregate.md) $parent) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[OutputAggregate](../../../OutputAggregate.md) |$parent |  |

---


### end
Da por finalizada la definición de este elemento, y devuelve el padre


**Message::end**() : [OutputAggregate](../../../OutputAggregate.md)



---


### __construct



protected **Message::__construct**() : 



---


### stringify
__toString alias


**Message::stringify**(string $format = null) : string


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |

---


### add



protected **Message::add**([Output](../../../Output.md) $output) : 


|Parameters: | | |
| --- | --- | --- |
|[Output](../../../Output.md) |$output |  |

---


### count
Devuelve el número de elementos


**Message::count**() : int



---


### getSeparator
Devuelve el caracter separador


protected **Message::getSeparator**() : string



---


### create
Crea una nueva instancia


static **Message::create**(string $format = null, string ...$arguments) : [Line](../../../Line.md)


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |
|string |...$arguments |  |

---


### line
Añade una nueva linea


**Message::line**(string $format = null, string ...$arguments) : [Line](../../../Line.md)


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |
|string |...$arguments |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                