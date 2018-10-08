
                                                                                                                                            
    
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


protected **ListBuilder::__construct**([AbstractResolver](../../AbstractResolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[AbstractResolver](../../AbstractResolver.md) |$resolver |  |

---


### getInput
Devuelve el input


protected **ListBuilder::getInput**() : mixed[]|[Traversable](../../Traversable.md)



---


### getResolver
Devuelve el resolver


protected **ListBuilder::getResolver**() : [AbstractResolver](../../AbstractResolver.md)



---


### values
Asigna una colección de valores para incializar la colección


**ListBuilder::values**([iterable](../../iterable.md) $input) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../iterable.md) |$input |  |

---


### rule
Añade una regla


**ListBuilder::rule**(callable $rule, string ...$types) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$rule |  |
|string |...$types |  |

---


### rules
Asigna varias reglas


**ListBuilder::rules**(array $rules) : [AbstractResolver](../../AbstractResolver.md)


|Parameters: | | |
| --- | --- | --- |
|array |$rules |  |

---


### loader
Añade un loader


**ListBuilder::loader**(callable $loader, string ...$types) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$loader |  |
|string |...$types |  |

---


### loaders
Asigna varios loaders


**ListBuilder::loaders**(array $loaders) : [AbstractResolver](../../AbstractResolver.md)


|Parameters: | | |
| --- | --- | --- |
|array |$loaders |  |

---


### filter
Añade un filtro a la cola


**ListBuilder::filter**(callable $filter, string ...$types) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$filter |  |
|string |...$types |  |

---


### filters
Asigna varios filters


**ListBuilder::filters**(array $filters) : [AbstractResolver](../../AbstractResolver.md)


|Parameters: | | |
| --- | --- | --- |
|array |$filters |  |

---


### converter
Añade un converter


**ListBuilder::converter**(callable $converter, string ...$types) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$converter |  |
|string |...$types |  |

---


### converters
Asigna varios converters


**ListBuilder::converters**(array $converters) : [AbstractResolver](../../AbstractResolver.md)


|Parameters: | | |
| --- | --- | --- |
|array |$converters |  |

---


### validator
Añade un validator


**ListBuilder::validator**(callable $validator, string ...$types) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|string |...$types |  |

---


### validators
Asigna varios validators


**ListBuilder::validators**(array $validators) : [AbstractResolver](../../AbstractResolver.md)


|Parameters: | | |
| --- | --- | --- |
|array |$validators |  |

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


### typed
Named constructor.


static **ListBuilder::typed**(string $type) : [ListBuilder](../../ListBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### bind
Named constructor.


static **ListBuilder::bind**([Resolver](../../Resolver.md) $resolver) : [ListBuilder](../../ListBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../Resolver.md) |$resolver |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                