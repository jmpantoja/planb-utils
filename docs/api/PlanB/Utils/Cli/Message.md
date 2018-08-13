
                                                                                                                                            
    
# Message


> Un mensaje de texto, formateado para mostrarlo por consola
>
> 








## Methods

### __construct
Message constructor.


protected **Message::__construct**() : 



---


### getStyle
Devuelve el estilo de este elemento


**Message::getStyle**() : [Style](../../../Style.md)



---


### mergeStyle
Mezcla el estilo de este elemento con otro


**Message::mergeStyle**([Style](../../../Style.md) $style) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### render
Devuelve el contenido expandido de esta linea, con el estilo aplicado


**Message::render**([Style](../../../Style.md) $style) : string


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### foregroundColor
Asigna el color del texto


**Message::foregroundColor**([Color](../../../Color.md) $color) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[Color](../../../Color.md) |$color |  |

---


### backgroundColor
Asigna el color del fondo


**Message::backgroundColor**([Color](../../../Color.md) $color) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[Color](../../../Color.md) |$color |  |

---


### option
Asigna una opción al texto


**Message::option**([Option](../../../Option.md) $option) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[Option](../../../Option.md) |$option |  |

---


### align
Asigna una alineación al texto


**Message::align**([Align](../../../Align.md) $align) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[Align](../../../Align.md) |$align |  |

---


### tab
Asigna el número de tabulaciones a izquierda y derecha


**Message::tab**(int $left, int $right = 0) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|int |$left |  |
|int |$right |  |

---


### create
Message camed constructor.


static **Message::create**() : [Message](../../../Message.md)



---


### count
Devuelve el número de lineas que componen este mensaje


**Message::count**() : int



---


### stringify
__toString alias


**Message::stringify**(string $format = null) : string


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |

---


### __toString
Devuelve la cadena de texto


**Message::__toString**() : string



---


### add
Añade una linea


**Message::add**(string $format, mixed ...$arguments) : [Message](../../../Message.md)


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |
|mixed |...$arguments |  |

---


### length
Devuelve la longitud de la línea más larga (sin etiquetas)


**Message::length**() : int



---


### expand



**Message::expand**() : [Message](../../../Message.md)



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                