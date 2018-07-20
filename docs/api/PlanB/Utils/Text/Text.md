
                                                                                                                                            
    
# Text


> Representa una cadena de texto
>
> 








## Methods

### __construct
Text constructor.


**Text::__construct**(string $text) : 


|Parameters: | | |
| --- | --- | --- |
|string |$text |  |

---


### create
Crea una nueva instancia


static **Text::create**(string $text = &#039;&#039;) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$text |  |

---


### overwite
Cambia el valor del texto (inmutable)


**Text::overwite**(string $text) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$text |  |

---


### stringify
__toString alias


**Text::stringify**() : string



---


### __toString
Devuelve la cadena de texto


**Text::__toString**() : string



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


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                