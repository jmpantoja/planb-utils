
                                                                                                                                            
    
# Stack


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


**Stack::clear**() : 



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


**Stack::jsonSerialize**() : mixed



---


### copy
Creates a shallow copy of the collection.


**Stack::copy**() : [Collection](../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**Stack::toArray**() : array



---


### __debugInfo
Invoked when calling var_dump.


**Stack::__debugInfo**() : array



---


### make



static **Stack::make**([iterable](../../iterable.md) $input = []) : 


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../iterable.md) |$input |  |

---


### __construct



protected **Stack::__construct**([iterable](../../iterable.md) $input = []) : 


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../iterable.md) |$input |  |

---


### makeInternal



protected **Stack::makeInternal**([iterable](../../iterable.md) $input) : 


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../iterable.md) |$input |  |

---


### duplicate



protected **Stack::duplicate**([iterable](../../iterable.md) $input = []) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../iterable.md) |$input |  |

---


### getIterator
Retrieve an external iterator


**Stack::getIterator**() : [Traversable](../../Traversable.md)



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


### peek
Returns the value at the top of the stack without removing it.


**Stack::peek**() : mixed



---


### pop
Returns and removes the value at the top of the stack.


**Stack::pop**() : mixed



---


### push
Pushes zero or more values onto the top of the stack.


**Stack::push**(mixed ...$values) : [Stack](../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |...$values |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                