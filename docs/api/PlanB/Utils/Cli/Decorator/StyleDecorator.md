
                                                                                                                                            
    
# StyleDecorator


> Añade las etiquetas de estilo
>
> 




## Constants
- FORMAT




## Methods

### __construct
AbstractDecorator constructor.


protected **StyleDecorator::__construct**() : 



---


### create
Decorator named constructor


static **StyleDecorator::create**() : [DecoratorInterface](../../../../DecoratorInterface.md)



---


### decorate



**StyleDecorator::decorate**([Line](../../../../Line.md) $line, [Style](../../../../Style.md) $style, [Spacing](../../../../Spacing.md) $spacing) : [Line](../../../../Line.md)


|Parameters: | | |
| --- | --- | --- |
|[Line](../../../../Line.md) |$line |  |
|[Style](../../../../Style.md) |$style |  |
|[Spacing](../../../../Spacing.md) |$spacing |  |

---


### wrap
Envuelve una cadena de texto con las etiquetas de estilo


protected **StyleDecorator::wrap**([Line](../../../../Line.md) $line, [Style](../../../../Style.md) $style) : [Line](../../../../Line.md)|[Text](../../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|[Line](../../../../Line.md) |$line |  |
|[Style](../../../../Style.md) |$style |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                