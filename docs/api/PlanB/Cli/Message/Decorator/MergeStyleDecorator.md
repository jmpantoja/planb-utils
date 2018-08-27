
                                                                                                                                            
    
# MergeStyleDecorator


> Mezcla los estilos de posibles etiquetas del texto, con el estilo global
>
> 




## Constants
- FORMAT
- TAG_PATTERN




## Methods

### __construct
AbstractDecorator constructor.


protected **MergeStyleDecorator::__construct**() : 



---


### create
Decorator named constructor


static **MergeStyleDecorator::create**() : [DecoratorInterface](../../../../DecoratorInterface.md)



---


### decorate



**MergeStyleDecorator::decorate**([Line](../../../../Line.md) $line, [Style](../../../../Style.md) $style, [Spacing](../../../../Spacing.md) $spacing) : [Line](../../../../Line.md)


|Parameters: | | |
| --- | --- | --- |
|[Line](../../../../Line.md) |$line |  |
|[Style](../../../../Style.md) |$style |  |
|[Spacing](../../../../Spacing.md) |$spacing |  |

---


### wrap
Envuelve una cadena de texto con las etiquetas de estilo


protected **MergeStyleDecorator::wrap**([Line](../../../../Line.md) $line, [Style](../../../../Style.md) $style) : [Line](../../../../Line.md)|[Text](../../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|[Line](../../../../Line.md) |$line |  |
|[Style](../../../../Style.md) |$style |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                