
                                                                                                                                            
    
# PriorityQueue


> A PriorityQueue is very similar to a Queue. Values are pushed into the queue
with an assigned priority, and the value with the highest priority will
always be at the front of the queue.
>
> 


## Traits
- PlanB\DS1\Traits\TraitCollection
- PlanB\DS1\Traits\TraitResolver




## Properties
- items


## Methods

### clear
Removes all values from the collection.


**PriorityQueue::clear**() : [Collection](../../Collection.md)



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


**PriorityQueue::copy**() : [Collection](../../Collection.md)



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


**PriorityQueue::getIterator**() : [Traversable](../../Traversable.md)



---


### make
PriorityQueue named constructor


static **PriorityQueue::make**() : [Collection](../../Collection.md)



---


### __construct



protected **PriorityQueue::__construct**([iterable](../../iterable.md) $input = []) : 


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../iterable.md) |$input |  |

---


### makeInternal
Crea la estructura de datos interna


protected **PriorityQueue::makeInternal**() : [Collection](../../Collection.md)



---


### duplicate
Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver


protected **PriorityQueue::duplicate**([iterable](../../iterable.md) $input = []) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../iterable.md) |$input |  |

---


### bind
Asocia un nuevo resolver


**PriorityQueue::bind**([Resolver](../../Resolver.md) $resolver) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../Resolver.md) |$resolver |  |

---


### addFilter
Añade un filtro a la cola


**PriorityQueue::addFilter**(callable $filter, int $priority = 0) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$filter |  |
|int |$priority |  |

---


### addTypedFilter
Añade un filtro para un tipo determinado


**PriorityQueue::addTypedFilter**(string $type, callable $filter, int $priority = 0) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$filter |  |
|int |$priority |  |

---


### addConverter
Añade un converter


**PriorityQueue::addConverter**(string $type, callable $converter, int $priority = 0) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$converter |  |
|int |$priority |  |

---


### addValidator
Añade un validator


**PriorityQueue::addValidator**(callable $validator, int $priority = 0) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$priority |  |

---


### addTypedValidator
Añade un validator para un tipo determinado


**PriorityQueue::addTypedValidator**(string $type, callable $validator, int $priority = 0) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$validator |  |
|int |$priority |  |

---


### addNormalizer
Añade un normalizer


**PriorityQueue::addNormalizer**(callable $normalizer, int $priority = 0) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$priority |  |

---


### addTypedNormalizer
Añade un normalizer para un tipo determinado


**PriorityQueue::addTypedNormalizer**(string $type, callable $normalizer, int $priority = 0) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$normalizer |  |
|int |$priority |  |

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


**PriorityQueue::push**(mixed $value, int $priority = 0) : [PriorityQueue](../../PriorityQueue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |
|int |$priority |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                