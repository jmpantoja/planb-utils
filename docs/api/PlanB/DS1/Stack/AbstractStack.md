
                                                                                                                                            
    
# AbstractStack


> A “last in, first out” or “LIFO” collection that only allows access to the
value at the top of the structure and iterates in that order, destructively.
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


**AbstractStack::clear**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**AbstractStack::isEmpty**() : bool



---


### count
Returns the size of the collection.


**AbstractStack::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**AbstractStack::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**AbstractStack::copy**() : [Collection](../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**AbstractStack::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**AbstractStack::__debugInfo**() : mixed[]



---


### getIterator
Retrieve an external iterator


**AbstractStack::getIterator**() : [Traversable](../../../Traversable.md)



---


### __construct



protected **AbstractStack::__construct**([Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### configure
Configura esta colección


**AbstractStack::configure**([Resolver](../../../Resolver.md) $resolver) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**AbstractStack::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal



protected **AbstractStack::makeInternal**() : 



---


### duplicate
Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver


protected **AbstractStack::duplicate**([iterable](../../../iterable.md) $input = []) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### hook
Resuelve los valores antes de ser añadidos desde algun método


protected **AbstractStack::hook**(callable $callback, mixed ...$values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|mixed |...$values |  |

---


### offsetExists
Whether a offset exists


**AbstractStack::offsetExists**(mixed $offset) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | An offset to check for. |

---


### offsetGet
Offset to retrieve


**AbstractStack::offsetGet**(mixed $offset) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to retrieve. |

---


### offsetSet
Offset to set


**AbstractStack::offsetSet**(mixed $offset, mixed $value) : void


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


**AbstractStack::offsetUnset**(mixed $offset) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to unset. |

---


### peek
Returns the value at the top of the stack without removing it.


**AbstractStack::peek**() : mixed



---


### pop
Returns and removes the value at the top of the stack.


**AbstractStack::pop**() : mixed



---


### push
Pushes one value onto the top of the stack.


**AbstractStack::push**(mixed $input) : [Stack](../../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$input |  |

---


### pushAll
Pushes zero or more values onto the top of the stack.


**AbstractStack::pushAll**([iterable](../../../iterable.md) $input) : [Stack](../../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                