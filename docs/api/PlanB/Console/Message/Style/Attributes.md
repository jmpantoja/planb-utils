
                                                                                                                                            
    
# Attributes


> Representa a los atributos de un tag
>
> 


## Traits
- PlanB\Utils\Traits\Stringify






## Methods

### stringify
__toString alias


**Attributes::stringify**() : string



---


### __toString
Devuelve la cadena de texto


**Attributes::__toString**() : string



---


### make
Attributes named constructor.


static **Attributes::make**() : [Attributes](../../../../Attributes.md)



---


### fromString
Attributes named constructor.


static **Attributes::fromString**(string $content) : [Attributes](../../../../Attributes.md)


|Parameters: | | |
| --- | --- | --- |
|string |$content |  |

---


### __construct
Attributes constructor.


protected **Attributes::__construct**([Color](../../../../Color.md) $fgColor, [Color](../../../../Color.md) $bgColor, [OptionList](../../../../OptionList.md) $options) : 


|Parameters: | | |
| --- | --- | --- |
|[Color](../../../../Color.md) |$fgColor |  |
|[Color](../../../../Color.md) |$bgColor |  |
|[OptionList](../../../../OptionList.md) |$options |  |

---


### blend
Devuelve el resultado de mezclar este objeto con otro


**Attributes::blend**([Attributes](../../../../Attributes.md) $attributes) : [Attributes](../../../../Attributes.md)


|Parameters: | | |
| --- | --- | --- |
|[Attributes](../../../../Attributes.md) |$attributes |  |

---


### setForegroundColor
Asigna el color del texto


**Attributes::setForegroundColor**([Color](../../../../Color.md) $color) : [Attributes](../../../../Attributes.md)


|Parameters: | | |
| --- | --- | --- |
|[Color](../../../../Color.md) |$color |  |

---


### getForegroundColor
Devuelve el color del texto


**Attributes::getForegroundColor**() : [Color](../../../../Color.md)



---


### setBackgroundColor
Asigna el color de fondo


**Attributes::setBackgroundColor**([Color](../../../../Color.md) $color) : [Attributes](../../../../Attributes.md)


|Parameters: | | |
| --- | --- | --- |
|[Color](../../../../Color.md) |$color |  |

---


### getBackgroundColor
Devuelve el color de fondo


**Attributes::getBackgroundColor**() : [Color](../../../../Color.md)



---


### getOptions
Devuelve la lista de opciones


**Attributes::getOptions**() : [OptionList](../../../../OptionList.md)



---


### addOption
Añade una opcion (bold|blink|reverse|underscore)


**Attributes::addOption**(mixed $option) : [Attributes](../../../../Attributes.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$option |  |

---


### isEmpty
Indica si hay algún atributo distinto a los dados por defecto


**Attributes::isEmpty**() : bool



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                