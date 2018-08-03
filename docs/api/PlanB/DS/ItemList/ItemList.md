
                                                                                                                                            
    
# ItemList


> Generic Collection
>
> 


## Traits
- PlanB\DS\ItemList\Traits\Accessors




## Properties
- items
- resolverBag


## Methods

### add
Agrega un elemento a la colección


**ItemList::add**(mixed $value) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### addAll
Agrega un conjunto de elementos


**ItemList::addAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### set
Agrega una pareja clave/valor a la colección


**ItemList::set**(mixed $key, mixed $value) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### setAll
Agrega un conjunto de parejas clave/valor


**ItemList::setAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### get
Devuelve un elemento


**ItemList::get**(mixed $key, mixed|null $default = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed|null |$default |  |

---


### exists
Indica si un elemento existe


**ItemList::exists**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### has
exists alias


**ItemList::has**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### remove
Elimina un elemento


**ItemList::remove**(mixed $key) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### __construct
ArrayList constructor.


**ItemList::__construct**() : 



---


### addResolver
Añade un nuevo resolver


**ItemList::addResolver**(callable|[ResolverInterface](../../../ResolverInterface.md) $resolver, int $priority = 0) : [ListInterface](../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable|[ResolverInterface](../../../ResolverInterface.md) |$resolver |  |
|int |$priority |  |

---


### customize
Configura la lista


protected **ItemList::customize**([ResolverBag](../../../ResolverBag.md) $resolverBag) : void


|Parameters: | | |
| --- | --- | --- |
|[ResolverBag](../../../ResolverBag.md) |$resolverBag |  |

---


### ignoreOnInvalid
Configura la Lista para que no se lanzen excepciones
cuando se trata de añadir un valor invalido


**ItemList::ignoreOnInvalid**() : [ListInterface](../../../ListInterface.md)



---


### count
Devuelve el número total de elementos


**ItemList::count**() : int



---


### isEmpty
Indica si la colección está vacia


**ItemList::isEmpty**() : bool



---


### each
Ejecuta una acción para cada elemento de la colección


**ItemList::each**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### map
Devuelve el resultado de aplicar una acción a cada elemento de la colección
La colección original permanece inmutable

**ItemList::map**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### filter
Devuelve una colección con los elementos que cumplen un criterio


**ItemList::filter**(callable $callable, mixed ...$userdata) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### search
Devuelve el primer elemento que cumpla con el criterio,
o nulo si no encuentra ninguno


**ItemList::search**(callable $callable, mixed ...$userdata) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### find
Devuelve el primer elemento que cumpla con el criterio,
o lanza una excepción si no encuentra ninguno


**ItemList::find**(callable $callable, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### reduce
Reduce una colección, a un unico valor


**ItemList::reduce**(callable $callable, mixed|null $initial = null, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed|null |$initial |  |
|mixed |...$userdata |  |

---


### toArray
Devuelve un array con los elementos de la colección


**ItemList::toArray**(callable $callable = null, mixed ...$userdata) : mixed[]


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### getIterator
Retrieve an external iterator


**ItemList::getIterator**() : [Traversable](../../../Traversable.md)



---


### jsonSerialize
Specify data which should be serialized to JSON


**ItemList::jsonSerialize**() : mixed



---


### toJson
Convierte el array en una cadena json


**ItemList::toJson**(int $options = 0, int $depth = 512) : string


|Parameters: | | |
| --- | --- | --- |
|int |$options |  |
|int |$depth |  |

---


### create
Crea una instancia a partir de un conjunto de valores


static **ItemList::create**([iterable](../../../iterable.md) $input = []) : [ItemList](../../../ItemList.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                