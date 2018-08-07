
                                                                                                                                            
    
# CustomValidator


> Valida un Item, mediante un callback
>
> 








## Methods

### __invoke
Resuelve un Item, asegurando que es válido


**CustomValidator::__invoke**([Item](../../../../Item.md) $item, [ListInterface](../../../../ListInterface.md) $context) : bool


|Parameters: | | |
| --- | --- | --- |
|[Item](../../../../Item.md) |$item |  |
|[ListInterface](../../../../ListInterface.md) |$context |  |

---


### validate
Valida un item


**CustomValidator::validate**(mixed $value, mixed $key = null, [ListInterface](../../../../ListInterface.md) $context = null) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |
|mixed |$key |  |
|[ListInterface](../../../../ListInterface.md) |$context |  |

---


### __construct
CustomValidator constructor.


**CustomValidator::__construct**(callable $callback) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### create
Crea una nueva instancia


static **CustomValidator::create**(callable $callback) : [CustomValidator](../../../../CustomValidator.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                