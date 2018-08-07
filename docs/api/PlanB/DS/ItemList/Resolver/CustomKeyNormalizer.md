
                                                                                                                                            
    
# CustomKeyNormalizer


> Normaliza la clave de un Item, mediante un callback
>
> 








## Methods

### __invoke
Resuelve un Item, normalizando la clave


**CustomKeyNormalizer::__invoke**([Item](../../../../Item.md) $item, [ListInterface](../../../../ListInterface.md) $context) : bool


|Parameters: | | |
| --- | --- | --- |
|[Item](../../../../Item.md) |$item |  |
|[ListInterface](../../../../ListInterface.md) |$context |  |

---


### normalize
Devuelve la clave normalizada


**CustomKeyNormalizer::normalize**(mixed $key, mixed $value = null, [ListInterface](../../../../ListInterface.md) $context = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value | |null                         $value |
|[ListInterface](../../../../ListInterface.md) |$context |  |

---


### __construct
CustomNormalizer constructor.


**CustomKeyNormalizer::__construct**(callable $callback) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### create
Crea una nueva instancia


static **CustomKeyNormalizer::create**(callable $callback) : [CustomValidator](../../../../CustomValidator.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                