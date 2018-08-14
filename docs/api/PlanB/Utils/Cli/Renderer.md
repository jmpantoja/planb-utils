
                                                                                                                                            
    
# Renderer


> Utilidad para aplicar formato a un texo
>
> 




## Constants
- TAG_PATTERN
- TAB




## Methods

### __construct
Renderer constructor.


protected **Renderer::__construct**() : 



---


### create
Renderer Named Constructor.


static **Renderer::create**() : [Renderer](../../../Renderer.md)



---


### padding
Asigna


**Renderer::padding**(int $left, int $right = null) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|int |$left |  |
|int |$right |  |

---


### align
Asigna una alineación para el texto


**Renderer::align**([Align](../../../Align.md) $align) : [Paragraph](../../../Paragraph.md)


|Parameters: | | |
| --- | --- | --- |
|[Align](../../../Align.md) |$align |  |

---


### expandTo
Asigna el ancho requerido
(longitud máxima de las lineas del mensaje/parrafo)


**Renderer::expandTo**(int $width) : [Renderer](../../../Renderer.md)


|Parameters: | | |
| --- | --- | --- |
|int |$width |  |

---


### render
Devuelve un texto con un estilo aplicado


**Renderer::render**([Text](../../../Text.md) $text, [Style](../../../Style.md) $style) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|[Text](../../../Text.md) |$text |  |
|[Style](../../../Style.md) |$style |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                