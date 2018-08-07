
                                                                                                                                            
    
# Type


> Representa al tipo de una variable
>
> 




## Constants
- ARRAY
- BOOLEAN
- CALLABLE
- COUNTABLE
- FLOAT
- INTEGER
- ITERABLE
- NULL
- NUMERIC
- OBJECT
- RESOURCE
- SCALAR
- STRING
- EQUIVALENT_TYPES_METHODS




## Methods

### __construct
Type constructor.


**Type::__construct**(mixed $variable) : 


|Parameters: | | |
| --- | --- | --- |
|mixed |$variable |  |

---


### create
Crea una nueva instancia


static **Type::create**(mixed $variable) : [Type](../../../Type.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$variable |  |

---


### isArray
Indica si la variable es un array


**Type::isArray**() : bool



---


### isBoolean
Indica si la variable es un boolean


**Type::isBoolean**() : bool



---


### isCallable
Indica si la variable es callable


**Type::isCallable**() : bool



---


### isCountable
Indica si la variable es contable


**Type::isCountable**() : bool



---


### isFloat
Indica si la variable es un float


**Type::isFloat**() : bool



---


### isInteger
Indica si la variable es un entero


**Type::isInteger**() : bool



---


### isIterable
Indica si la variable es iterable


**Type::isIterable**() : bool



---


### isNull
Indica si la variable es nula


**Type::isNull**() : bool



---


### isNumeric
Indica si la variable es un número


**Type::isNumeric**() : bool



---


### isObject
Indica si la variable es un objeto


**Type::isObject**() : bool



---


### isResource
Indica si la variable es un resource


**Type::isResource**() : bool



---


### isScalar
Indica si la variable es un scalar


**Type::isScalar**() : bool



---


### isString
Indica si la variable es un string


**Type::isString**() : bool



---


### isInstanceOf
Indica si la variable es una instancia de una clase o interfaz


**Type::isInstanceOf**(string $classOrInterfaceName) : bool


|Parameters: | | |
| --- | --- | --- |
|string |$classOrInterfaceName |  |

---


### isTypeOf
Comprueba si la variable es de un tipo (o subtipo) de los permitidos


**Type::isTypeOf**(string ...$allowed) : bool


|Parameters: | | |
| --- | --- | --- |
|string |...$allowed |  |

---


### getTypeName
Devuelve el TypeName


**Type::getTypeName**() : string



---


### stringify
__toString alias


**Type::stringify**(string $format = null) : string


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |

---


### isConvertibleToString
Indica si la variable se puede expresar como una cadena de texto


**Type::isConvertibleToString**() : bool



---


### __toString
Devuelve el valor como una cadena de texto


**Type::__toString**() : string



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                