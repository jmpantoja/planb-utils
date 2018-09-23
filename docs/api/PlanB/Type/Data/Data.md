
                                                                                                                                            
    
# Data


> Representa al tipo de una variable
>
> 


## Traits
- PlanB\Utils\Traits\Stringify


## Constants
- EQUIVALENT_TYPES_METHODS




## Methods

### stringify
__toString alias


**Data::stringify**() : string



---


### __toString
Devuelve la cadena de texto


**Data::__toString**() : string



---


### __construct
Input constructor.


protected **Data::__construct**(mixed $variable) : 


|Parameters: | | |
| --- | --- | --- |
|mixed |$variable |  |

---


### make
Crea una nueva instancia


static **Data::make**(mixed $variable) : [Type](../../../Type.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$variable |  |

---


### isArray
Indica si la variable es un array


**Data::isArray**() : bool



---


### isBoolean
Indica si la variable es un boolean


**Data::isBoolean**() : bool



---


### isCallable
Indica si la variable es callable


**Data::isCallable**() : bool



---


### isCountable
Indica si la variable es contable


**Data::isCountable**() : bool



---


### isFloat
Indica si la variable es un float


**Data::isFloat**() : bool



---


### isInteger
Indica si la variable es un entero


**Data::isInteger**() : bool



---


### isIterable
Indica si la variable es iterable


**Data::isIterable**() : bool



---


### isNull
Indica si la variable es nula


**Data::isNull**() : bool



---


### isNumeric
Indica si la variable es un número


**Data::isNumeric**() : bool



---


### isObject
Indica si la variable es un objeto


**Data::isObject**() : bool



---


### isResource
Indica si la variable es un resource


**Data::isResource**() : bool



---


### isScalar
Indica si la variable es un scalar


**Data::isScalar**() : bool



---


### isString
Indica si la variable es un string


**Data::isString**() : bool



---


### isInstanceOf
Indica si la variable es una instancia de una clase o interfaz


**Data::isInstanceOf**(string $classOrInterfaceName) : bool


|Parameters: | | |
| --- | --- | --- |
|string |$classOrInterfaceName |  |

---


### isTypeOf
Comprueba si la variable es de un tipo (o subtipo) de los permitidos


**Data::isTypeOf**(string ...$allowed) : bool


|Parameters: | | |
| --- | --- | --- |
|string |...$allowed |  |

---


### getType
Devuelve el DataType


**Data::getType**() : [DataType](../../../DataType.md)



---


### isConvertibleToString
Indica si la variable se puede expresar como una cadena de texto


**Data::isConvertibleToString**() : bool



---


### decorate
Devuelve el nombre del tipo, decorado


**Data::decorate**() : string



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                