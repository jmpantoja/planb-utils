
                                                                                                                                            
    
# Stack


> A “last in, first out” or “LIFO” collection that only allows access to the
value at the top of the structure and iterates in that order, destructively.
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


**Stack::clear**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**Stack::isEmpty**() : bool



---


### count
Returns the size of the collection.


**Stack::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**Stack::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**Stack::copy**() : [Collection](../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**Stack::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**Stack::__debugInfo**() : mixed[]



---


### getIterator
Retrieve an external iterator


**Stack::getIterator**() : [Traversable](../../../Traversable.md)



---


### bind



protected **Stack::bind**([ResolverInterface](../../../ResolverInterface.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[ResolverInterface](../../../ResolverInterface.md) |$resolver |  |

---


### configure



**Stack::configure**([ResolverInterface](../../../ResolverInterface.md) $resolver) : void


|Parameters: | | |
| --- | --- | --- |
|[ResolverInterface](../../../ResolverInterface.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**Stack::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal
Crea la estructura de datos interna


abstract protected **Stack::makeInternal**() : [Collection](../../../Collection.md)



---


### offsetExists
Whether a offset exists


**Stack::offsetExists**(mixed $offset) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | An offset to check for. |

---


### offsetGet
Offset to retrieve


**Stack::offsetGet**(mixed $offset) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to retrieve. |

---


### offsetSet
Offset to set


**Stack::offsetSet**(mixed $offset, mixed $value) : void


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


**Stack::offsetUnset**(mixed $offset) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to unset. |

---


### __construct
AbstractStack constructor.


**Stack::__construct**([iterable](../../../iterable.md) $input, [ResolverInterface](../../../ResolverInterface.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |
|[ResolverInterface](../../../ResolverInterface.md) |$resolver |  |

---


### peek
Returns the value at the top of the stack without removing it.


**Stack::peek**() : mixed



---


### pop
Returns and removes the value at the top of the stack.


**Stack::pop**() : mixed



---


### push
Pushes one value onto the top of the stack.


**Stack::push**(mixed $value) : [Stack](../../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### pushAll
Pushes zero or more values onto the top of the stack.


**Stack::pushAll**([iterable](../../../iterable.md) $input) : [Stack](../../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### make



static **Stack::make**([iterable](../../../iterable.md) $input = []) : [Stack](../../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### typed
Stack named constructor.


static **Stack::typed**(string $type, [iterable](../../../iterable.md) $input = []) : [Stack](../../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|[iterable](../../../iterable.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                