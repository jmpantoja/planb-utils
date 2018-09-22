
                                                                                                                                            
    
# TextPriorityQueue


> PriorityQueue para objetos Text
>
> 


## Traits
- PlanB\Type\Text\TraitTextList
- PlanB\DS1\Traits\TraitCollection
- PlanB\DS1\Traits\TraitResolver




## Properties
- items


## Methods

### clear
Removes all values from the collection.


**TextPriorityQueue::clear**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**TextPriorityQueue::isEmpty**() : bool



---


### count
Returns the size of the collection.


**TextPriorityQueue::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**TextPriorityQueue::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**TextPriorityQueue::copy**() : [Collection](../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**TextPriorityQueue::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**TextPriorityQueue::__debugInfo**() : mixed[]



---


### getIterator
Retrieve an external iterator


**TextPriorityQueue::getIterator**() : [Traversable](../../../Traversable.md)



---


### __construct



protected **TextPriorityQueue::__construct**([Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### configure
Configura esta colección


**TextPriorityQueue::configure**([Resolver](../../../Resolver.md) $resolver) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**TextPriorityQueue::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal
Crea la estructura de datos interna


abstract protected **TextPriorityQueue::makeInternal**() : [Collection](../../../Collection.md)



---


### duplicate
Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver


protected **TextPriorityQueue::duplicate**([iterable](../../../iterable.md) $input = []) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### hook
Resuelve los valores antes de ser añadidos desde algun método


protected **TextPriorityQueue::hook**(callable $callback, mixed ...$values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|mixed |...$values |  |

---


### peek
Returns the value with the highest priority in the priority queue.


**TextPriorityQueue::peek**() : mixed



---


### pop
Returns and removes the value with the highest priority in the queue.


**TextPriorityQueue::pop**() : mixed



---


### push
Pushes a value into the queue, with a specified priority.


**TextPriorityQueue::push**(mixed $value, int $priority = 0) : [PriorityQueue](../../../PriorityQueue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |
|int |$priority |  |

---


### pushAll
Pushes zero or more values onto the top of the queue.


**TextPriorityQueue::pushAll**([iterable](../../../iterable.md) $input) : [PriorityQueue](../../../PriorityQueue.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### concat
Concatena los textos


**TextPriorityQueue::concat**(string $delimiter = Text::BLANK_TEXT) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$delimiter |  |

---


### toArrayOfStrings
Convierte la lista en un array de strings


**TextPriorityQueue::toArrayOfStrings**() : string[]



---


### make



static **TextPriorityQueue::make**([iterable](../../../iterable.md) $input = [], [Resolver](../../../Resolver.md) $resolver = null) : [PriorityQueue](../../../PriorityQueue.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                