
                                                                                                                                            
    
# Style


> Representa un estilo
>
> 








## Methods

### make
Style named constructor.


static **Style::make**() : [Style](../../../Style.md)



---


### __construct
Style constructor.


protected **Style::__construct**() : 



---


### getFgColorName
Devuelve el nombre del color del texto


**Style::getFgColorName**() : string



---


### setFgColor
Asgina el color del texto


**Style::setFgColor**([Color](../../../Color.md) $fgColor) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[Color](../../../Color.md) |$fgColor |  |

---


### getBgColorName
Devuelve el nombre del color de fondo


**Style::getBgColorName**() : string



---


### setBgColor
Asigna el color de fondo


**Style::setBgColor**([Color](../../../Color.md) $bgColor) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[Color](../../../Color.md) |$bgColor |  |

---


### isBold
Indica si existe el flag bold


**Style::isBold**() : bool



---


### bold
Aplica el flag bold


**Style::bold**() : [Style](../../../Style.md)



---


### isUnderscore
Indica si existe el flag underscore


**Style::isUnderscore**() : bool



---


### underscore
Aplica el flag underscore


**Style::underscore**() : [Style](../../../Style.md)



---


### padding
Aplica el padding a este estilo


**Style::padding**(int $left, int $right = null) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|int |$left |  |
|int |$right |  |

---


### getLeftPadding
Devuelve el padding izquierdo


**Style::getLeftPadding**() : int



---


### getRightPadding
Devuelve el padding derecho


**Style::getRightPadding**() : int



---


### margin
Aplica el padding a este estilo


**Style::margin**(int $left, int $right = null) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|int |$left |  |
|int |$right |  |

---


### getLeftMargin
Devuelve el margin izquierdo


**Style::getLeftMargin**() : int



---


### getRightMargin
Devuelve el margin derecho


**Style::getRightMargin**() : int



---


### lineWidth
Aplica el ancho de linea


**Style::lineWidth**(int $width) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|int |$width |  |

---


### getLineWidth
Devuelve el ancho del linea


**Style::getLineWidth**() : int



---


### align
Asigna la alineación


**Style::align**([Align](../../../Align.md) $align) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[Align](../../../Align.md) |$align |  |

---


### getAlignValue
Devuelve la alineación


**Style::getAlignValue**() : int



---


### expand
Hace que se expanda al ancho máximo de linea


**Style::expand**() : [Style](../../../Style.md)



---


### isExpand
Indica si se debe expandir


**Style::isExpand**() : bool



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                