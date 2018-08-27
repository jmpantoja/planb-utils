
                                                                                                                                            
    
# Text


> Representa una cadena de texto
>
> 


## Traits
- PlanB\Utils\Traits\Stringify


## Constants
- LINE_BREAK
- EMPTY_TEXT
- BLANK_TEXT




## Methods

### stringify



**Text::stringify**() : string



---


### __toString
Devuelve la cadena de texto


**Text::__toString**() : string



---


### __construct
Text constructor.


protected **Text::__construct**(string $text) : 


|Parameters: | | |
| --- | --- | --- |
|string |$text |  |

---


### create
Crea una nueva instancia


static **Text::create**(mixed $text = &#039;&#039;) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$text |  |

---


### format
Crea una nueva instancia


static **Text::format**(string $format, mixed ...$arguments) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |
|mixed |...$arguments |  |

---


### concat
Crea una nueva instancia concatenando varias cadenas de texto


static **Text::concat**(mixed ...$pieces) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |...$pieces |  |

---


### join
Crea una nueva instancia concatenando varias cadenas de texto


static **Text::join**(mixed ...$pieces) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |...$pieces |  |

---


### overwite
Cambia el valor del texto (inmutable)


**Text::overwite**(string $text) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$text |  |

---


### isEmpty
Indica si es una cadena vacia


**Text::isEmpty**() : bool



---


### isBlank
Indica si la cadena está compuesta unicamente por espacios en blanco


**Text::isBlank**() : bool



---


### getLength
Devuelve la longitud de la cadena


**Text::getLength**() : int



---


### trim
Devuelve una nueva instancia, con los espacios en blanco (u otros caracteres)
eliminados del comienzo y del final de la cadena


**Text::trim**(string $charlist = &quot; \t\n\r\0\v&quot;) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$charlist |  |

---


### rtrim
Devuelve una nueva instancia, con los espacios en blanco (u otros caracteres)
eliminados del final de la cadena


**Text::rtrim**(string $charlist = &quot; \t\n\r\0\v&quot;) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$charlist |  |

---


### ltrim
Devuelve una nueva instancia, con los espacios en blanco (u otros caracteres)
eliminados del comienzo de la cadena


**Text::ltrim**(string $charlist = &quot; \t\n\r\0\v&quot;) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$charlist |  |

---


### toCamelCase
Transforma la cadena de texto a formato camelCase


**Text::toCamelCase**() : [Text](../../../Text.md)



---


### toSnakeCase
Transforma la cadena de texto a formato snake_case


**Text::toSnakeCase**(string $separator = &#039;_&#039;) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$separator |  |

---


### split
Divide una cadena mediante una expresión regular


**Text::split**(string $pattern, int $limit = -1, int $flags = 0) : [TextList](../../../TextList.md)


|Parameters: | | |
| --- | --- | --- |
|string |$pattern |  |
|int |$limit |  |
|int |$flags |  |

---


### explode
Divide una cadena en varias, mediante un delimitador


**Text::explode**(string $delimiter, int $limit = PHP_INT_MAX) : [TextList](../../../TextList.md)


|Parameters: | | |
| --- | --- | --- |
|string |$delimiter |  |
|int |$limit |  |

---


### toLower
Convierte una cadena a minusculas


**Text::toLower**() : [Text](../../../Text.md)



---


### toLowerFirst
Convierte el primer caracter de una cadena a minusculas


**Text::toLowerFirst**() : [Text](../../../Text.md)



---


### toUpper
Convierte una cadena a mayusculas


**Text::toUpper**() : [Text](../../../Text.md)



---


### toUpperFirst
Convierte el primer caracter de una cadena a mayusculas


**Text::toUpperFirst**() : [Text](../../../Text.md)



---


### append
Añade una cadena del texto al final de la actual


**Text::append**(string ...$pieces) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |...$pieces |  |

---


### replace
Usa una expresión regular para reemplazar segmentos de una cadena


**Text::replace**(string $pattern, callable $callback, int $limit = -1) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$pattern |  |
|callable |$callback |  |
|int |$limit |  |

---


### padding
Añade padding a la cadena


**Text::padding**(int $lenght, string $char = self::BLANK_TEXT, int $mode = STR_PAD_RIGHT) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|int |$lenght |  |
|string |$char |  |
|int |$mode |  |

---


### stripTags
Elimina html tags


**Text::stripTags**(string $allowableTags = null) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$allowableTags |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                