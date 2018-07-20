
                                                                                                                                            
    
# Collection


> Conjunto de datos del mismo tipo
>
> 


## Traits
- PlanB\DS\ArrayList\Traits\Mutators




## Properties
- items


## Methods

### add
Agrega un elemento a la colección


**Collection::add**(mixed $value) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### addAll
Agrega un conjunto de elementos


**Collection::addAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### set
Agrega una pareja clave/valor a la colección


**Collection::set**(mixed $key, mixed $value) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### setAll
Agrega un conjunto de parejas clave/valor


**Collection::setAll**([iterable](../../../iterable.md) $items) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$items |  |

---


### get
Devuelve un elemento


**Collection::get**(mixed $key, mixed|null $default = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed|null |$default |  |

---


### exists
Indica si un elemento existe


**Collection::exists**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### has
exists alias


**Collection::has**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### unset
Elimina un elemento


**Collection::unset**(mixed $key) : [$this](../../../$this.md)


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

protected **Collection::getResolverFor**([KeyValue](../../../KeyValue.md) $first) : [ItemResolver](../../../ItemResolver.md)


|Parameters: | | |
| --- | --- | --- |
|[KeyValue](../../../KeyValue.md) |$first |  |

---


### configureResolver



protected **Collection::configureResolver**([ItemResolver](../../../ItemResolver.md) $resolver) : 


|Parameters: | | |
| --- | --- | --- |
|[ItemResolver](../../../ItemResolver.md) |$resolver |  |

---


### buildItemResolver
Crea el objecto ItemResolver
Hacer que la construcción del objeto ItemResolver dependa un KeyValue, nos permite ajustarlo al primer elemento
de la colección, y por consecuencia, crear colecciones agnosticas que tomen el tipo del primer elemento

protected **Collection::buildItemResolver**([KeyValue](../../../KeyValue.md) $first) : [ItemResolver](../../../ItemResolver.md)


|Parameters: | | |
| --- | --- | --- |
|[KeyValue](../../../KeyValue.md) |$first |  |

---


### __construct
Collection constructor.


**Collection::__construct**(string $type = null) : 


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### fromArray
Crea una instancia a partir de un conjunto de valores


static **Collection::fromArray**([iterable](../../../iterable.md) $input) : [ArrayList](../../../ArrayList.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

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


**Collection::each**(callable $callable, mixed ...$userdata) : [ArrayList](../../../ArrayList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### map
Devuelve el resultado de aplicar una acción a cada elemento de la colección
La colección original permanece inmutable

**Collection::map**(callable $callable, mixed ...$userdata) : [ArrayList](../../../ArrayList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### filter
Devuelve una colección con los elementos que cumplen un criterio


**Collection::filter**(callable $callable, mixed ...$userdata) : [ArrayList](../../../ArrayList.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### search
Devuelve el primer elemento que cumpla con el criterio,
o nulo si no encuentra ninguno


**Collection::search**(callable $callable, mixed ...$userdata) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### find
Devuelve el primer elemento que cumpla con el criterio,
o lanza una excepción si no encuentra ninguno


**Collection::find**(callable $callable, mixed ...$userdata) : mixed


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


### fromType
Crea una colección, a partir de su tipo
```php
$collectionOfStrings = Creator::fromType("string");
$collectionOfExceptions = Creator::fromType(\Exception::class);

```

static **Collection::fromType**(string $type) : [ArrayList](../../../ArrayList.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### getType
Devuelve el tipo de la colleción


**Collection::getType**() : string



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                