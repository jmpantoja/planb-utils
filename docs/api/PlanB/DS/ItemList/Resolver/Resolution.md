
                                                                                                                                            
    
# Resolution


> Esta clase manipula un Item antes de ser agregado a la lista
>
> 








## Methods

### __construct
Resolver constructor.


**Resolution::__construct**([ListInterface](../../../../ListInterface.md) $context) : 


|Parameters: | | |
| --- | --- | --- |
|[ListInterface](../../../../ListInterface.md) |$context |  |

---


### create
Crea una nueva instancia


static **Resolution::create**([ListInterface](../../../../ListInterface.md) $context) : [Resolution](../../../../Resolution.md)


|Parameters: | | |
| --- | --- | --- |
|[ListInterface](../../../../ListInterface.md) |$context |  |

---


### resolve
Resuelve un Item antes de ser añadido


**Resolution::resolve**([Item](../../../../Item.md) $item) : bool


|Parameters: | | |
| --- | --- | --- |
|[Item](../../../../Item.md) |$item |  |

---


### add
Añade un resolver


**Resolution::add**([Resolvable](../../../../Resolvable.md) $resolver, int $order = 1) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolvable](../../../../Resolvable.md) |$resolver |  |
|int |$order |  |

---


### silentExceptions
Silencia las excepciones


**Resolution::silentExceptions**() : [Resolution](../../../../Resolution.md)



---


### count
Devuelve el número total de resolvers


**Resolution::count**() : int



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                