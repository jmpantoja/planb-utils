
                                                                                                                                            
    
# Parser


> Aplica estilo a una template
>
> 




## Constants
- TAG_PATTERN




## Methods

### make
Parser constructor.


static **Parser::make**() : [Parser](../../../Parser.md)



---


### __construct
Parser constructor.


protected **Parser::__construct**() : 



---


### addDecorator
Añade un nuevo decorator


**Parser::addDecorator**([DecoratorInterface](../../../DecoratorInterface.md) $decorator) : [Parser](../../../Parser.md)


|Parameters: | | |
| --- | --- | --- |
|[DecoratorInterface](../../../DecoratorInterface.md) |$decorator |  |

---


### getDecorators
Devuelve un array con los decorators


**Parser::getDecorators**() : [DecoratorInterface](../../../DecoratorInterface.md)[]



---


### parse
Devuelve una template parseada


**Parser::parse**(string $template, array $replacements = []) : string


|Parameters: | | |
| --- | --- | --- |
|string |$template |  |
|array |$replacements |  |

---


### format
Devuelve un dumper parseado


**Parser::format**([FormatInterface](../../../FormatInterface.md) $format) : string


|Parameters: | | |
| --- | --- | --- |
|[FormatInterface](../../../FormatInterface.md) |$format |  |

---


### decorate
Devuelve un token parseado


**Parser::decorate**([Token](../../../Token.md) $token) : string


|Parameters: | | |
| --- | --- | --- |
|[Token](../../../Token.md) |$token |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                