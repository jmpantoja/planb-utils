
                                                                                                                                            
    
# TypedList


> Lista donde todos los elementos son del mismo tipo
>
> 


## Traits
- PlanB\DS\ItemList\Traits\Accessors




## Properties
- items
- resolverBag
- innerType


## Methods

### add
Agrega un elemento a la colección


**TypedList::add**(mixed $value) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### addAll
Agrega un conjunto de elementos


**TypedList::addAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### set
Agrega una pareja clave/valor a la colección


**TypedList::set**(mixed $key, mixed $value) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### setAll
Agrega un conjunto de parejas clave/valor


**TypedList::setAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### get
Devuelve un elemento


**TypedList::get**(mixed $key, mixed|null $default = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed|null |$default |  |

---


### exists
Indica si un elemento existe


**TypedList::exists**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### has
exists alias


**TypedList::has**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### remove
Elimina un elemento


**TypedList::remove**(mixed $key) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### __construct
ArrayList constructor.


**TypedList::__construct**(string $innerType) : 


|Parameters: | | |
| --- | --- | --- |
|string |$innerType |  |

---


### addResolver
Añade un nuevo resolver


**TypedList::addResolver**(callable|[ResolverInterface](../../../ResolverInterface.md) $resolver, int $priority = 0) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable|[ResolverInterface](../../../ResolverInterface.md) |$resolver |  |
|int |$priority |  |

---


### customize



protected **TypedList::customize**([ResolverBag](../../../ResolverBag.md) $resolverBag) : void


|Parameters: | | |
| --- | --- | --- |
|[ResolverBag](../../../ResolverBag.md) |$resolverBag |  |

---


### ignoreOnInvalid
Configura la Lista para que no se lanzen excepciones
cuando se trata de añadir un valor invalido


**TypedList::ignoreOnInvalid**() : [ListInterface](../../../ListInterface.md)



---


### count
Devuelve el número total de elementos


**TypedList::count**() : int



---


### isEmpty
Indica si la colección está vacia


**TypedList::isEmpty**() : bool



---


### each
Ejecuta una acción para cada elemento de la colección


**TypedList::each**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### map
Devuelve el resultado de aplicar una acción a cada elemento de la colección
La colección original permanece inmutable

**TypedList::map**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### filter
Devuelve una colección con los elementos que cumplen un criterio


**TypedList::filter**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### search
Devuelve el primer elemento que cumpla con el criterio,
o nulo si no encuentra ninguno


**TypedList::search**(callable $callable, mixed ...$userdata) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### find
Devuelve el primer elemento que cumpla con el criterio,
o lanza una excepción si no encuentra ninguno


**TypedList::find**(callable $callable, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### reduce
Reduce una colección, a un unico valor


**TypedList::reduce**(callable $callable, mixed|null $initial = null, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed|null |$initial |  |
|mixed |...$userdata |  |

---


### toArray
Devuelve un array con los elementos de la colección


**TypedList::toArray**(callable $callable = null, mixed ...$userdata) : mixed[]


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### getIterator
Retrieve an external iterator


**TypedList::getIterator**() : [Traversable](../../../Traversable.md)



---


### jsonSerialize
Specify data which should be serialized to JSON


**TypedList::jsonSerialize**() : mixed



---


### toJson
Convierte el array en una cadena json


**TypedList::toJson**(int $options = 0, int $depth = 512) : string


|Parameters: | | |
| --- | --- | --- |
|int |$options |  |
|int |$depth |  |

---


### create
Crea una instancia a partir de un conjunto de valores


static **TypedList::create**(string $innerType, [iterable](../../../iterable.md) $input = []) : [TypedList](../../../TypedList.md)


|Parameters: | | |
| --- | --- | --- |
|string |$innerType |  |
|[iterable](../../../iterable.md) |$input |  |

---


### getInnerType
Devuelve el tipo de la lista


**TypedList::getInnerType**() : string



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                