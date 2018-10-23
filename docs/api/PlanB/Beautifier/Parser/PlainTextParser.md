
                                                                                                                                            
    
# PlainTextParser


> Aplica estilo a una template, en texto plano
>
> 




## Constants
- TAG_PATTERN




## Methods

### make
Parser constructor.


static **PlainTextParser::make**() : [Parser](../../../Parser.md)



---


### __construct
Parser constructor.


protected **PlainTextParser::__construct**() : 



---


### addDecorator
Añade un nuevo decorator


**PlainTextParser::addDecorator**([DecoratorInterface](../../../DecoratorInterface.md) $decorator) : [Parser](../../../Parser.md)


|Parameters: | | |
| --- | --- | --- |
|[DecoratorInterface](../../../DecoratorInterface.md) |$decorator |  |

---


### getDecorators
Devuelve un array con los decorators


**PlainTextParser::getDecorators**() : [DecoratorInterface](../../../DecoratorInterface.md)[]



---


### parse
Devuelve una template parseada


**PlainTextParser::parse**(string $template, array $replacements = []) : string


|Parameters: | | |
| --- | --- | --- |
|string |$template |  |
|array |$replacements |  |

---


### format
Devuelve un dumper parseado


**PlainTextParser::format**([FormatInterface](../../../FormatInterface.md) $format) : string


|Parameters: | | |
| --- | --- | --- |
|[FormatInterface](../../../FormatInterface.md) |$format |  |

---


### decorate
Devuelve un token parseado


**PlainTextParser::decorate**([Token](../../../Token.md) $token) : string


|Parameters: | | |
| --- | --- | --- |
|[Token](../../../Token.md) |$token |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                