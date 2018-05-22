
                                                                                                                                            
    
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


### getType
``` php
string getType ()

Devuelve el tipo base de la colección

```


---


### setValidator
``` php
[PlanB\Type\ItemResolver](../../PlanB/Type/ItemResolver.md) setValidator (callable $validator)

Asigna el validador personalizado

```

|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |

---


### setNormalizer
``` php
[PlanB\Type\ItemResolver](../../PlanB/Type/ItemResolver.md) setNormalizer (callable $normalizer)

Asigna el normalizador personalizado

```

|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |

---


### setKeyNormalizer
``` php
[PlanB\Type\ItemResolver](../../PlanB/Type/ItemResolver.md) setKeyNormalizer (callable $normalizer)

Asigna el normalizador de clave personalizado

```

|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |

---


### configure
``` php
[PlanB\Type\ItemResolver](../../PlanB/Type/ItemResolver.md) configure ([PlanB\Type\Collection](../../PlanB/Type/Collection.md) $collection)

Configura el ItemResolver a partir de lo que se deduce de una coleccion

```

|Parameters: | | |
| --- | --- | --- |
|[PlanB\Type\Collection](../../PlanB/Type/Collection.md) |$collection |  |

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


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                