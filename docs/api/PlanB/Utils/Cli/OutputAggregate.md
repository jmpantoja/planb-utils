
                                                                                                                                            
    
# OutputAggregate


> Objetos Output, que a su vez pueden contener otros objetos Output
>
> 








## Methods

### __toString
Devuelve la cadena de texto


**OutputAggregate::__toString**() : string



---


### style
Asigna un estilo a este elemento


**OutputAggregate::style**([Style](../../../Style.md) $style) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### getStyle
Devuelve el estilo


**OutputAggregate::getStyle**() : [Style](../../../Style.md)



---


### apply
Aplica un estilo y da por finalizada la definición de elemento


**OutputAggregate::apply**([Style](../../../Style.md) $style) : [OutputAggregate](../../../OutputAggregate.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### setParent
Asigna un objeto OutputAggregate como padre de este elemento


protected **OutputAggregate::setParent**([OutputAggregate](../../../OutputAggregate.md) $parent) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[OutputAggregate](../../../OutputAggregate.md) |$parent |  |

---


### end
Da por finalizada la definición de este elemento, y devuelve el padre


**OutputAggregate::end**() : [OutputAggregate](../../../OutputAggregate.md)



---


### __construct
OutputAggregate constructor.


protected **OutputAggregate::__construct**() : 



---


### stringify
__toString alias


**OutputAggregate::stringify**(string $format = null) : string


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |

---


### add
Añade un elemento


protected **OutputAggregate::add**([Output](../../../Output.md) $output) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[Output](../../../Output.md) |$output |  |

---


### count
Devuelve el número de elementos


**OutputAggregate::count**() : int



---


### getSeparator
Devuelve el caracter separador


abstract protected **OutputAggregate::getSeparator**() : string



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                