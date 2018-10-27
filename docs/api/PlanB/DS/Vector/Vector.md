
                                                                                                                                            
    
# Vector


> A Vector is a sequence of values in a contiguous buffer that grows and
shrinks automatically. It’s the most efficient sequential structure because
a value’s index is a direct mapping to its index in the buffer, and the
growth factor isn't bound to a specific multiple or exponent.
>
> 


## Traits
- PlanB\DS\Traits\TraitFinal
- PlanB\DS\Traits\TraitCollection
- PlanB\DS\Traits\TraitResolver
- PlanB\DS\Traits\TraitSequence
- PlanB\DS\Traits\TraitArray




## Properties
- items


## Methods

### clear
Removes all values from the collection.


**Vector::clear**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**Vector::isEmpty**() : bool



---


### count
Returns the size of the collection.


**Vector::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**Vector::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**Vector::copy**() : [Collection](../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**Vector::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**Vector::__debugInfo**() : mixed[]



---


### getIterator
Retrieve an external iterator


**Vector::getIterator**() : [Traversable](../../../Traversable.md)



---


### bind



protected **Vector::bind**([ResolverInterface](../../../ResolverInterface.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[ResolverInterface](../../../ResolverInterface.md) |$resolver |  |

---


### configure
Configura esta colección


abstract **Vector::configure**([ResolverInterface](../../../ResolverInterface.md) $resolver) : void


|Parameters: | | |
| --- | --- | --- |
|[ResolverInterface](../../../ResolverInterface.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**Vector::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal
Crea la estructura de datos interna


abstract protected **Vector::makeInternal**() : [Collection](../../../Collection.md)



---


### apply
Updates every value in the sequence by applying a callback, using the
return value as the new value.


**Vector::apply**(callable $callback) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts the value, returns the new value. |

---


### contains
Determines whether the sequence contains all of zero or more values.


**Vector::contains**(mixed ...$values) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |...$values |  |

---


### filter
Returns a new sequence containing only the values for which a callback
returns true. A boolean test will be used if a callback is not provided.


**Vector::filter**(callable $callback = null) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts a value, returns a boolean result:
                               true : include the value,
                               false: skip the value. |

---


### find
Returns the index of a given value, or null if it could not be found.


**Vector::find**(mixed $value) : int|null


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### findAll
Returns the all the index of a given value, or null if it could not be found.


**Vector::findAll**(mixed $value) : mixed[]|null


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### first
Returns the first value in the sequence.


**Vector::first**() : mixed



---


### get
Returns the value at a given index (position) in the sequence.


**Vector::get**(int $index) : mixed


|Parameters: | | |
| --- | --- | --- |
|int |$index |  |

---


### insert
Inserts zero or more values at a given index.
Each value after the index will be moved one position to the right.
Values may be inserted at an index equal to the size of the sequence.

**Vector::insert**(int $index, mixed ...$values) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|int |$index |  |
|mixed |...$values |  |

---


### last
Returns the last value in the sequence.


**Vector::last**() : mixed



---


### map
Returns a new sequence using the results of applying a callback to each
value.


**Vector::map**(callable $callback) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### merge
Returns the result of adding all given values to the sequence.


**Vector::merge**([iterable](../../../iterable.md) $values) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$values |  |

---


### pop
Removes the last value in the sequence, and returns it.


**Vector::pop**() : mixed



---


### pushAll
Pushes all values of either an array or traversable object.


**Vector::pushAll**([iterable](../../../iterable.md) $values) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$values |  |

---


### push
Adds zero or more values to the end of the sequence.


**Vector::push**(mixed ...$values) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |...$values |  |

---


### reduce
Iteratively reduces the sequence to a single value using a callback.


**Vector::reduce**(callable $callback, mixed|null $initial = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts the carry and current value, and
                            returns an updated carry value. |
|mixed|null |$initial | Optional initial carry value. |

---


### remove
Removes and returns the value at a given index in the sequence.


**Vector::remove**(int $index) : mixed


|Parameters: | | |
| --- | --- | --- |
|int |$index | this index to remove. |

---


### reverse
Reverses the sequence in-place.


**Vector::reverse**() : [Sequence](../../../Sequence.md)



---


### reversed
Returns a reversed copy of the sequence.


**Vector::reversed**() : [Sequence](../../../Sequence.md)



---


### rotate
Rotates the sequence by a given number of rotations, which is equivalent
to successive calls to 'shift' and 'push' if the number of rotations is
positive, or 'pop' and 'unshift' if negative.


**Vector::rotate**(int $rotations) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|int |$rotations | The number of rotations (can be negative). |

---


### set
Replaces the value at a given index in the sequence with a new value.


**Vector::set**(int $index, mixed $value) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|int |$index |  |
|mixed |$value |  |

---


### shift
Removes and returns the first value in the sequence.


**Vector::shift**() : mixed



---


### slice
Returns a sub-sequence of a given length starting at a specified index.


**Vector::slice**(int $index, int $length = null) : [Sequence](../../../Sequence.md)


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


**Vector::sort**(callable $comparator = null) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared.
                                 Should return the result of a &lt;=> b. |

---


### sorted
Returns a sorted copy of the sequence, based on an optional callable
comparator. Natural ordering will be used if a comparator is not given.


**Vector::sorted**(callable $comparator = null) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared.
                                 Should return the result of a &lt;=> b. |

---


### unshift
Adds zero or more values to the front of the sequence.


**Vector::unshift**(mixed ...$values) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |...$values |  |

---


### max
Return the maximum value


**Vector::max**(callable $comparator = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator |  |

---


### min
Return the minimun value


**Vector::min**(callable $comparator = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator |  |

---


### duplicate
Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver


abstract protected **Vector::duplicate**([iterable](../../../iterable.md) $input = []) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### offsetSet
Offset to set


**Vector::offsetSet**(mixed $offset, mixed $value) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to assign the value to. |
|mixed |$value | The
                     value
                     to
                     set. |

---


### offsetExists
Whether a offset exists


**Vector::offsetExists**(mixed $offset) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | An offset to check for. |

---


### offsetGet
Offset to retrieve


**Vector::offsetGet**(mixed $offset) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to retrieve. |

---


### offsetUnset
Offset to unset


**Vector::offsetUnset**(mixed $offset) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to unset. |

---


### __construct
AbstractVector constructor.


**Vector::__construct**([iterable](../../../iterable.md) $input, [ResolverInterface](../../../ResolverInterface.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |
|[ResolverInterface](../../../ResolverInterface.md) |$resolver |  |

---


### make
Vector named constructor.


static **Vector::make**([iterable](../../../iterable.md) $input = []) : [Vector](../../../Vector.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### typed
Vector named constructor.


static **Vector::typed**(string $type, [iterable](../../../iterable.md) $input = []) : [Vector](../../../Vector.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |
|[iterable](../../../iterable.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                