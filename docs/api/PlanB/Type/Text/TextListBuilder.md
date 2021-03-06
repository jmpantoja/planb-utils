
                                                                                                                                            
    
# TextListBuilder


> Builder para TextList
>
> 








## Methods

### make
Named constructor.


static **TextListBuilder::make**() : mixed



---


### __construct
AbstractBuilder constructor.


protected **TextListBuilder::__construct**([AbstractResolver](../../../AbstractResolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[AbstractResolver](../../../AbstractResolver.md) |$resolver |  |

---


### getInput
Devuelve el input


protected **TextListBuilder::getInput**() : mixed[]|[Traversable](../../../Traversable.md)



---


### getResolver
Devuelve el resolver


protected **TextListBuilder::getResolver**() : [AbstractResolver](../../../AbstractResolver.md)



---


### values
Asigna una colección de valores para incializar la colección


**TextListBuilder::values**([iterable](../../../iterable.md) $input) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### rule
Añade una regla


**TextListBuilder::rule**(callable $rule, string ...$types) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$rule |  |
|string |...$types |  |

---


### rules
Asigna varias reglas


**TextListBuilder::rules**(array $rules) : [AbstractResolver](../../../AbstractResolver.md)


|Parameters: | | |
| --- | --- | --- |
|array |$rules |  |

---


### loader
Añade un loader


**TextListBuilder::loader**(callable $loader, string ...$types) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$loader |  |
|string |...$types |  |

---


### loaders
Asigna varios loaders


**TextListBuilder::loaders**(array $loaders) : [AbstractResolver](../../../AbstractResolver.md)


|Parameters: | | |
| --- | --- | --- |
|array |$loaders |  |

---


### filter
Añade un filtro a la cola


**TextListBuilder::filter**(callable $filter, string ...$types) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$filter |  |
|string |...$types |  |

---


### filters
Asigna varios filters


**TextListBuilder::filters**(array $filters) : [AbstractResolver](../../../AbstractResolver.md)


|Parameters: | | |
| --- | --- | --- |
|array |$filters |  |

---


### converter
Añade un converter


**TextListBuilder::converter**(callable $converter, string ...$types) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$converter |  |
|string |...$types |  |

---


### converters
Asigna varios converters


**TextListBuilder::converters**(array $converters) : [AbstractResolver](../../../AbstractResolver.md)


|Parameters: | | |
| --- | --- | --- |
|array |$converters |  |

---


### validator
Añade un validator


**TextListBuilder::validator**(callable $validator, string ...$types) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|string |...$types |  |

---


### validators
Asigna varios validators


**TextListBuilder::validators**(array $validators) : [AbstractResolver](../../../AbstractResolver.md)


|Parameters: | | |
| --- | --- | --- |
|array |$validators |  |

---


### vector
Crea un TextVector


**TextListBuilder::vector**() : mixed



---


### deque
Crea un deque


**TextListBuilder::deque**() : mixed



---


### stack
Crea un stack


**TextListBuilder::stack**() : mixed



---


### queue
Crea un queue


**TextListBuilder::queue**() : mixed



---


### priorityQueue
Crea un prioriy queue


**TextListBuilder::priorityQueue**() : mixed



---


### map
Crea un map


**TextListBuilder::map**() : mixed



---


### set
Crea un set


**TextListBuilder::set**() : mixed



---


### ignoreBlank
Añade un filtro que ignora los textos en blanco


**TextListBuilder::ignoreBlank**() : [$this](../../../$this.md)



---


### ignoreEmpty
Añade un filtro que ignora los textos vacios


**TextListBuilder::ignoreEmpty**() : [$this](../../../$this.md)



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                