
                                                                                                                                            
    
# Line


> Una linea que forma parte de un parrafo
>
> 




## Constants
- LINE_BREAK
- EMPTY_TEXT
- BLANK_TEXT




## Methods

### __construct
Line constructor.


protected **Line::__construct**(string $text) : 


|Parameters: | | |
| --- | --- | --- |
|string |$text |  |

---


### create
Crea una nueva instancia


static **Line::create**(mixed $text = &#039;&#039;) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$text |  |

---


### format
Crea una nueva instancia


static **Line::format**(string $format, mixed ...$arguments) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |
|mixed |...$arguments |  |

---


### concat
Crea una nueva instancia concatenando varias cadenas de texto


static **Line::concat**(mixed ...$pieces) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |...$pieces |  |

---


### overwite
Cambia el valor del texto (inmutable)


**Line::overwite**(string $text) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$text |  |

---


### stringify



**Line::stringify**() : string



---


### __toString
Devuelve la cadena de texto


**Line::__toString**() : string



---


### isEmpty
Indica si es una cadena vacia


**Line::isEmpty**() : bool



---


### isBlank
Indica si la cadena está compuesta unicamente por espacios en blanco


**Line::isBlank**() : bool



---


### getLength
Devuelve la longitud de la cadena


**Line::getLength**() : int



---


### trim
Devuelve una nueva instancia, con los espacios en blanco (u otros caracteres)
eliminados del comienzo y del final de la cadena


**Line::trim**(string $charlist = &quot; \t\n\r\0\v&quot;) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$charlist |  |

---


### rtrim
Devuelve una nueva instancia, con los espacios en blanco (u otros caracteres)
eliminados del final de la cadena


**Line::rtrim**(string $charlist = &quot; \t\n\r\0\v&quot;) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$charlist |  |

---


### ltrim
Devuelve una nueva instancia, con los espacios en blanco (u otros caracteres)
eliminados del comienzo de la cadena


**Line::ltrim**(string $charlist = &quot; \t\n\r\0\v&quot;) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$charlist |  |

---


### toCamelCase
Transforma la cadena de texto a formato camelCase


**Line::toCamelCase**() : [Text](../../../Text.md)



---


### toSnakeCase
Transforma la cadena de texto a formato snake_case


**Line::toSnakeCase**(string $separator = &#039;_&#039;) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$separator |  |

---


### split
Divide una cadena mediante una expresión regular


**Line::split**(string $pattern, int $limit = -1, int $flags = 0) : [TextList](../../../TextList.md)


|Parameters: | | |
| --- | --- | --- |
|string |$pattern |  |
|int |$limit |  |
|int |$flags |  |

---


### explode
Divide una cadena en varias, mediante un delimitador


**Line::explode**(string $delimiter, int $limit = PHP_INT_MAX) : [TextList](../../../TextList.md)


|Parameters: | | |
| --- | --- | --- |
|string |$delimiter |  |
|int |$limit |  |

---


### toLower
Convierte una cadena a minusculas


**Line::toLower**() : [Text](../../../Text.md)



---


### toLowerFirst
Convierte el primer caracter de una cadena a minusculas


**Line::toLowerFirst**() : [Text](../../../Text.md)



---


### toUpper
Convierte una cadena a mayusculas


**Line::toUpper**() : [Text](../../../Text.md)



---


### toUpperFirst
Convierte el primer caracter de una cadena a mayusculas


**Line::toUpperFirst**() : [Text](../../../Text.md)



---


### append
Añade una cadena del texto al final de la actual


**Line::append**(string ...$pieces) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |...$pieces |  |

---


### replace
Usa una expresión regular para reemplazar segmentos de una cadena


**Line::replace**(string $pattern, callable $callback, int $limit = -1) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$pattern |  |
|callable |$callback |  |
|int |$limit |  |

---


### padding
Añade padding a la cadena


**Line::padding**(int $lenght, string $char = self::BLANK_TEXT, int $mode = STR_PAD_RIGHT) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|int |$lenght |  |
|string |$char |  |
|int |$mode |  |

---


### stripTags
Elimina html tags


**Line::stripTags**(string $allowableTags = null) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$allowableTags |  |

---


### render
Aplica un estilo al texto de la linea


**Line::render**([Style](../../../Style.md) $style, [Spacing](../../../Spacing.md) $spacing) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |
|[Spacing](../../../Spacing.md) |$spacing |  |

---


### getContentLength
Devuelve la longitud de la cadena, sin tener en cuenta las etiquetas


**Line::getContentLength**() : int



---


### getTagsLength
Devuelve la longitud del texto ocupado por etiquetas


**Line::getTagsLength**() : int



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                