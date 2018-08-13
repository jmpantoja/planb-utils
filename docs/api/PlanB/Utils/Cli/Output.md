
                                                                                                                                            
    
# Output


> Objetos capaces de mostrarse por consola con un estilo determinado
>
> 








## Methods

### __construct
Line constructor.


protected **Output::__construct**() : 



---


### getStyle
Devuelve el estilo de este elemento


**Output::getStyle**() : [Style](../../../Style.md)



---


### mergeStyle
Mezcla el estilo de este elemento con otro


**Output::mergeStyle**([Style](../../../Style.md) $style) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### render
Devuelve el contenido expandido de esta linea, con el estilo aplicado


abstract **Output::render**([Style](../../../Style.md) $style) : string


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### foregroundColor
Asigna el color del texto


**Output::foregroundColor**([Color](../../../Color.md) $color) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[Color](../../../Color.md) |$color |  |

---


### backgroundColor
Asigna el color del fondo


**Output::backgroundColor**([Color](../../../Color.md) $color) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|[Color](../../../Color.md) |$color |  |

---


### option
Asigna una opción al texto


**Output::option**([Option](../../../Option.md) $option) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[Option](../../../Option.md) |$option |  |

---


### align
Asigna una alineación al texto


**Output::align**([Align](../../../Align.md) $align) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[Align](../../../Align.md) |$align |  |

---


### tab
Asigna el número de tabulaciones a izquierda y derecha


**Output::tab**(int $left, int $right = 0) : [Output](../../../Output.md)


|Parameters: | | |
| --- | --- | --- |
|int |$left |  |
|int |$right |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                