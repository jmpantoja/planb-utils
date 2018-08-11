
                                                                                                                                            
    
# Word


> Representa a una palabra con un estilo determinado
>
> 








## Methods

### __toString
Devuelve la cadena de texto


**Word::__toString**() : string



---


### style
Asigna un estilo a este elemento


**Word::style**([Style](../../../Style.md) $style) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### getStyle
Devuelve el estilo


**Word::getStyle**() : [Style](../../../Style.md)



---


### apply
Aplica un estilo y da por finalizada la definición de elemento


**Word::apply**([Style](../../../Style.md) $style) : [OutputAggregate](../../../OutputAggregate.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### setParent
Asigna un objeto OutputAggregate como padre de este elemento


protected **Word::setParent**([OutputAggregate](../../../OutputAggregate.md) $parent) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[OutputAggregate](../../../OutputAggregate.md) |$parent |  |

---


### end
Da por finalizada la definición de este elemento, y devuelve el padre


**Word::end**() : [OutputAggregate](../../../OutputAggregate.md)



---


### __construct
Word constructor.


protected **Word::__construct**(string $text) : 


|Parameters: | | |
| --- | --- | --- |
|string |$text |  |

---


### create
Crea una nueva instancia


static **Word::create**(string $format, string ...$arguments) : [Word](../../../Word.md)


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |
|string |...$arguments |  |

---


### stringify



**Word::stringify**(string $format = null) : string


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |

---


### parent
Asigna un objeto Line como padre de este elemento


**Word::parent**([Line](../../../Line.md) $line) : [Word](../../../Word.md)


|Parameters: | | |
| --- | --- | --- |
|[Line](../../../Line.md) |$line |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                