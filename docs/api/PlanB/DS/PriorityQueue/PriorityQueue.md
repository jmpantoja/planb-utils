
                                                                                                                                            
    
# PriorityQueue


> A PriorityQueue is very similar to a Queue. Values are pushed into the queue
with an assigned priority, and the value with the highest priority will
always be at the front of the queue.
>
> 


## Traits
- PlanB\DS\Traits\TraitCollection
- PlanB\DS\Traits\TraitResolver




## Properties
- items


## Methods

### clear
Removes all values from the collection.


**PriorityQueue::clear**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**PriorityQueue::isEmpty**() : bool



---


### count
Returns the size of the collection.


**PriorityQueue::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**PriorityQueue::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**PriorityQueue::copy**() : [Collection](../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**PriorityQueue::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**PriorityQueue::__debugInfo**() : mixed[]



---


### getIterator
Retrieve an external iterator


**PriorityQueue::getIterator**() : [Traversable](../../../Traversable.md)



---


### __construct



protected **PriorityQueue::__construct**([Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### configure
Configura esta colección


**PriorityQueue::configure**([Resolver](../../../Resolver.md) $resolver) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**PriorityQueue::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal
Crea la estructura de datos interna


abstract protected **PriorityQueue::makeInternal**() : [Collection](../../../Collection.md)



---


### duplicate
Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver


protected **PriorityQueue::duplicate**([iterable](../../../iterable.md) $input = []) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### hook
Resuelve los valores antes de ser añadidos desde algun método


protected **PriorityQueue::hook**(callable $callback, mixed ...$values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|mixed |...$values |  |

---


### peek
Returns the value with the highest priority in the priority queue.


**PriorityQueue::peek**() : mixed



---


### pop
Returns and removes the value with the highest priority in the queue.


**PriorityQueue::pop**() : mixed



---


### push
Pushes a value into the queue, with a specified priority.


**PriorityQueue::push**(mixed $value, int $priority = 0) : [PriorityQueue](../../../PriorityQueue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |
|int |$priority |  |

---


### pushAll
Pushes zero or more values onto the top of the queue.


**PriorityQueue::pushAll**([iterable](../../../iterable.md) $input) : [PriorityQueue](../../../PriorityQueue.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### make



static **PriorityQueue::make**([iterable](../../../iterable.md) $input = [], [Resolver](../../../Resolver.md) $resolver = null) : [PriorityQueue](../../../PriorityQueue.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### typed
PriorityQueue named constructor.


static **PriorityQueue::typed**(string $type, [iterable](../../../iterable.md) $input = []) : [PriorityQueue](../../../PriorityQueue.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|[iterable](../../../iterable.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                