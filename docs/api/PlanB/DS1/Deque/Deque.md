
                                                                                                                                            
    
# Deque


> A Deque (pronounced "deck") is a sequence of values in a contiguous buffer
that grows and shrinks automatically. The name is a common abbreviation of
"double-ended queue".
>
> While a Deque is very similar to a Vector, it offers constant time operations
at both ends of the buffer, ie. shift, unshift, push and pop are all O(1).


## Traits
- PlanB\DS1\Traits\TraitCollection
- PlanB\DS1\Traits\TraitResolver
- PlanB\DS1\Traits\TraitSequence
- PlanB\DS1\Traits\TraitArray




## Properties
- items


## Methods

### clear
Removes all values from the collection.


**Deque::clear**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**Deque::isEmpty**() : bool



---


### count
Returns the size of the collection.


**Deque::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**Deque::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**Deque::copy**() : [Collection](../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**Deque::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**Deque::__debugInfo**() : mixed[]



---


### getIterator
Retrieve an external iterator


**Deque::getIterator**() : [Traversable](../../../Traversable.md)



---


### __construct



protected **Deque::__construct**([Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### configure
Configura esta colección


**Deque::configure**([Resolver](../../../Resolver.md) $resolver) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**Deque::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal
Crea la estructura de datos interna


abstract protected **Deque::makeInternal**() : [Collection](../../../Collection.md)



---


### duplicate
Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver


protected **Deque::duplicate**([iterable](../../../iterable.md) $input = []) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### hook
Resuelve los valores antes de ser añadidos desde algun método


protected **Deque::hook**(callable $callback, mixed ...$values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|mixed |...$values |  |

---


### each
Updates every value in the sequence by applying a callback, using the
return value as the new value.


**Deque::each**(callable $callback) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts the value, returns the new value. |

---


### contains
Determines whether the sequence contains all of zero or more values.


**Deque::contains**(mixed ...$values) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |...$values |  |

---


### filter
Returns a new sequence containing only the values for which a callback
returns true. A boolean test will be used if a callback is not provided.


**Deque::filter**(callable $callback = null) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts a value, returns a boolean result:
                               true : include the value,
                               false: skip the value. |

---


### find
Returns the index of a given value, or null if it could not be found.


**Deque::find**(mixed $value) : int|null


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### findAll
Returns the all the index of a given value, or null if it could not be found.


**Deque::findAll**(mixed $value) : mixed[]|null


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### first
Returns the first value in the sequence.


**Deque::first**() : mixed



---


### get
Returns the value at a given index (position) in the sequence.


**Deque::get**(int $index) : mixed


|Parameters: | | |
| --- | --- | --- |
|int |$index |  |

---


### insert
Inserts zero or more values at a given index.
Each value after the index will be moved one position to the right.
Values may be inserted at an index equal to the size of the sequence.

**Deque::insert**(int $index, mixed ...$values) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|int |$index |  |
|mixed |...$values |  |

---


### last
Returns the last value in the sequence.


**Deque::last**() : mixed



---


### map
Returns a new sequence using the results of applying a callback to each
value.


**Deque::map**(callable $callback) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### merge
Returns the result of adding all given values to the sequence.


**Deque::merge**([iterable](../../../iterable.md) $values) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$values |  |

---


### pop
Removes the last value in the sequence, and returns it.


**Deque::pop**() : mixed



---


### pushAll
Pushes all values of either an array or traversable object.


**Deque::pushAll**([iterable](../../../iterable.md) $values) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$values |  |

---


### push
Adds zero or more values to the end of the sequence.


**Deque::push**(mixed ...$values) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |...$values |  |

---


### reduce
Iteratively reduces the sequence to a single value using a callback.


**Deque::reduce**(callable $callback, mixed|null $initial = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts the carry and current value, and
                            returns an updated carry value. |
|mixed|null |$initial | Optional initial carry value. |

---


### remove
Removes and returns the value at a given index in the sequence.


**Deque::remove**(int $index) : mixed


|Parameters: | | |
| --- | --- | --- |
|int |$index | this index to remove. |

---


### reverse
Reverses the sequence in-place.


**Deque::reverse**() : [Sequence](../../../Sequence.md)



---


### reversed
Returns a reversed copy of the sequence.


**Deque::reversed**() : [Sequence](../../../Sequence.md)



---


### rotate
Rotates the sequence by a given number of rotations, which is equivalent
to successive calls to 'shift' and 'push' if the number of rotations is
positive, or 'pop' and 'unshift' if negative.


**Deque::rotate**(int $rotations) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|int |$rotations | The number of rotations (can be negative). |

---


### set
Replaces the value at a given index in the sequence with a new value.


**Deque::set**(int $index, mixed $value) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|int |$index |  |
|mixed |$value |  |

---


### shift
Removes and returns the first value in the sequence.


**Deque::shift**() : mixed



---


### slice
Returns a sub-sequence of a given length starting at a specified index.


**Deque::slice**(int $index, int $length = null) : [Sequence](../../../Sequence.md)


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


**Deque::sort**(callable $comparator = null) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared.
                                 Should return the result of a &lt;=> b. |

---


### sorted
Returns a sorted copy of the sequence, based on an optional callable
comparator. Natural ordering will be used if a comparator is not given.


**Deque::sorted**(callable $comparator = null) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared.
                                 Should return the result of a &lt;=> b. |

---


### unshift
Adds zero or more values to the front of the sequence.


**Deque::unshift**(mixed ...$values) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |...$values |  |

---


### max
Return the maximum value


**Deque::max**(callable $comparator = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator |  |

---


### min
Return the minimun value


**Deque::min**(callable $comparator = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator |  |

---


### offsetExists
Whether a offset exists


**Deque::offsetExists**(mixed $offset) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | An offset to check for. |

---


### offsetGet
Offset to retrieve


**Deque::offsetGet**(mixed $offset) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to retrieve. |

---


### offsetSet
Offset to set


**Deque::offsetSet**(mixed $offset, mixed $value) : void


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


**Deque::offsetUnset**(mixed $offset) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to unset. |

---


### make



static **Deque::make**([iterable](../../../iterable.md) $input = [], [Resolver](../../../Resolver.md) $resolver = null) : [Deque](../../../Deque.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### typed
Deque named constructor.


static **Deque::typed**(string $type, [iterable](../../../iterable.md) $input = []) : [Deque](../../../Deque.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|[iterable](../../../iterable.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                