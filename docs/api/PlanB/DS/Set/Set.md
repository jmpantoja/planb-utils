
                                                                                                                                            
    
# Set


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


**Set::clear**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**Set::isEmpty**() : bool



---


### count
Returns the size of the collection.


**Set::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**Set::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**Set::copy**() : [Collection](../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**Set::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**Set::__debugInfo**() : mixed[]



---


### getIterator
Retrieve an external iterator


**Set::getIterator**() : [Traversable](../../../Traversable.md)



---


### __construct



protected **Set::__construct**([Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### configure
Configura esta colección


**Set::configure**([Resolver](../../../Resolver.md) $resolver) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**Set::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal
Crea la estructura de datos interna


abstract protected **Set::makeInternal**() : [Collection](../../../Collection.md)



---


### duplicate
Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver


protected **Set::duplicate**([iterable](../../../iterable.md) $input = []) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### hook
Resuelve los valores antes de ser añadidos desde algun método


protected **Set::hook**(callable $callback, mixed ...$values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|mixed |...$values |  |

---


### offsetExists
Whether a offset exists


**Set::offsetExists**(mixed $offset) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | An offset to check for. |

---


### offsetGet
Offset to retrieve


**Set::offsetGet**(mixed $offset) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to retrieve. |

---


### offsetSet
Offset to set


**Set::offsetSet**(mixed $offset, mixed $value) : void


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


**Set::offsetUnset**(mixed $offset) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to unset. |

---


### add
Adds zero or more values to the set.


**Set::add**(mixed $value) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### addAll
Adds zero or more values to the set.


**Set::addAll**([iterable](../../../iterable.md) $input) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### diff
Creates a new set using values from this set that aren't in another set.
Formally: A \ B = {x ∈ A | x ∉ B}

**Set::diff**([Set](../../../Set.md) $set) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[Set](../../../Set.md) |$set |  |

---


### xor
Creates a new set using values in either this set or in another set,
but not in both.
Formally: A ⊖ B = {x : x ∈ (A \ B) ∪ (B \ A)}

**Set::xor**([Set](../../../Set.md) $set) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[Set](../../../Set.md) |$set |  |

---


### filter
Returns a new set containing only the values for which a callback
returns true. A boolean test will be used if a callback is not provided.


**Set::filter**(callable $callback = null) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts a value, returns a boolean:
                               true : include the value,
                               false: skip the value. |

---


### first
Returns the first value in the set.


**Set::first**() : mixed



---


### get
Returns the value at a specified position in the set.


**Set::get**(int $position) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|int |$position |  |

---


### intersect
Creates a new set using values common to both this set and another set.
In other words, returns a copy of this set with all values removed that
aren't in the other set.

Formally: A ∩ B = {x : x ∈ A ∧ x ∈ B}

**Set::intersect**([Set](../../../Set.md) $set) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[Set](../../../Set.md) |$set |  |

---


### last
Returns the last value in the set.


**Set::last**() : mixed



---


### reduce
Iteratively reduces the set to a single value using a callback.


**Set::reduce**(callable $callback, mixed|null $initial = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts the carry and current value, and
                            returns an updated carry value. |
|mixed|null |$initial | Optional initial carry value. |

---


### remove
Removes zero or more values from the set.


**Set::remove**(mixed ...$values) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |...$values |  |

---


### reverse
Reverses the set in-place.


**Set::reverse**() : [Set](../../../Set.md)



---


### reversed
Returns a reversed copy of the set.


**Set::reversed**() : [Set](../../../Set.md)



---


### slice
Returns a subset of a given length starting at a specified offset.


**Set::slice**(int $offset, int $length = null) : [Set](../../../Set.md)


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


**Set::sort**(callable $comparator = null) : [Map](../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared.
                                 Should return the result of a &lt;=> b. |

---


### sorted
Returns a sorted copy of the set, based on an optional callable
comparator. Natural ordering will be used if a comparator is not given.


**Set::sorted**(callable $comparator = null) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared.
                                 Should return the result of a &lt;=> b. |

---


### merge
Returns the result of adding all given values to the set.


**Set::merge**([iterable](../../../iterable.md) $values) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$values |  |

---


### union
Creates a new set that contains the values of this set as well as the
values of another set.
Formally: A ∪ B = {x: x ∈ A ∨ x ∈ B}

**Set::union**([Set](../../../Set.md) $set) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[Set](../../../Set.md) |$set |  |

---


### make



static **Set::make**([iterable](../../../iterable.md) $input = [], [Resolver](../../../Resolver.md) $resolver = null) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### typed
Set named constructor.


static **Set::typed**(string $type, [iterable](../../../iterable.md) $input = []) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|[iterable](../../../iterable.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                