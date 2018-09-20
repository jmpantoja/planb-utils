
                                                                                                                                            
    
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


**Stack::clear**() : [Collection](../../Collection.md)



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


**Stack::copy**() : [Collection](../../Collection.md)



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


**Stack::getIterator**() : [Traversable](../../Traversable.md)



---


### make



static **Stack::make**([iterable](../../iterable.md) $input = []) : [Collection](../../Collection.md)


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
Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver


protected **Stack::duplicate**([iterable](../../iterable.md) $input = []) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../iterable.md) |$input |  |

---


### bind
Asocia un nuevo resolver


**Stack::bind**([Resolver](../../Resolver.md) $resolver) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../Resolver.md) |$resolver |  |

---


### addFilter
Añade un filtro a la cola


**Stack::addFilter**(callable $filter, int $priority = 0) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$filter |  |
|int |$priority |  |

---


### addTypedFilter
Añade un filtro para un tipo determinado


**Stack::addTypedFilter**(string $type, callable $filter, int $priority = 0) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$filter |  |
|int |$priority |  |

---


### addConverter
Añade un converter


**Stack::addConverter**(string $type, callable $converter, int $priority = 0) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$converter |  |
|int |$priority |  |

---


### addValidator
Añade un validator


**Stack::addValidator**(callable $validator, int $priority = 0) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|int |$priority |  |

---


### addTypedValidator
Añade un validator para un tipo determinado


**Stack::addTypedValidator**(string $type, callable $validator, int $priority = 0) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$validator |  |
|int |$priority |  |

---


### addNormalizer
Añade un normalizer


**Stack::addNormalizer**(callable $normalizer, int $priority = 0) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$normalizer |  |
|int |$priority |  |

---


### addTypedNormalizer
Añade un normalizer para un tipo determinado


**Stack::addTypedNormalizer**(string $type, callable $normalizer, int $priority = 0) : [Collection](../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|callable |$normalizer |  |
|int |$priority |  |

---


### hook



protected **Stack::hook**(callable $callback, mixed ...$values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|mixed |...$values |  |

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


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                