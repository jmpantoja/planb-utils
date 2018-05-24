
                                                                                                                                            
    
# Collection


> Generic Collection
>
> 


## Traits
- PlanB\Type\Collection\Traits\Mutators




## Properties
- items


## Methods

### itemAppend
Agrega un elemento a la colección


**Collection::itemAppend**(mixed $value) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### itemAppendAll
Agrega un conjunto de elementos


**Collection::itemAppendAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### itemSet
Agrega una pareja clave/valor a la colección


**Collection::itemSet**(mixed $key, mixed $value) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### itemSetAll
Agrega un conjunto de parejas clave/valor


**Collection::itemSetAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### itemGet
Devuelve un elemento


**Collection::itemGet**(mixed $key, mixed|null $default = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed|null |$default |  |

---


### itemExists
Indica si un elemento existe


**Collection::itemExists**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### itemUnset
Elimina un elemento


**Collection::itemUnset**(mixed $key) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### configure



protected **Collection::configure**([ItemResolver](../../../ItemResolver.md) $resolver) : 


|Parameters: | | |
| --- | --- | --- |
|[ItemResolver](../../../ItemResolver.md) |$resolver |  |

---


### __construct
Collection constructor.


**Collection::__construct**(string $type) : 


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### getType
Devuelve el tipo de la colleción


**Collection::getType**() : string



---


### count
Devuelve el número total de elementos


**Collection::count**() : int



---


### isEmpty
Indica si la colección está vacia


**Collection::isEmpty**() : bool



---


### each
Ejecuta una acción para cada elemento de la colección


**Collection::each**(callable $callable, mixed ...$userdata) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### map
Devuelve el resultado de aplicar una acción a cada elemento de la colección
La colección original permanece inmutable

**Collection::map**(callable $callable, mixed ...$userdata) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### filter
Devuelve una colección con los elementos que cumplen un criterio


**Collection::filter**(callable $callable, mixed ...$userdata) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### itemSearch
Devuelve el primer elemento que cumpla con el criterio,
o nulo si no encuentra ninguno


**Collection::itemSearch**(callable $callable, mixed ...$userdata) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### itemFind
Devuelve el primer elemento que cumpla con el criterio,
o lanza una excepción si no encuentra ninguno


**Collection::itemFind**(callable $callable, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### reduce
Reduce una colección, a un unico valor


**Collection::reduce**(callable $callable, mixed|null $initial = null, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed|null |$initial |  |
|mixed |...$userdata |  |

---


### toArray
Devuelve un array con los elementos de la colección


**Collection::toArray**(callable $callable = null, mixed ...$userdata) : mixed[]


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                