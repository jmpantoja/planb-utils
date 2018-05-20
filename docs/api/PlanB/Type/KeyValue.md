
                                                                                                                                            
    
# KeyValue


> Value Object que encapsula una pareja clave/valor
>
> 








## Methods

### fromPair
``` php
static[PlanB\Type\KeyValue](../../PlanB/Type/KeyValue.md) fromPair (mixed $key, mixed $value)



```

|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### fromValue
``` php
static[PlanB\Type\KeyValue](../../PlanB/Type/KeyValue.md) fromValue (mixed $value)

Crea un objeto KeyValue solo con valor

```

|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### hasKey
``` php
bool hasKey ()

Indica si esta instancia contiene una key

```


---


### getValue
``` php
mixed getValue ()

Devuelve el valor

```


---


### getKey
``` php
mixed getKey ()

Devuelve la clave

```


---


### changeValue
``` php
[PlanB\Type\KeyValue](../../PlanB/Type/KeyValue.md) changeValue (mixed $newValue)

Crea una nueva clave/valor, con la misma clave que la actual, pero un valor distinto

```

|Parameters: | | |
| --- | --- | --- |
|mixed |$newValue |  |

---


### changeKey
``` php
[PlanB\Type\KeyValue](../../PlanB/Type/KeyValue.md) changeKey (mixed $newKey)

Crea una nueva clave/valor, con el mismo valor que el actual, pero con una clave distinta

```

|Parameters: | | |
| --- | --- | --- |
|mixed |$newKey |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                