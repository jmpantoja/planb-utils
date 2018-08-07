
                                                                                                                                            
    
# CustomNormalizer


> Normaliza el valor de un Item, mediante un callback
>
> 








## Methods

### __invoke
Resuelve un Item, normalizando el valor


**CustomNormalizer::__invoke**([Item](../../../../Item.md) $item, [ListInterface](../../../../ListInterface.md) $context) : bool


|Parameters: | | |
| --- | --- | --- |
|[Item](../../../../Item.md) |$item |  |
|[ListInterface](../../../../ListInterface.md) |$context |  |

---


### normalize
Devuelve el valor normalizado


**CustomNormalizer::normalize**(mixed $value, null $key = null, [ListInterface](../../../../ListInterface.md) $context = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |
|null |$key | |mixed                           $key |
|[ListInterface](../../../../ListInterface.md) |$context |  |

---


### __construct
CustomNormalizer constructor.


**CustomNormalizer::__construct**(callable $callback) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### create
Crea una nueva instancia


static **CustomNormalizer::create**(callable $callback) : [CustomValidator](../../../../CustomValidator.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                