
                                                                                                                                            
    
# AbstractSet


> A sequence of unique values.
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


**AbstractSet::clear**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**AbstractSet::isEmpty**() : bool



---


### count
Returns the size of the collection.


**AbstractSet::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**AbstractSet::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**AbstractSet::copy**() : [Collection](../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**AbstractSet::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**AbstractSet::__debugInfo**() : mixed[]



---


### getIterator
Retrieve an external iterator


**AbstractSet::getIterator**() : [Traversable](../../../Traversable.md)



---


### __construct



protected **AbstractSet::__construct**([Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### configure
Configura esta colección


**AbstractSet::configure**([Resolver](../../../Resolver.md) $resolver) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**AbstractSet::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal



protected **AbstractSet::makeInternal**() : 



---


### make
Named constructor.


abstract static **AbstractSet::make**([iterable](../../../iterable.md) $input = [], [Resolver](../../../Resolver.md) $resolver = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### hook



abstract protected **AbstractSet::hook**(callable $callback, ...$values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
| |...$values |  |

---


### offsetExists
Whether a offset exists


**AbstractSet::offsetExists**(mixed $offset) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | An offset to check for. |

---


### offsetGet
Offset to retrieve


**AbstractSet::offsetGet**(mixed $offset) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to retrieve. |

---


### offsetSet
Offset to set


**AbstractSet::offsetSet**(mixed $offset, mixed $value) : void


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


**AbstractSet::offsetUnset**(mixed $offset) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to unset. |

---


### duplicate
Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver


protected **AbstractSet::duplicate**([iterable](../../../iterable.md) $input = []) : [SetInterface](../../../SetInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### add
Adds zero or more values to the set.


**AbstractSet::add**(mixed $value) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### addAll
Adds zero or more values to the set.


**AbstractSet::addAll**([iterable](../../../iterable.md) $input) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### diff
Creates a new set using values from this set that aren't in another set.
Formally: A \ B = {x ∈ A | x ∉ B}

**AbstractSet::diff**([Set](../../../Set.md) $set) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[Set](../../../Set.md) |$set |  |

---


### xor
Creates a new set using values in either this set or in another set,
but not in both.
Formally: A ⊖ B = {x : x ∈ (A \ B) ∪ (B \ A)}

**AbstractSet::xor**([Set](../../../Set.md) $set) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[Set](../../../Set.md) |$set |  |

---


### filter
Returns a new set containing only the values for which a callback
returns true. A boolean test will be used if a callback is not provided.


**AbstractSet::filter**(callable $callback = null) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts a value, returns a boolean:
                               true : include the value,
                               false: skip the value. |

---


### first
Returns the first value in the set.


**AbstractSet::first**() : mixed



---


### get
Returns the value at a specified position in the set.


**AbstractSet::get**(int $position) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|int |$position |  |

---


### intersect
Creates a new set using values common to both this set and another set.
In other words, returns a copy of this set with all values removed that
aren't in the other set.

Formally: A ∩ B = {x : x ∈ A ∧ x ∈ B}

**AbstractSet::intersect**([Set](../../../Set.md) $set) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[Set](../../../Set.md) |$set |  |

---


### last
Returns the last value in the set.


**AbstractSet::last**() : mixed



---


### reduce
Iteratively reduces the set to a single value using a callback.


**AbstractSet::reduce**(callable $callback, mixed|null $initial = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts the carry and current value, and
                            returns an updated carry value. |
|mixed|null |$initial | Optional initial carry value. |

---


### remove
Removes zero or more values from the set.


**AbstractSet::remove**(mixed ...$values) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |...$values |  |

---


### reverse
Reverses the set in-place.


**AbstractSet::reverse**() : [Set](../../../Set.md)



---


### reversed
Returns a reversed copy of the set.


**AbstractSet::reversed**() : [Set](../../../Set.md)



---


### slice
Returns a subset of a given length starting at a specified offset.


**AbstractSet::slice**(int $offset, int $length = null) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|int |$offset | If the offset is non-negative, the set will start
                   at that offset in the set. If offset is negative,
                   the set will start that far from the end. |
|int |$length | If a length is given and is positive, the resulting
                   set will have up to that many values in it.
                   If the requested length results in an overflow, only
                   values up to the end of the set will be included.</p>

<pre><code>               If a length is given and is negative, the set
               will stop that many values from the end.

               If a length is not provided, the resulting set
               will contains all values between the offset and the
               end of the set.
</code></pre>
 |

---


### sort
Sorts the set in-place, based on an optional callable comparator.


**AbstractSet::sort**(callable $comparator = null) : [Map](../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared.
                                 Should return the result of a &lt;=> b. |

---


### sorted
Returns a sorted copy of the set, based on an optional callable
comparator. Natural ordering will be used if a comparator is not given.


**AbstractSet::sorted**(callable $comparator = null) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared.
                                 Should return the result of a &lt;=> b. |

---


### merge
Returns the result of adding all given values to the set.


**AbstractSet::merge**([iterable](../../../iterable.md) $values) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$values |  |

---


### union
Creates a new set that contains the values of this set as well as the
values of another set.
Formally: A ∪ B = {x: x ∈ A ∨ x ∈ B}

**AbstractSet::union**([Set](../../../Set.md) $set) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[Set](../../../Set.md) |$set |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                