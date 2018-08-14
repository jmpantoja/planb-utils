
                                                                                                                                            
    
# Paragraph


> Representa a un bloque de texto con un estilo comun
>
> 








## Methods

### __construct
Paragraph constructor.


protected **Paragraph::__construct**([Text](../../../Text.md) $text) : 


|Parameters: | | |
| --- | --- | --- |
|[Text](../../../Text.md) |$text |  |

---


### create
Paragraph Named Constructor.


static **Paragraph::create**(string $format, mixed ...$arguments) : [Paragraph](../../../Paragraph.md)


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |
|mixed |...$arguments |  |

---


### render
Devuelve el texto formateado


**Paragraph::render**() : [Text](../../../Text.md)



---


### parent
Asigna el mensaje padre


**Paragraph::parent**([Message](../../../Message.md) $parent) : [Paragraph](../../../Paragraph.md)


|Parameters: | | |
| --- | --- | --- |
|[Message](../../../Message.md) |$parent |  |

---


### style
Asigna el estilo


**Paragraph::style**([Style](../../../Style.md) $style) : [Paragraph](../../../Paragraph.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### align
Asigna una alineación para el texto


**Paragraph::align**([Align](../../../Align.md) $align) : [Paragraph](../../../Paragraph.md)


|Parameters: | | |
| --- | --- | --- |
|[Align](../../../Align.md) |$align |  |

---


### padding



**Paragraph::padding**(int $left, int $right = null) : [Paragraph](../../../Paragraph.md)


|Parameters: | | |
| --- | --- | --- |
|int |$left |  |
|int |$right |  |

---


### getMaxLenght
Devuelve la longitud máxima


**Paragraph::getMaxLenght**() : int



---


### end
Finaliza la configuración y devuelve el padre


**Paragraph::end**() : [Message](../../../Message.md)



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                