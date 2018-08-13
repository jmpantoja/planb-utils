
                                                                                                                                            
    
# Line


> Una linea singular del mensaje
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


### getStyle
Devuelve el estilo de este elemento


**Line::getStyle**() : [Style](../../../Style.md)



---


### mergeStyle
Mezcla el estilo de este elemento con otro


**Line::mergeStyle**([Style](../../../Style.md) $style) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### render
Devuelve el contenido expandido de esta linea, con el estilo aplicado


**Line::render**([Style](../../../Style.md) $style) : string


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### foregroundColor
Asigna el color del texto


**Line::foregroundColor**([Color](../../../Color.md) $color) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[Color](../../../Color.md) |$color |  |

---


### backgroundColor
Asigna el color del fondo


**Line::backgroundColor**([Color](../../../Color.md) $color) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[Color](../../../Color.md) |$color |  |

---


### option
Asigna una opción al texto


**Line::option**([Option](../../../Option.md) $option) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[Option](../../../Option.md) |$option |  |

---


### align
Asigna una alineación al texto


**Line::align**([Align](../../../Align.md) $align) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[Align](../../../Align.md) |$align |  |

---


### getText
Devuelve el texto


**Line::getText**() : string



---


### create
Line Named constructor.


static **Line::create**(string $content) : [Line](../../../Line.md)


|Parameters: | | |
| --- | --- | --- |
|string |$content |  |

---


### length
Devuelve el ancho de la linea, sin contar etiquetas


**Line::length**() : int



---


### taggedTextLength
Devuelve la longitud del texto que no se imprime por formar parte de las etiquetas


**Line::taggedTextLength**() : int



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                