
                                                                                                                                            
    
# AbstractQueue


> A “first in, first out” or “FIFO” collection that only allows access to the
value at the front of the queue and iterates in that order, destructively.
>
> 


## Traits
- PlanB\DS\Traits\TraitCollection
- PlanB\DS\Traits\TraitResolver
- PlanB\DS\Traits\TraitArray




## Properties
- items


## Methods

### clear
Removes all values from the collection.


**AbstractQueue::clear**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**AbstractQueue::isEmpty**() : bool



---


### count
Returns the size of the collection.


**AbstractQueue::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**AbstractQueue::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**AbstractQueue::copy**() : [Collection](../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**AbstractQueue::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**AbstractQueue::__debugInfo**() : mixed[]



---


### getIterator
Retrieve an external iterator


**AbstractQueue::getIterator**() : [Traversable](../../../Traversable.md)



---


### bind



protected **AbstractQueue::bind**([Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### configure
Configura esta colección


**AbstractQueue::configure**([Resolver](../../../Resolver.md) $resolver) : void


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**AbstractQueue::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal



protected **AbstractQueue::makeInternal**() : 



---


### make
Named constructor.


abstract static **AbstractQueue::make**([iterable](../../../iterable.md) $input = []) : mixed


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### offsetExists
Whether a offset exists


**AbstractQueue::offsetExists**(mixed $offset) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | An offset to check for. |

---


### offsetGet
Offset to retrieve


**AbstractQueue::offsetGet**(mixed $offset) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to retrieve. |

---


### offsetSet
Offset to set


**AbstractQueue::offsetSet**(mixed $offset, mixed $value) : void


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


**AbstractQueue::offsetUnset**(mixed $offset) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to unset. |

---


### __construct
AbstractQueue constructor.


**AbstractQueue::__construct**([iterable](../../../iterable.md) $input, [Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### pop
Returns and removes the value at the front of the Queue.


**AbstractQueue::pop**() : mixed



---


### peek
Returns the value at the front of the queue without removing it.


**AbstractQueue::peek**() : mixed



---


### push
Pushes one value onto the top of the queue.


**AbstractQueue::push**(mixed $value) : [Queue](../../../Queue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### pushAll
Pushes zero or more values onto the top of the queue.


**AbstractQueue::pushAll**([iterable](../../../iterable.md) $input) : [Stack](../../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                