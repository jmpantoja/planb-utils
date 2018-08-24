
                                                                                                                                            
    
# Value


> Representa al tipo de una variable
>
> 




## Constants
- EQUIVALENT_TYPES_METHODS




## Methods

### __construct
Value constructor.


protected **Value::__construct**(mixed $variable) : 


|Parameters: | | |
| --- | --- | --- |
|mixed |$variable |  |

---


### create
Crea una nueva instancia


static **Value::create**(mixed $variable) : [Type](../../../Type.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$variable |  |

---


### isArray
Indica si la variable es un array


**Value::isArray**() : bool



---


### isBoolean
Indica si la variable es un boolean


**Value::isBoolean**() : bool



---


### isCallable
Indica si la variable es callable


**Value::isCallable**() : bool



---


### isCountable
Indica si la variable es contable


**Value::isCountable**() : bool



---


### isFloat
Indica si la variable es un float


**Value::isFloat**() : bool



---


### isInteger
Indica si la variable es un entero


**Value::isInteger**() : bool



---


### isIterable
Indica si la variable es iterable


**Value::isIterable**() : bool



---


### isNull
Indica si la variable es nula


**Value::isNull**() : bool



---


### isNumeric
Indica si la variable es un número


**Value::isNumeric**() : bool



---


### isObject
Indica si la variable es un objeto


**Value::isObject**() : bool



---


### isResource
Indica si la variable es un resource


**Value::isResource**() : bool



---


### isScalar
Indica si la variable es un scalar


**Value::isScalar**() : bool



---


### isString
Indica si la variable es un string


**Value::isString**() : bool



---


### isInstanceOf
Indica si la variable es una instancia de una clase o interfaz


**Value::isInstanceOf**(string $classOrInterfaceName) : bool


|Parameters: | | |
| --- | --- | --- |
|string |$classOrInterfaceName |  |

---


### isTypeOf
Comprueba si la variable es de un tipo (o subtipo) de los permitidos


**Value::isTypeOf**(string ...$allowed) : bool


|Parameters: | | |
| --- | --- | --- |
|string |...$allowed |  |

---


### getType
Devuelve el DataType


**Value::getType**() : string



---


### isConvertibleToString
Indica si la variable se puede expresar como una cadena de texto


**Value::isConvertibleToString**() : bool



---


### __toString
Devuelve el valor como una cadena de texto


**Value::__toString**() : string



---


### stringify
__toString alias


**Value::stringify**() : string



---


### decorate
Devuelve el nombre del tipo, decorado


**Value::decorate**() : string



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                