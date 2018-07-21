
                                                                                                                                            
    
# Mutators


> Aporta la capacidad de agregar y obtener elementos de la colección
>
> 






## Properties
- items


## Methods

### add
Agrega un elemento a la colección


**Mutators::add**(mixed $value) : [$this](../../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### addAll
Agrega un conjunto de elementos


**Mutators::addAll**([iterable](../../../../iterable.md) $items) : [$this](../../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../../iterable.md) |$items |  |

---


### set
Agrega una pareja clave/valor a la colección


**Mutators::set**(mixed $key, mixed $value) : [$this](../../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### setAll
Agrega un conjunto de parejas clave/valor


**Mutators::setAll**([iterable](../../../../iterable.md) $items) : [$this](../../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../../iterable.md) |$items |  |

---


### get
Devuelve un elemento


**Mutators::get**(mixed $key, mixed|null $default = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed|null |$default |  |

---


### exists
Indica si un elemento existe


**Mutators::exists**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### has
exists alias


**Mutators::has**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### remove
Elimina un elemento


**Mutators::remove**(mixed $key) : [$this](../../../../$this.md)


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

protected **Mutators::getResolverFor**([KeyValue](../../../../KeyValue.md) $first) : [ItemResolver](../../../../ItemResolver.md)


|Parameters: | | |
| --- | --- | --- |
|[KeyValue](../../../../KeyValue.md) |$first |  |

---


### configureResolver



protected **Mutators::configureResolver**([ItemResolver](../../../../ItemResolver.md) $resolver) : 


|Parameters: | | |
| --- | --- | --- |
|[ItemResolver](../../../../ItemResolver.md) |$resolver |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                