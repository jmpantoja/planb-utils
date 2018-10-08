
                                                                                                                                            
    
# AssuranceMethod


> Representa al método final, obtenido mediante las transformaciónes oportunas
>
> 








## Methods

### make
Crea una nueva instancia


static **AssuranceMethod::make**([object](../../../object.md) $object, string $original) : [AssuranceMethod](../../../AssuranceMethod.md)


|Parameters: | | |
| --- | --- | --- |
|[object](../../../object.md) |$object |  |
|string |$original |  |

---


### __construct
AssuranceMethod constructor.


protected **AssuranceMethod::__construct**([object](../../../object.md) $object, string $original) : 


|Parameters: | | |
| --- | --- | --- |
|[object](../../../object.md) |$object |  |
|string |$original |  |

---


### calculeInverted
Calcula el nombre del método inverso al original


protected **AssuranceMethod::calculeInverted**(array $matches) : string


|Parameters: | | |
| --- | --- | --- |
|array |$matches |  |

---


### getCallable
Devuelve la Closure lista para ejecutar


**AssuranceMethod::getCallable**() : callable



---


### getExpected
Devuelve el valor que se espera que devuelva la closure


**AssuranceMethod::getExpected**() : bool



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                