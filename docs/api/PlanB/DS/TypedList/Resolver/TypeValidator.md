
                                                                                                                                            
    
# TypeValidator


> Valida que el valor de un Item sea de un tipo concreto
>
> 








## Methods

### __invoke
Resuelve un Item, asegurando que es válido


**TypeValidator::__invoke**([Item](../../../../Item.md) $item, [ListInterface](../../../../ListInterface.md) $context = null) : bool


|Parameters: | | |
| --- | --- | --- |
|[Item](../../../../Item.md) |$item |  |
|[ListInterface](../../../../ListInterface.md) |$context |  |

---


### validate
Valida que el valor de un Item sea de un tipo concreto


**TypeValidator::validate**(mixed $value, mixed $key = null, [ListInterface](../../../../ListInterface.md) $context = null) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |
|mixed |$key |  |
|[ListInterface](../../../../ListInterface.md) |$context |  |

---


### __construct
TypeValidator constructor.


protected **TypeValidator::__construct**(string $innerType) : 


|Parameters: | | |
| --- | --- | --- |
|string |$innerType |  |

---


### create
Devuelve una nueva instancia


static **TypeValidator::create**(string $innerType) : [TypeValidator](../../../../TypeValidator.md)


|Parameters: | | |
| --- | --- | --- |
|string |$innerType |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                