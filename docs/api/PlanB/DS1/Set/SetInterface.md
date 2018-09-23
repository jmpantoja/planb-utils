
                                                                                                                                            
    
# SetInterface


> Interfaz para Set
>
> 








## Methods

### clear
Removes all values from the collection.


**SetInterface::clear**() : 



---


### count
Returns the size of the collection.


**SetInterface::count**() : int



---


### copy
Returns a shallow copy of the collection.


**SetInterface::copy**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**SetInterface::isEmpty**() : bool



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent.
Some implementations may throw an exception if an array representation
could not be created.

**SetInterface::toArray**() : mixed[]



---


### offsetSet
Offset to set


**SetInterface::offsetSet**(mixed $offset, mixed $value) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to assign the value to. |
|mixed |$value | The
                     value
                     to
                     set. |

---


### add
Adds zero or more values to the set.


**SetInterface::add**(mixed $value) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### addAll
Adds zero or more values to the set.


**SetInterface::addAll**([iterable](../../../iterable.md) $input) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### diff
Creates a new set using values from this set that aren't in another set.
Formally: A \ B = {x ∈ A | x ∉ B}

**SetInterface::diff**([Set](../../../Set.md) $set) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[Set](../../../Set.md) |$set |  |

---


### xor
Creates a new set using values in either this set or in another set,
but not in both.
Formally: A ⊖ B = {x : x ∈ (A \ B) ∪ (B \ A)}

**SetInterface::xor**([Set](../../../Set.md) $set) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[Set](../../../Set.md) |$set |  |

---


### filter
Returns a new set containing only the values for which a callback
returns true. A boolean test will be used if a callback is not provided.


**SetInterface::filter**(callable $callback = null) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts a value, returns a boolean:
                               true : include the value,
                               false: skip the value. |

---


### first
Returns the first value in the set.


**SetInterface::first**() : mixed



---


### get
Returns the value at a specified position in the set.


**SetInterface::get**(int $position) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|int |$position |  |

---


### intersect
Creates a new set using values common to both this set and another set.
In other words, returns a copy of this set with all values removed that
aren't in the other set.

Formally: A ∩ B = {x : x ∈ A ∧ x ∈ B}

**SetInterface::intersect**([Set](../../../Set.md) $set) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[Set](../../../Set.md) |$set |  |

---


### last
Returns the last value in the set.


**SetInterface::last**() : mixed



---


### reduce
Iteratively reduces the set to a single value using a callback.


**SetInterface::reduce**(callable $callback, mixed|null $initial = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts the carry and current value, and
                            returns an updated carry value. |
|mixed|null |$initial | Optional initial carry value. |

---


### remove
Removes zero or more values from the set.


**SetInterface::remove**(mixed ...$values) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |...$values |  |

---


### reverse
Reverses the set in-place.


**SetInterface::reverse**() : [Set](../../../Set.md)



---


### reversed
Returns a reversed copy of the set.


**SetInterface::reversed**() : [Set](../../../Set.md)



---


### slice
Returns a subset of a given length starting at a specified offset.


**SetInterface::slice**(int $offset, int $length = null) : [Set](../../../Set.md)


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


**SetInterface::sort**(callable $comparator = null) : [Map](../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared.
                                 Should return the result of a &lt;=> b. |

---


### sorted
Returns a sorted copy of the set, based on an optional callable
comparator. Natural ordering will be used if a comparator is not given.


**SetInterface::sorted**(callable $comparator = null) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared.
                                 Should return the result of a &lt;=> b. |

---


### merge
Returns the result of adding all given values to the set.


**SetInterface::merge**([iterable](../../../iterable.md) $values) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$values |  |

---


### union
Creates a new set that contains the values of this set as well as the
values of another set.
Formally: A ∪ B = {x: x ∈ A ∨ x ∈ B}

**SetInterface::union**([Set](../../../Set.md) $set) : [Set](../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[Set](../../../Set.md) |$set |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                