
                                                                                                                                            
    
# InstanceOfValidator


> Validator para comprobar que un valor dado, es una instancia de una clase o implementa una interfaz
>
> 






## Properties
- type


## Methods

### __construct
``` php
protected __construct (string $type)

AbstractTypeValidator constructor.

```

|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### getType
``` php
string getType ()

Devuelve el tipo contra el que se valida

```


---


### forType
``` php
static[PlanB\Type\Validator\AbstractTypeValidator](../../../PlanB/Type/Validator/AbstractTypeValidator.md) forType (string $type)

Crea una instancia con un tipo asignado

```

|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### isValidType
``` php
staticbool isValidType (string $type)

Indica este validator se resposabiliza de validar el tipo pasado como argumento

```

|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### validate
``` php
bool validate (mixed $value)

Valida que un valor sea una instancia de una clase (o interfaz) determinada

```

|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                