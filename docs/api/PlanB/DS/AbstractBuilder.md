
                                                                                                                                            
    
# AbstractBuilder


> Clase Base para Builders
>
> 








## Methods

### make
AbstractBuilder named constructor.


abstract static **AbstractBuilder::make**() : mixed



---


### __construct
AbstractBuilder constructor.


protected **AbstractBuilder::__construct**([ResolverInterface](../../ResolverInterface.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[ResolverInterface](../../ResolverInterface.md) |$resolver |  |

---


### getInput
Devuelve el input


protected **AbstractBuilder::getInput**() : mixed[]|[Traversable](../../Traversable.md)



---


### getResolver
Devuelve el resolver


protected **AbstractBuilder::getResolver**() : [ResolverInterface](../../ResolverInterface.md)



---


### values
Asigna una colección de valores para incializar la colección


**AbstractBuilder::values**([iterable](../../iterable.md) $input) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../iterable.md) |$input |  |

---


### rule
Añade una regla


**AbstractBuilder::rule**(callable $rule, string ...$types) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$rule |  |
|string |...$types |  |

---


### loader
Añade un loader


**AbstractBuilder::loader**(callable $loader, string ...$types) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$loader |  |
|string |...$types |  |

---


### filter
Añade un filtro a la cola


**AbstractBuilder::filter**(callable $filter, string ...$types) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$filter |  |
|string |...$types |  |

---


### converter
Añade un converter


**AbstractBuilder::converter**(callable $converter, string ...$types) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$converter |  |
|string |...$types |  |

---


### validator
Añade un validator


**AbstractBuilder::validator**(callable $validator, string ...$types) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|string |...$types |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                