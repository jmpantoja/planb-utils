
                                                                                                                                            
    
# Style


> Define el estilo de un objeto
>
> 




## Constants
- TAB
- PADDING_CHARACTER




## Methods

### __construct
Style constructor.


protected **Style::__construct**() : 



---


### create
Style Named Constructor


static **Style::create**() : [Style](../../../Style.md)



---


### merge
Combina este estilo con otro


**Style::merge**([Style](../../../Style.md) $style) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### width
Devuelve el ancho de linea


**Style::width**(int $width) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|int |$width |  |

---


### getWidth
Devuelve el ancho de linea


**Style::getWidth**() : int



---


### foreGroundColor
Asigna el color del texto


**Style::foreGroundColor**([Color](../../../Color.md) $color) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[Color](../../../Color.md) |$color |  |

---


### backGroundColor
Asigna el color del fondo


**Style::backGroundColor**([Color](../../../Color.md) $color) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[Color](../../../Color.md) |$color |  |

---


### option
Asigna una opción al texto


**Style::option**([Option](../../../Option.md) $option) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[Option](../../../Option.md) |$option |  |

---


### align
Asigna una alineación


**Style::align**([Align](../../../Align.md) $align) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[Align](../../../Align.md) |$align |  |

---


### tab
Asigna el número de tabulaciones a izquierda y derecha


**Style::tab**(int $left, int $right = 0) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|int |$left |  |
|int |$right |  |

---


### decorate
Envuelve el texto con el tag de estilo


**Style::decorate**([Line](../../../Line.md) $line) : string


|Parameters: | | |
| --- | --- | --- |
|[Line](../../../Line.md) |$line |  |

---


### isEmpty
Indica si se ha establecido algun estilo


**Style::isEmpty**() : bool



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                