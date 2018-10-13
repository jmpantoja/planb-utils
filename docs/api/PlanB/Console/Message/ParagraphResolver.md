
                                                                                                                                            
    
# ParagraphResolver


> Resolver de la clase Paragraph
>
> 




## Constants
- HIGHT_PRIORITY
- NORMAL_PRIORITY
- LOW_PRIORITY




## Methods

### __construct
ParagraphResolver constructor.


protected **ParagraphResolver::__construct**([Style](../../../Style.md) $style) : 


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### configure
Configura este resolver


**ParagraphResolver::configure**() : void



---


### isEmpty
Indica si aun no se han añadido reglas


**ParagraphResolver::isEmpty**() : bool



---


### type
Asigna un tipo a este resolver


**ParagraphResolver::type**(string $type) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### getType
Devuelve el tipo de este resolver


**ParagraphResolver::getType**() : null|[DataType](../../../DataType.md)



---


### loader
Añade un nuevo loader


**ParagraphResolver::loader**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### rule
Añade una nueva regla


**ParagraphResolver::rule**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### converter
Añade un nuevo converter


**ParagraphResolver::converter**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### validator
Añade un nuevo converter


**ParagraphResolver::validator**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### filter
Añade un nuevo filter


**ParagraphResolver::filter**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### value
Resuelve un valor


**ParagraphResolver::value**(callable $callback, mixed $value, mixed $key = null) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|mixed |$value |  |
|mixed |$key |  |

---


### values
Resuelve un conjunto de valores


**ParagraphResolver::values**(callable $callback, [iterable](../../../iterable.md) $values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|[iterable](../../../iterable.md) |$values |  |

---


### make
Named Constructor


static **ParagraphResolver::make**([Style](../../../Style.md) $style) : [ParagraphResolver](../../../ParagraphResolver.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                