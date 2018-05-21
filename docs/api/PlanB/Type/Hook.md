
                                                                                                                                            
    
# Hook


> Operación, personalizada
>
> 








## Methods

### __construct
``` php
protected __construct (callable $callable)

Operation constructor.

```

|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |

---


### default
``` php
static[PlanB\Type\Hook](../../PlanB/Type/Hook.md) default ()

Crea una operación personalizada que no hace nada

```


---


### fromCallable
``` php
static[PlanB\Type\Hook](../../PlanB/Type/Hook.md) fromCallable (callable $callable)

Crea una operación personalizada, a partir de un callable

```

|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |

---


### fromArray
``` php
static[PlanB\Type\Hook](../../PlanB/Type/Hook.md) fromArray (array $callable)

Crea una operación personalizada, a partir de un array

```

|Parameters: | | |
| --- | --- | --- |
|array |$callable |  |

---


### execute
``` php
mixed|null execute ([PlanB\Type\KeyValue](../../PlanB/Type/KeyValue.md) $pair, null $default = null)

Ejecuta la operación

```

|Parameters: | | |
| --- | --- | --- |
|[PlanB\Type\KeyValue](../../PlanB/Type/KeyValue.md) |$pair |  |
|null |$default |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                