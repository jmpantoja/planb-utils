
                                                                                                                                            
    
# ArrayList


> Generic Collection
>
> 


## Traits
- PlanB\DS\ArrayList\Traits\Mutators




## Properties
- items


## Methods

### add
Agrega un elemento a la colección


**ArrayList::add**(mixed $value) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### addAll
Agrega un conjunto de elementos


**ArrayList::addAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### set
Agrega una pareja clave/valor a la colección


**ArrayList::set**(mixed $key, mixed $value) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### setAll
Agrega un conjunto de parejas clave/valor


**ArrayList::setAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### get
Devuelve un elemento


**ArrayList::get**(mixed $key, mixed|null $default = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed|null |$default |  |

---


### exists
Indica si un elemento existe


**ArrayList::exists**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### has
exists alias


**ArrayList::has**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### unset
Elimina un elemento


**ArrayList::unset**(mixed $key) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### getResolverFor
Devuelve el objeto ItemResolver, configurado para una pareja clave/valor
Este resolver se construye bajo demanda, para poder ignorarlo en la serialización
y que se "autoconstruya" desde el nuevo objeto en la unserialización

Si, como parece lógico de primeras, se instanciara en el constructor de la clase, no se puede recuperar desde unserialize
y o bien perderiamos esa información, o bien tenemos que serializar datos + resolver

protected **ArrayList::getResolverFor**([KeyValue](../../../KeyValue.md) $first) : [ItemResolver](../../../ItemResolver.md)


|Parameters: | | |
| --- | --- | --- |
|[KeyValue](../../../KeyValue.md) |$first |  |

---


### configureResolver



protected **ArrayList::configureResolver**([ItemResolver](../../../ItemResolver.md) $resolver) : 


|Parameters: | | |
| --- | --- | --- |
|[ItemResolver](../../../ItemResolver.md) |$resolver |  |

---


### buildItemResolver
Crea el objecto ItemResolver
Hacer que la construcción del objeto ItemResolver dependa un KeyValue, nos permite ajustarlo al primer elemento
de la colección, y por consecuencia, crear colecciones agnosticas que tomen el tipo del primer elemento

protected **ArrayList::buildItemResolver**([KeyValue](../../../KeyValue.md) $first) : [ItemResolver](../../../ItemResolver.md)


|Parameters: | | |
| --- | --- | --- |
|[KeyValue](../../../KeyValue.md) |$first |  |

---


### __construct
ArrayList constructor.


**ArrayList::__construct**() : 



---


### fromArray
Crea una instancia a partir de un conjunto de valores


static **ArrayList::fromArray**([iterable](../../../iterable.md) $input) : [ArrayList](../../../ArrayList.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### count
Devuelve el número total de elementos


**ArrayList::count**() : int



---


### isEmpty
Indica si la colección está vacia


**ArrayList::isEmpty**() : bool



---


### each
Ejecuta una acción para cada elemento de la colección


**ArrayList::each**(callable $callable, mixed ...$userdata) : [ArrayList](../../../ArrayList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### map
Devuelve el resultado de aplicar una acción a cada elemento de la colección
La colección original permanece inmutable

**ArrayList::map**(callable $callable, mixed ...$userdata) : [ArrayList](../../../ArrayList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### filter
Devuelve una colección con los elementos que cumplen un criterio


**ArrayList::filter**(callable $callable, mixed ...$userdata) : [ArrayList](../../../ArrayList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### search
Devuelve el primer elemento que cumpla con el criterio,
o nulo si no encuentra ninguno


**ArrayList::search**(callable $callable, mixed ...$userdata) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### find
Devuelve el primer elemento que cumpla con el criterio,
o lanza una excepción si no encuentra ninguno


**ArrayList::find**(callable $callable, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### reduce
Reduce una colección, a un unico valor


**ArrayList::reduce**(callable $callable, mixed|null $initial = null, mixed ...$userdata) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed|null |$initial |  |
|mixed |...$userdata |  |

---


### toArray
Devuelve un array con los elementos de la colección


**ArrayList::toArray**(callable $callable = null, mixed ...$userdata) : mixed[]


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                