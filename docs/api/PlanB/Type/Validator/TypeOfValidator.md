
                                                                                                                                            
    
# TypeOfValidator


> Validator para comprobar que un valor dado, es de un tipo nativo (string, array, int, bool, etc)
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

Valida que un valor sea de un tipo determinado

```

|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                