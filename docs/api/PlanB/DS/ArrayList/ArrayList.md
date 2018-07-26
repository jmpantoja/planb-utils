
                                                                                                                                            
    
# ArrayList


> Generic Collection
>
> 


## Traits
- PlanB\DS\ArrayList\Traits\Mutators
- PlanB\DS\ArrayList\Traits\ConfigureResolver




## Properties
- items
- itemResolver


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


### remove
Elimina un elemento


**ArrayList::remove**(mixed $key) : [$this](../../../$this.md)


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


### blank
Crea una lista vacia


static **ArrayList::blank**() : [ArrayList](../../../ArrayList.md)



---


### fromArray
Crea una instancia a partir de un conjunto de valores


static **ArrayList::fromArray**([iterable](../../../iterable.md) $input) : [ArrayList](../../../ArrayList.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### bind
Crea una lista a partir de un itemResolver


static **ArrayList::bind**([ItemResolver](../../../ItemResolver.md) $resolver, [iterable](../../../iterable.md) $input = []) : [ArrayList](../../../ArrayList.md)


|Parameters: | | |
| --- | --- | --- |
|[ItemResolver](../../../ItemResolver.md) |$resolver |  |
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


### getIterator
Retrieve an external iterator


**ArrayList::getIterator**() : [Traversable](../../../Traversable.md)



---


### jsonSerialize
Specify data which should be serialized to JSON


**ArrayList::jsonSerialize**() : mixed



---


### toJson
Convierte el array en una cadena json


**ArrayList::toJson**(int $options = 0, int $depth = 512) : string


|Parameters: | | |
| --- | --- | --- |
|int |$options | [optional]</p>

<p>

                    Bitmask consisting of <b>JSON_HEX_QUOT</b>,
                    <b>JSON_HEX_TAG</b>,
                    <b>JSON_HEX_AMP</b>,
                    <b>JSON_HEX_APOS</b>,
                    <b>JSON_NUMERIC_CHECK</b>,
                    <b>JSON_PRETTY_PRINT</b>,
                    <b>JSON_UNESCAPED_SLASHES</b>,
                    <b>JSON_FORCE_OBJECT</b>,
                    <b>JSON_UNESCAPED_UNICODE</b>. The behaviour of these
                    constants is described on
                    the JSON constants page. |
|int |$depth | [optional]</p>

<p>&lt;</p>

<p>p>
                    Set the
                    maximum depth.
                    Must be
                    greater than
                    zero. |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                