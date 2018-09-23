
                                                                                                                                            
    
# Queue


> A “first in, first out” or “FIFO” collection that only allows access to the
value at the front of the queue and iterates in that order, destructively.
>
> 


## Traits
- PlanB\DS1\Traits\TraitCollection
- PlanB\DS1\Traits\TraitResolver
- PlanB\DS1\Traits\TraitArray




## Properties
- items


## Methods

### clear
Removes all values from the collection.


**Queue::clear**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**Queue::isEmpty**() : bool



---


### count
Returns the size of the collection.


**Queue::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**Queue::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**Queue::copy**() : [Collection](../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**Queue::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**Queue::__debugInfo**() : mixed[]



---


### getIterator
Retrieve an external iterator


**Queue::getIterator**() : [Traversable](../../../Traversable.md)



---


### __construct



protected **Queue::__construct**([Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### configure
Configura esta colección


**Queue::configure**([Resolver](../../../Resolver.md) $resolver) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**Queue::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal
Crea la estructura de datos interna


abstract protected **Queue::makeInternal**() : [Collection](../../../Collection.md)



---


### duplicate
Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver


protected **Queue::duplicate**([iterable](../../../iterable.md) $input = []) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### hook
Resuelve los valores antes de ser añadidos desde algun método


protected **Queue::hook**(callable $callback, mixed ...$values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|mixed |...$values |  |

---


### offsetExists
Whether a offset exists


**Queue::offsetExists**(mixed $offset) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | An offset to check for. |

---


### offsetGet
Offset to retrieve


**Queue::offsetGet**(mixed $offset) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to retrieve. |

---


### offsetSet
Offset to set


**Queue::offsetSet**(mixed $offset, mixed $value) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to assign the value to. |
|mixed |$value | The
                     value
                     to
                     set. |

---


### offsetUnset
Offset to unset


**Queue::offsetUnset**(mixed $offset) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to unset. |

---


### peek
Returns the value at the front of the queue without removing it.


**Queue::peek**() : mixed



---


### pop
Returns and removes the value at the front of the Queue.


**Queue::pop**() : mixed



---


### push
Pushes one value onto the top of the queue.


**Queue::push**(mixed $input) : [Queue](../../../Queue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$input |  |

---


### pushAll
Pushes zero or more values onto the top of the queue.


**Queue::pushAll**([iterable](../../../iterable.md) $input) : [Stack](../../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### make



static **Queue::make**([iterable](../../../iterable.md) $input = [], [Resolver](../../../Resolver.md) $resolver = null) : [Queue](../../../Queue.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### typed
Queue named constructor.


static **Queue::typed**(string $type, [iterable](../../../iterable.md) $input = []) : [Queue](../../../Queue.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|[iterable](../../../iterable.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                