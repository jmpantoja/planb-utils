
                                                                                                                                            
    
# ListBuilder


> Builder para crear objetos Collection
>
> 








## Methods

### make
Named constructor.


static **ListBuilder::make**() : mixed



---


### __construct
AbstractBuilder constructor.


protected **ListBuilder::__construct**([ResolverInterface](../../ResolverInterface.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[ResolverInterface](../../ResolverInterface.md) |$resolver |  |

---


### getInput
Devuelve el input


protected **ListBuilder::getInput**() : mixed[]|[Traversable](../../Traversable.md)



---


### getResolver
Devuelve el resolver


protected **ListBuilder::getResolver**() : [ResolverInterface](../../ResolverInterface.md)



---


### values
Asigna una colección de valores para incializar la colección


**ListBuilder::values**([iterable](../../iterable.md) $input) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../iterable.md) |$input |  |

---


### rule
Añade una regla


**ListBuilder::rule**(callable $rule, string ...$types) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$rule |  |
|string |...$types |  |

---


### loader
Añade un loader


**ListBuilder::loader**(callable $loader, string ...$types) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$loader |  |
|string |...$types |  |

---


### filter
Añade un filtro a la cola


**ListBuilder::filter**(callable $filter, string ...$types) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$filter |  |
|string |...$types |  |

---


### converter
Añade un converter


**ListBuilder::converter**(callable $converter, string ...$types) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$converter |  |
|string |...$types |  |

---


### validator
Añade un validator


**ListBuilder::validator**(callable $validator, string ...$types) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|string |...$types |  |

---


### typed
Named constructor.


static **ListBuilder::typed**(string $type) : [ListBuilder](../../ListBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### bind
Named constructor.


static **ListBuilder::bind**([ResolverInterface](../../ResolverInterface.md) $resolver) : [ListBuilder](../../ListBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|[ResolverInterface](../../ResolverInterface.md) |$resolver |  |

---


### vector
Crea un vector


**ListBuilder::vector**() : mixed



---


### deque
Crea un deque


**ListBuilder::deque**() : mixed



---


### stack
Crea un stack


**ListBuilder::stack**() : mixed



---


### queue
Crea un queue


**ListBuilder::queue**() : mixed



---


### priorityQueue
Crea un prioriy queue


**ListBuilder::priorityQueue**() : mixed



---


### map
Crea un map


**ListBuilder::map**() : mixed



---


### set
Crea un set


**ListBuilder::set**() : mixed



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                