
                                                                                                                                            
    
# Output


> Clase abstracta comun a todos los elementos que se pueden mostar por consola
>
> 








## Methods

### __toString
Devuelve la cadena de texto


**Output::__toString**() : string



---


### style
Asigna un estilo a este elemento


**Output::style**([Style](../../../Style.md) $style) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### getStyle
Devuelve el estilo


**Output::getStyle**() : [Style](../../../Style.md)



---


### apply
Aplica un estilo y da por finalizada la definición de elemento


**Output::apply**([Style](../../../Style.md) $style) : [OutputAggregate](../../../OutputAggregate.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### setParent
Asigna un objeto OutputAggregate como padre de este elemento


protected **Output::setParent**([OutputAggregate](../../../OutputAggregate.md) $parent) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[OutputAggregate](../../../OutputAggregate.md) |$parent |  |

---


### end
Da por finalizada la definición de este elemento, y devuelve el padre


**Output::end**() : [OutputAggregate](../../../OutputAggregate.md)



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                