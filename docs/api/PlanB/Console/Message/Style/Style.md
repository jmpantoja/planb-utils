
                                                                                                                                            
    
# Style


> El estilo de un texto
>
> 






## Properties
- padding


## Methods

### make
Style named constructor.


static **Style::make**() : [Style](../../../../Style.md)



---


### __construct
Style constructor.


protected **Style::__construct**([HorizontalSpace](../../../../HorizontalSpace.md) $padding, [HorizontalSpace](../../../../HorizontalSpace.md) $margin, [Position](../../../../Position.md) $position, [Attributes](../../../../Attributes.md) $attributes) : 


|Parameters: | | |
| --- | --- | --- |
|[HorizontalSpace](../../../../HorizontalSpace.md) |$padding |  |
|[HorizontalSpace](../../../../HorizontalSpace.md) |$margin |  |
|[Position](../../../../Position.md) |$position |  |
|[Attributes](../../../../Attributes.md) |$attributes |  |

---


### blend
Devuelve el resultado de mezclar este objeto con otro


**Style::blend**([Style](../../../../Style.md) $style) : [Style](../../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../../Style.md) |$style |  |

---


### clone
Devuelve un clon de esta instancia


**Style::clone**() : [Style](../../../../Style.md)



---


### padding
Asigna el padding


**Style::padding**(int $left = 0, int $right = null) : [Style](../../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|int |$left |  |
|int |$right |  |

---


### getAttributes
Devuelve los attributos


**Style::getAttributes**() : [Attributes](../../../../Attributes.md)



---


### getPaddingLeft
Devuelve el padding izquierdo


**Style::getPaddingLeft**() : string



---


### getPaddingRight
Devuelve el padding derecho


**Style::getPaddingRight**() : string



---


### margin
Asigna el margin


**Style::margin**(int $left = 0, int $right = null) : [Style](../../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|int |$left |  |
|int |$right |  |

---


### getMarginLeft
Devuelve el margen izquierdo


**Style::getMarginLeft**() : int|string



---


### getMarginRight
Devuelve el margen derecho


**Style::getMarginRight**() : string



---


### expandTo
Asigna una posición


**Style::expandTo**(int $width, [Align](../../../../Align.md) $align = null) : [Style](../../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|int |$width |  |
|[Align](../../../../Align.md) |$align |  |

---


### getWidth
Devuelve el ancho de la linea


**Style::getWidth**() : int



---


### getSpacingLenght
Devuelve la longitud asociada espacios en blanco, (padding y margin)


**Style::getSpacingLenght**() : int



---


### getAlign
Devuelve la alineación


**Style::getAlign**() : [Align](../../../../Align.md)



---


### option
Asigna una opción al estilo


**Style::option**([Option](../../../../Option.md) $option) : [Style](../../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[Option](../../../../Option.md) |$option |  |

---


### foregroundColor



**Style::foregroundColor**([Color](../../../../Color.md) $color) : [Style](../../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[Color](../../../../Color.md) |$color |  |

---


### backgroundColor



**Style::backgroundColor**([Color](../../../../Color.md) $color) : [Style](../../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[Color](../../../../Color.md) |$color |  |

---


### getOpenTag
Devuelve la etiqueta de apertura


**Style::getOpenTag**() : [Text](../../../../Text.md)



---


### getCloseTag
Devuelve la etiqueta de cierre


**Style::getCloseTag**() : [Text](../../../../Text.md)



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                