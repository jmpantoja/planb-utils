
                                                                                                                                            
    
# Hydrator


> Valida un Item, mediante un callback
>
> 








## Methods

### __construct
CustomValidator constructor.


**Hydrator::__construct**(string $type, callable $callback) : 


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$callback |  |

---


### create
Crea una nueva instancia


static **Hydrator::create**(string $type, callable $callback) : [Hydrator](../../../../Hydrator.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$callback |  |

---


### __invoke
Resuelve un Item, normalizando el valor


**Hydrator::__invoke**([Item](../../../../Item.md) $item, [ListInterface](../../../../ListInterface.md) $context = null) : bool


|Parameters: | | |
| --- | --- | --- |
|[Item](../../../../Item.md) |$item |  |
|[ListInterface](../../../../ListInterface.md) |$context |  |

---


### normalize
Devuelve el valor normalizado


**Hydrator::normalize**(mixed $value, null $key = null, [ListInterface](../../../../ListInterface.md) $context = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |
|null |$key | |mixed                           $key |
|[ListInterface](../../../../ListInterface.md) |$context |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                