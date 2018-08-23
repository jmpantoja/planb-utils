
                                                                                                                                            
    
# Paragraph


> Representa a un bloque de texto con un estilo comun
>
> 


## Traits
- PlanB\DS\ItemList\Traits\Accessors




## Properties
- items
- resolution


## Methods

### add



**Paragraph::add**(mixed $value) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

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


protected **Paragraph::__construct**([Text](../../../Text.md) $text) : 


|Parameters: | | |
| --- | --- | --- |
|[Text](../../../Text.md) |$text |  |

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


### create
Paragraph Named Constructor.


static **Paragraph::create**(string $format, mixed ...$arguments) : [Paragraph](../../../Paragraph.md)


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |
|mixed |...$arguments |  |

---


### getInnerType
Devuelve el tipo de la lista


**Paragraph::getInnerType**() : null|string



---


### parent
Asigna el mensaje padre


**Paragraph::parent**([Message](../../../Message.md) $parent) : [Paragraph](../../../Paragraph.md)


|Parameters: | | |
| --- | --- | --- |
|[Message](../../../Message.md) |$parent |  |

---


### style
Asigna el estilo


**Paragraph::style**([Style](../../../Style.md) $style) : [Paragraph](../../../Paragraph.md)


|Parameters: | | |
| --- | --- | --- |
|[Style](../../../Style.md) |$style |  |

---


### padding



**Paragraph::padding**(int $left, int $right = null) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|int |$left |  |
|int |$right |  |

---


### align
Asigna una alineación para el texto


**Paragraph::align**([Align](../../../Align.md) $align) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|[Align](../../../Align.md) |$align |  |

---


### expandTo
Asigna un nuevo ancho de párrafo


**Paragraph::expandTo**(int $width) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|int |$width |  |

---


### render
Devuelve el texto formateado


**Paragraph::render**() : [Text](../../../Text.md)



---


### getMaxLength
Devuelve la longitud máxima, sin incluir el padding


**Paragraph::getMaxLength**() : int



---


### end
Finaliza la configuración y devuelve el padre


**Paragraph::end**() : [Message](../../../Message.md)



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                