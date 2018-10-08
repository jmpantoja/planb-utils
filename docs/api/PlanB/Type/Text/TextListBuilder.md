
                                                                                                                                            
    
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


protected **TextListBuilder::__construct**([Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInput
Devuelve el input


protected **TextListBuilder::getInput**() : mixed[]|[Traversable](../../../Traversable.md)



---


### getResolver
Devuelve el resolver


protected **TextListBuilder::getResolver**() : [Resolver](../../../Resolver.md)



---


### values
Asigna una colección de valores para incializar la colección


**TextListBuilder::values**([iterable](../../../iterable.md) $input) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### filter
Añade un filtro a la cola


**TextListBuilder::filter**(callable $filter, string ...$types) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$filter |  |
|string |...$types |  |

---


### converter
Añade un converter


**TextListBuilder::converter**(callable $converter, string ...$types) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$converter |  |
|string |...$types |  |

---


### validator
Añade un validator


**TextListBuilder::validator**(callable $validator, string ...$types) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|string |...$types |  |

---


### rule
Añade una regla


**TextListBuilder::rule**(callable $validator, string ...$types) : [AbstractBuilder](../../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|string |...$types |  |

---


### build
Crea la colección de textos por defecto


**TextListBuilder::build**() : mixed



---


### vector
Crea un TextVector


**TextListBuilder::vector**() : [TextVector](../../../TextVector.md)



---


### deque
Crea un deque


**TextListBuilder::deque**() : [TextDeque](../../../TextDeque.md)



---


### stack
Crea un stack


**TextListBuilder::stack**() : [TextStack](../../../TextStack.md)



---


### queue
Crea un queue


**TextListBuilder::queue**() : [TextQueue](../../../TextQueue.md)



---


### priorityQueue
Crea un prioriy queue


**TextListBuilder::priorityQueue**() : [TextPriorityQueue](../../../TextPriorityQueue.md)



---


### map
Crea un map


**TextListBuilder::map**() : [TextMap](../../../TextMap.md)



---


### set
Crea un set


**TextListBuilder::set**() : [TextSet](../../../TextSet.md)



---


### ignoreBlank
Añade un filtro que ignora los textos en blanco


**TextListBuilder::ignoreBlank**() : [$this](../../../$this.md)



---


### ignoreEmpty
Añade un filtro que ignora los textos vacios


**TextListBuilder::ignoreEmpty**() : [$this](../../../$this.md)



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                