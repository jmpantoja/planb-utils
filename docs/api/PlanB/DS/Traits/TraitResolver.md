
                                                                                                                                            
    
# TraitResolver


> Métodos asociados con la interfaz resolvable
>
> 






## Properties
- items


## Methods

### __construct



protected **TraitResolver::__construct**([Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### configure
Configura esta colección


**TraitResolver::configure**([Resolver](../../../Resolver.md) $resolver) : void


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**TraitResolver::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal
Crea la estructura de datos interna


abstract protected **TraitResolver::makeInternal**() : [Collection](../../../Collection.md)



---


### make
Named constructor.


abstract static **TraitResolver::make**([iterable](../../../iterable.md) $input = [], [Resolver](../../../Resolver.md) $resolver = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### hook
Resuelve los valores antes de ser añadidos desde algun método


protected **TraitResolver::hook**(callable $callback, mixed ...$values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|mixed |...$values |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                