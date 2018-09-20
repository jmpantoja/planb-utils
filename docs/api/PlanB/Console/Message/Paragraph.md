
                                                                                                                                            
    
# Paragraph


> 
>
> 


## Traits
- PlanB\DS\ItemList\Traits\Accessors




## Properties
- items
- resolution


## Methods

### add



**Paragraph::add**(mixed $paragraph) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$paragraph |  |

---


### addAll



**Paragraph::addAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### clearAndAdd



**Paragraph::clearAndAdd**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### set



**Paragraph::set**(mixed $key, mixed $value) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### setAll



**Paragraph::setAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### clearAndSet



**Paragraph::clearAndSet**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### get



**Paragraph::get**(mixed $key, mixed|null $default = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed|null |$default |  |

---


### exists



**Paragraph::exists**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### has



**Paragraph::has**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### remove



**Paragraph::remove**(mixed $key) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### clear



**Paragraph::clear**() : [ListInterface](../../../ListInterface.md)



---


### tryAddItem
Resuelve y añade un item


protected **Paragraph::tryAddItem**([Item](../../../Item.md) $item) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[Item](../../../Item.md) |$item |  |

---


### __construct
Paragraph constructor.


protected **Paragraph::__construct**([iterable](../../../iterable.md) $input) : 


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### customize
Configura el comportamiento de  la lista


protected **Paragraph::customize**() : void



---


### count



**Paragraph::count**() : int



---


### isEmpty



**Paragraph::isEmpty**() : bool



---


### each



**Paragraph::each**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### map



**Paragraph::map**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### filter



**Paragraph::filter**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### search



**Paragraph::search**(callable $callable, mixed ...$userdata) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### find



**Paragraph::find**(callable $callable, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### reduce



**Paragraph::reduce**(callable $callable, mixed|null $initial = null, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed|null |$initial |  |
|mixed |...$userdata |  |

---


### toArray



**Paragraph::toArray**(callable $callable = null, mixed ...$userdata) : mixed[]


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### getIterator
Retrieve an external iterator


**Paragraph::getIterator**() : [Traversable](../../../Traversable.md)



---


### jsonSerialize
Specify data which should be serialized to JSON


**Paragraph::jsonSerialize**() : mixed



---


### toJson
Convierte el array en una cadena json


**Paragraph::toJson**(int $options = 0, int $depth = 512) : string


|Parameters: | | |
| --- | --- | --- |
|int |$options |  |
|int |$depth |  |

---


### silentExceptions
Silencia las excepciones


**Paragraph::silentExceptions**() : [ListInterface](../../../ListInterface.md)



---


### throwException
Hook para lanzar una excepción personalizada


**Paragraph::throwException**(callable $callback) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### addHydrator
Añade un hydrator


**Paragraph::addHydrator**(string $type, callable $hydrator) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$hydrator |  |

---


### addValidator
Añade un validador


**Paragraph::addValidator**(callable $validator, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$order |  |

---


### addNormalizer
Añade un normalizador


**Paragraph::addNormalizer**(callable $normalizer, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$order |  |

---


### addKeyNormalizer
Añade un normalizador de clave


**Paragraph::addKeyNormalizer**(callable $normalizer, int $order = 1) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$order |  |

---


### __debugInfo
Devuelve la informacion relevante para un debug


**Paragraph::__debugInfo**() : array|mixed[]



---


### max
Devuelve el valor máximo
El valor a comparar se calcula con un callback


**Paragraph::max**(callable $callback) : null


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### min
Devuelve el valor mínimo
El valor a comparar se calcula con un callback


**Paragraph::min**(callable $callback) : null


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### getInnerType
Devuelve el tipo de la lista


**Paragraph::getInnerType**() : null|string



---


### create
Paragraph named constructor.


static **Paragraph::create**([iterable](../../../iterable.md) $input) : [Paragraph](../../../Paragraph.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### getLines
Devuelve una lista con todas las lineas que componen el párrafo


**Paragraph::getLines**() : [ItemList](../../../ItemList.md)|[ListInterface](../../../ListInterface.md)



---


### render
Devuelve el texto con el estilo aplicado


**Paragraph::render**() : [Text](../../../Text.md)



---


### blink
Añade la opción blink al texto


**Paragraph::blink**() : [Paragraph](../../../Paragraph.md)



---


### bold
Añade la opción bold al texto


**Paragraph::bold**() : [Paragraph](../../../Paragraph.md)



---


### underscore
Añade la opción underscore al texto


**Paragraph::underscore**() : [Paragraph](../../../Paragraph.md)



---


### reverse
Añade la opción reverse al texto


**Paragraph::reverse**() : [Paragraph](../../../Paragraph.md)



---


### fgColor
Añade color al texto


**Paragraph::fgColor**(string|[Color](../../../Color.md) $color) : [Paragraph](../../../Paragraph.md)


|Parameters: | | |
| --- | --- | --- |
|string|[Color](../../../Color.md) |$color |  |

---


### bgColor
Añade color de fondo  al texto


**Paragraph::bgColor**([Color](../../../Color.md)|string $color) : [Paragraph](../../../Paragraph.md)


|Parameters: | | |
| --- | --- | --- |
|[Color](../../../Color.md)|string |$color |  |

---


### padding
Asigna el padding


**Paragraph::padding**(int $left = 0, int $right = null) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|int |$left |  |
|int |$right |  |

---


### margin
Asigna el margin


**Paragraph::margin**(int $left = 0, int $right = null) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|int |$left |  |
|int |$right |  |

---


### left
Alinea el texto a la izquierda


**Paragraph::left**() : [$this](../../../$this.md)



---


### right
Alinea el texto a la derecha


**Paragraph::right**() : [$this](../../../$this.md)



---


### center
Alinea el texto al centro


**Paragraph::center**() : [$this](../../../$this.md)



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                