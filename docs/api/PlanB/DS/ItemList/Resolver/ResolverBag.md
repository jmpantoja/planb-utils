
                                                                                                                                            
    
# ResolverBag


> Cola con los resolvers
>
> 








## Methods

### __construct
ResolverBag constructor.


**ResolverBag::__construct**() : 



---


### count
Count elements of an object


**ResolverBag::count**() : int



---


### ignoreOnInvalid
Indica que los valores invalidos deben ser ignorados sin lanzar una excepción


**ResolverBag::ignoreOnInvalid**() : [ResolverBag](../../../../ResolverBag.md)



---


### isLocked
Indica si ya no se pueden añadir nuevos resolvers


**ResolverBag::isLocked**() : bool



---


### lockResolvers
Bloque la lista de resolvers para que no se puedan añadir más


**ResolverBag::lockResolvers**() : [ResolverBag](../../../../ResolverBag.md)



---


### addResolver
Añade un nuevo resolver


**ResolverBag::addResolver**(callable|[ResolverInterface](../../../../ResolverInterface.md) $resolver, int $priority = 0) : [ListInterface](../../../../ListInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable|[ResolverInterface](../../../../ResolverInterface.md) |$resolver |  |
|int |$priority |  |

---


### resolve
Ejecuta todos los resolvers


**ResolverBag::resolve**([KeyValue](../../../../KeyValue.md) $pair, [ListInterface](../../../../ListInterface.md) $context) : [KeyValue](../../../../KeyValue.md)


|Parameters: | | |
| --- | --- | --- |
|[KeyValue](../../../../KeyValue.md) |$pair |  |
|[ListInterface](../../../../ListInterface.md) |$context |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                