
                                                                                                                                            
    
# Collection


> Generic Collection
>
> 


## Traits
- PlanB\Type\Traits\Mutators






## Methods

### itemAppend
``` php
[PlanB\Type\Collection](../../PlanB/Type/Collection.md) itemAppend (mixed $value)

Agrega un elemento a la colección

```

|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### itemAppendAll
``` php
[PlanB\Type\Collection](../../PlanB/Type/Collection.md) itemAppendAll ([PlanB\Type\Traits\iterable](../../PlanB/Type/Traits/iterable.md) $items)

Agrega un conjunto de elementos

```

|Parameters: | | |
| --- | --- | --- |
|[PlanB\Type\Traits\iterable](../../PlanB/Type/Traits/iterable.md) |$items |  |

---


### itemSet
``` php
[PlanB\Type\Collection](../../PlanB/Type/Collection.md) itemSet (mixed $key, mixed $value)

Agrega una pareja clave/valor a la colección

```

|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### itemSetAll
``` php
[PlanB\Type\Collection](../../PlanB/Type/Collection.md) itemSetAll ([PlanB\Type\Traits\iterable](../../PlanB/Type/Traits/iterable.md) $items)

Agrega un conjunto de parejas clave/valor

```

|Parameters: | | |
| --- | --- | --- |
|[PlanB\Type\Traits\iterable](../../PlanB/Type/Traits/iterable.md) |$items |  |

---


### itemGet
``` php
mixed itemGet (mixed $key, mixed|null $default = null)

Devuelve un elemento

```

|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed|null |$default |  |

---


### itemExists
``` php
bool itemExists (mixed $key)

Indica si un elemento existe

```

|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### itemUnset
``` php
[PlanB\Type\Collection](../../PlanB/Type/Collection.md) itemUnset (mixed $key)

Elimina un elemento

```

|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### configure
``` php
protected configure ([PlanB\Type\ItemResolver](../../PlanB/Type/ItemResolver.md) $resolver)



```

|Parameters: | | |
| --- | --- | --- |
|[PlanB\Type\ItemResolver](../../PlanB/Type/ItemResolver.md) |$resolver |  |

---


### __construct
``` php
 __construct (string $type)

Collection constructor.

```

|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### getType
``` php
string getType ()

Devuelve el tipo de la colleción

```


---


### count
``` php
int count ()

Devuelve el número total de elementos

```


---


### isEmpty
``` php
bool isEmpty ()

Indica si la colección está vacia

```


---


### each
``` php
[PlanB\Type\Collection](../../PlanB/Type/Collection.md) each (callable $callable, mixed ...$userdata)

Ejecuta una acción para cada elemento de la colección

```

|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### map
``` php
[PlanB\Type\Collection](../../PlanB/Type/Collection.md) map (callable $callable, mixed ...$userdata)

Devuelve el resultado de aplicar una acción a cada elemento de la colección

```

|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### filter
``` php
[PlanB\Type\Collection](../../PlanB/Type/Collection.md) filter (callable $callable, mixed ...$userdata)

Devuelve una colección con los elementos que cumplen un criterio

```

|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### search
``` php
mixed|null search (callable $callable, mixed ...$userdata)

Devuelve el primer elemento que cumpla con el criterio,
o nulo si no encuentra ninguno

```

|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


### find
``` php
mixed find (callable $callable, mixed ...$userdata)

Devuelve el primer elemento que cumpla con el criterio,
o lanza una excepción si no encuentra ninguno

```

|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |
|mixed |...$userdata |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                