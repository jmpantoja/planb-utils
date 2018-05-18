
                                                                                                                                            
    
# Collection


> Generic Collection
>
> 








## Methods

### __construct
``` php
protected __construct (string $type)

Collection constructor.

```

|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### ofType
``` php
static[PlanB\Type\Collection](../../PlanB/Type/Collection.md) ofType (string $type)

Crea una colleción de elementos para el tipo dado

```

|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

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


### itemAppend
``` php
 itemAppend (mixed $value)

Agrega un elemento a la colección

```

|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### itemAppendAll
``` php
 itemAppendAll ([PlanB\Type\iterable](../../PlanB/Type/iterable.md) $items)

Agrega un conjunto de elementos

```

|Parameters: | | |
| --- | --- | --- |
|[PlanB\Type\iterable](../../PlanB/Type/iterable.md) |$items |  |

---


### itemSet
``` php
 itemSet (mixed $key, mixed $value)

Agrega una pareja clave/valor a la colección

```

|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### itemSetAll
``` php
 itemSetAll ([PlanB\Type\iterable](../../PlanB/Type/iterable.md) $items)

Agrega un conjunto de parejas clave/valor

```

|Parameters: | | |
| --- | --- | --- |
|[PlanB\Type\iterable](../../PlanB/Type/iterable.md) |$items |  |

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
 itemUnset (mixed $key)

Elimina un elemento

```

|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### getType
``` php
string getType ()

Devuelve el tipo de la colleción

```


---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                