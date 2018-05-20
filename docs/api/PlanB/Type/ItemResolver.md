
                                                                                                                                            
    
# ItemResolver


> Procesa una pareja clave/valor antes de ser añadida a la colección
>
> 








## Methods

### __construct
``` php
protected __construct (string $type)

ItemResolver constructor.

```

|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### ofType
``` php
static[PlanB\Type\ItemResolver](../../PlanB/Type/ItemResolver.md) ofType (string $type)

Crea una nueva instancia, para un tipo

```

|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### resolve
``` php
[PlanB\Type\KeyValue](../../PlanB/Type/KeyValue.md)|null resolve ([PlanB\Type\KeyValue](../../PlanB/Type/KeyValue.md) $pair)

Resuelve una pareja clave/valor

```

|Parameters: | | |
| --- | --- | --- |
|[PlanB\Type\KeyValue](../../PlanB/Type/KeyValue.md) |$pair |  |

---


### getType
``` php
string getType ()

Devuelve el tipo base de la colección

```


---


### configure
``` php
 configure ([PlanB\Type\Collection](../../PlanB/Type/Collection.md) $collection)

Configura el ItemResolver a partir de lo que se deduce de una coleccion

```

|Parameters: | | |
| --- | --- | --- |
|[PlanB\Type\Collection](../../PlanB/Type/Collection.md) |$collection |  |

---


### setValidator
``` php
 setValidator (callable $validator)

Asigna el validador personalizado

```

|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |

---


### setNormalizer
``` php
 setNormalizer (callable $normalizer)

Asigna el normalizador personalizado

```

|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                