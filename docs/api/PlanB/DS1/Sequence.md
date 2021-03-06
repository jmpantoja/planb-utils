
                                                                                                                                            
    
# Sequence


> Describes the behaviour of values arranged in a single, linear dimension.
>
> Some languages refer to this as a "List". It’s similar to an array that uses
incremental integer keys, with the exception of a few characteristics:</p>

<ul>
<li>Values will always be indexed as [0, 1, 2, …, size - 1].</li>
<li>Only allowed to access values by index in the range [0, size - 1].</li>
</ul>









## Methods

### clear
Removes all values from the collection.


**Sequence::clear**() : 



---


### count
Returns the size of the collection.


**Sequence::count**() : int



---


### copy
Returns a shallow copy of the collection.


**Sequence::copy**() : [Collection](../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**Sequence::isEmpty**() : bool



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent.
Some implementations may throw an exception if an array representation
could not be created.

**Sequence::toArray**() : mixed[]



---


### each
Updates every value in the sequence by applying a callback, using the
return value as the new value.


**Sequence::each**(callable $callback) : [Sequence](../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts the value, returns the new value. |

---


### contains
Determines whether the sequence contains all of zero or more values.


**Sequence::contains**(mixed ...$values) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |...$values |  |

---


### filter
Returns a new sequence containing only the values for which a callback
returns true. A boolean test will be used if a callback is not provided.


**Sequence::filter**(callable $callback = null) : [Sequence](../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts a value, returns a boolean result:
                               true : include the value,
                               false: skip the value. |

---


### find
Returns the index of a given value, or null if it could not be found.


**Sequence::find**(mixed $value) : int|null


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### findAll
Returns the all the index of a given value, or null if it could not be found.


**Sequence::findAll**(mixed $value) : mixed[]|null


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### first
Returns the first value in the sequence.


**Sequence::first**() : mixed



---


### get
Returns the value at a given index (position) in the sequence.


**Sequence::get**(int $index) : mixed


|Parameters: | | |
| --- | --- | --- |
|int |$index |  |

---


### insert
Inserts zero or more values at a given index.
Each value after the index will be moved one position to the right.
Values may be inserted at an index equal to the size of the sequence.

**Sequence::insert**(int $index, mixed ...$values) : [Sequence](../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|int |$index |  |
|mixed |...$values |  |

---


### last
Returns the last value in the sequence.


**Sequence::last**() : mixed



---


### map
Returns a new sequence using the results of applying a callback to each
value.


**Sequence::map**(callable $callback) : [Sequence](../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### merge
Returns the result of adding all given values to the sequence.


**Sequence::merge**([iterable](../../iterable.md) $values) : [Sequence](../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../iterable.md) |$values |  |

---


### pop
Removes the last value in the sequence, and returns it.


**Sequence::pop**() : mixed



---


### push
Adds zero or more values to the end of the sequence.


**Sequence::push**(mixed ...$values) : [Sequence](../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |...$values |  |

---


### reduce
Iteratively reduces the sequence to a single value using a callback.


**Sequence::reduce**(callable $callback, mixed|null $initial = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts the carry and current value, and
                            returns an updated carry value. |
|mixed|null |$initial | Optional initial carry value. |

---


### remove
Removes and returns the value at a given index in the sequence.


**Sequence::remove**(int $index) : mixed


|Parameters: | | |
| --- | --- | --- |
|int |$index | this index to remove. |

---


### reverse
Reverses the sequence in-place.


**Sequence::reverse**() : 



---


### reversed
Returns a reversed copy of the sequence.


**Sequence::reversed**() : [Sequence](../../Sequence.md)



---


### rotate
Rotates the sequence by a given number of rotations, which is equivalent
to successive calls to 'shift' and 'push' if the number of rotations is
positive, or 'pop' and 'unshift' if negative.


**Sequence::rotate**(int $rotations) : [Sequence](../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|int |$rotations | The number of rotations (can be negative). |

---


### set
Replaces the value at a given index in the sequence with a new value.


**Sequence::set**(int $index, mixed $value) : [Sequence](../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|int |$index |  |
|mixed |$value |  |

---


### shift
Removes and returns the first value in the sequence.


**Sequence::shift**() : mixed



---


### slice
Returns a sub-sequence of a given length starting at a specified index.


**Sequence::slice**(int $index, int $length = null) : [Sequence](../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|int |$index | If the index is positive, the sequence will start
                   at that index in the sequence. If index is
                   negative, the sequence will start that far from
                   the end. |
|int |$length | If a length is given and is positive, the resulting
                   sequence will have up to that many values in it.
                   If the length results in an overflow, only values
                   up to the end of the sequence will be included.</p>

<pre><code>               If a length is given and is negative, the sequence
               will stop that many values from the end.

               If a length is not provided, the resulting sequence
               will contain all values between the index and the
               end of the sequence.
</code></pre>
 |

---


### sort
Sorts the sequence in-place, based on an optional callable comparator.


**Sequence::sort**(callable $comparator = null) : [Sequence](../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared.
                                 Should return the result of a &lt;=> b. |

---


### sorted
Returns a sorted copy of the sequence, based on an optional callable
comparator. Natural ordering will be used if a comparator is not given.


**Sequence::sorted**(callable $comparator = null) : [Sequence](../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared.
                                 Should return the result of a &lt;=> b. |

---


### unshift
Adds zero or more values to the front of the sequence.


**Sequence::unshift**(mixed ...$values) : [Sequence](../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |...$values |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                