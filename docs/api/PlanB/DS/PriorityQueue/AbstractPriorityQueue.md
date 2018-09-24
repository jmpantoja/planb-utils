
                                                                                                                                            
    
# AbstractPriorityQueue


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


**AbstractPriorityQueue::clear**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**AbstractPriorityQueue::isEmpty**() : bool



---


### count
Returns the size of the collection.


**AbstractPriorityQueue::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**AbstractPriorityQueue::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**AbstractPriorityQueue::copy**() : [Collection](../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**AbstractPriorityQueue::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**AbstractPriorityQueue::__debugInfo**() : mixed[]



---


### getIterator
Retrieve an external iterator


**AbstractPriorityQueue::getIterator**() : [Traversable](../../../Traversable.md)



---


### __construct



protected **AbstractPriorityQueue::__construct**([Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### configure
Configura esta colección


**AbstractPriorityQueue::configure**([Resolver](../../../Resolver.md) $resolver) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**AbstractPriorityQueue::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal
Crea la estructura de datos interna


protected **AbstractPriorityQueue::makeInternal**() : [Collection](../../../Collection.md)



---


### make
Named constructor.


abstract static **AbstractPriorityQueue::make**([iterable](../../../iterable.md) $input = [], [Resolver](../../../Resolver.md) $resolver = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### hook
Resuelve los valores antes de ser añadidos desde algun método


protected **AbstractPriorityQueue::hook**(callable $callback, mixed ...$values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|mixed |...$values |  |

---


### peek
Returns the value with the highest priority in the priority queue.


**AbstractPriorityQueue::peek**() : mixed



---


### pop
Returns and removes the value with the highest priority in the queue.


**AbstractPriorityQueue::pop**() : mixed



---


### push
Pushes a value into the queue, with a specified priority.


**AbstractPriorityQueue::push**(mixed $value, int $priority = 0) : [PriorityQueue](../../../PriorityQueue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |
|int |$priority |  |

---


### pushAll
Pushes zero or more values onto the top of the queue.


**AbstractPriorityQueue::pushAll**([iterable](../../../iterable.md) $input) : [PriorityQueue](../../../PriorityQueue.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                