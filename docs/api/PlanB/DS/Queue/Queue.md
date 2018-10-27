
                                                                                                                                            
    
# Queue


> A “first in, first out” or “FIFO” collection that only allows access to the
value at the front of the queue and iterates in that order, destructively.
>
> 


## Traits
- PlanB\DS\Traits\TraitFinal
- PlanB\DS\Traits\TraitCollection
- PlanB\DS\Traits\TraitResolver
- PlanB\DS\Traits\TraitArray




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


### bind



protected **Queue::bind**([ResolverInterface](../../../ResolverInterface.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[ResolverInterface](../../../ResolverInterface.md) |$resolver |  |

---


### configure
Configura esta colección


abstract **Queue::configure**([ResolverInterface](../../../ResolverInterface.md) $resolver) : void


|Parameters: | | |
| --- | --- | --- |
|[ResolverInterface](../../../ResolverInterface.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**Queue::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal
Crea la estructura de datos interna


abstract protected **Queue::makeInternal**() : [Collection](../../../Collection.md)



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


### __construct
AbstractQueue constructor.


**Queue::__construct**([iterable](../../../iterable.md) $input, [ResolverInterface](../../../ResolverInterface.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |
|[ResolverInterface](../../../ResolverInterface.md) |$resolver |  |

---


### pop
Returns and removes the value at the front of the Queue.


**Queue::pop**() : mixed



---


### peek
Returns the value at the front of the queue without removing it.


**Queue::peek**() : mixed



---


### push
Pushes one value onto the top of the queue.


**Queue::push**(mixed $value) : [Queue](../../../Queue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### pushAll
Pushes zero or more values onto the top of the queue.


**Queue::pushAll**([iterable](../../../iterable.md) $input) : [Stack](../../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### make



static **Queue::make**([iterable](../../../iterable.md) $input = []) : [Queue](../../../Queue.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### typed
Queue named constructor.


static **Queue::typed**(string $type, [iterable](../../../iterable.md) $input = []) : [Queue](../../../Queue.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|[iterable](../../../iterable.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                