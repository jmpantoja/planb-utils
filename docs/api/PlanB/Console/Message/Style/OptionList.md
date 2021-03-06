
                                                                                                                                            
    
# OptionList


> Lista de opciones
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


**OptionList::clear**() : [Collection](../../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**OptionList::isEmpty**() : bool



---


### count
Returns the size of the collection.


**OptionList::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**OptionList::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**OptionList::copy**() : [Collection](../../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**OptionList::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**OptionList::__debugInfo**() : mixed[]



---


### getIterator
Retrieve an external iterator


**OptionList::getIterator**() : [Traversable](../../../../Traversable.md)



---


### bind



protected **OptionList::bind**([ResolverInterface](../../../../ResolverInterface.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[ResolverInterface](../../../../ResolverInterface.md) |$resolver |  |

---


### configure



**OptionList::configure**([ResolverInterface](../../../../ResolverInterface.md) $resolver) : void


|Parameters: | | |
| --- | --- | --- |
|[ResolverInterface](../../../../ResolverInterface.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**OptionList::getInnerType**() : null|[DataType](../../../../DataType.md)



---


### makeInternal
Crea la estructura de datos interna


abstract protected **OptionList::makeInternal**() : [Collection](../../../../Collection.md)



---


### offsetExists
Whether a offset exists


**OptionList::offsetExists**(mixed $offset) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | An offset to check for. |

---


### offsetGet
Offset to retrieve


**OptionList::offsetGet**(mixed $offset) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to retrieve. |

---


### offsetSet
Offset to set


**OptionList::offsetSet**(mixed $offset, mixed $value) : void


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


**OptionList::offsetUnset**(mixed $offset) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to unset. |

---


### __construct
AbstractSet constructor.


**OptionList::__construct**([iterable](../../../../iterable.md) $input, [ResolverInterface](../../../../ResolverInterface.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../../iterable.md) |$input |  |
|[ResolverInterface](../../../../ResolverInterface.md) |$resolver |  |

---


### duplicate
Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver


protected **OptionList::duplicate**([iterable](../../../../iterable.md) $input = []) : [SetInterface](../../../../SetInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../../iterable.md) |$input |  |

---


### add
Adds zero or more values to the set.


**OptionList::add**(mixed $value) : [Set](../../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### addAll
Adds zero or more values to the set.


**OptionList::addAll**([iterable](../../../../iterable.md) $input) : [Set](../../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../../iterable.md) |$input |  |

---


### diff
Creates a new set using values from this set that aren't in another set.
Formally: A \ B = {x ∈ A | x ∉ B}

**OptionList::diff**([Set](../../../../Set.md) $set) : [Set](../../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[Set](../../../../Set.md) |$set |  |

---


### xor
Creates a new set using values in either this set or in another set,
but not in both.
Formally: A ⊖ B = {x : x ∈ (A \ B) ∪ (B \ A)}

**OptionList::xor**([Set](../../../../Set.md) $set) : [Set](../../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[Set](../../../../Set.md) |$set |  |

---


### filter
Returns a new set containing only the values for which a callback
returns true. A boolean test will be used if a callback is not provided.


**OptionList::filter**(callable $callback = null) : [Set](../../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts a value, returns a boolean:
                               true : include the value,
                               false: skip the value. |

---


### first
Returns the first value in the set.


**OptionList::first**() : mixed



---


### get
Returns the value at a specified position in the set.


**OptionList::get**(int $position) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|int |$position |  |

---


### intersect
Creates a new set using values common to both this set and another set.
In other words, returns a copy of this set with all values removed that
aren't in the other set.

Formally: A ∩ B = {x : x ∈ A ∧ x ∈ B}

**OptionList::intersect**([Set](../../../../Set.md) $set) : [Set](../../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[Set](../../../../Set.md) |$set |  |

---


### last
Returns the last value in the set.


**OptionList::last**() : mixed



---


### reduce
Iteratively reduces the set to a single value using a callback.


**OptionList::reduce**(callable $callback, mixed|null $initial = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts the carry and current value, and
                            returns an updated carry value. |
|mixed|null |$initial | Optional initial carry value. |

---


### remove
Removes zero or more values from the set.


**OptionList::remove**(mixed ...$values) : [Set](../../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |...$values |  |

---


### reverse
Reverses the set in-place.


**OptionList::reverse**() : [Set](../../../../Set.md)



---


### reversed
Returns a reversed copy of the set.


**OptionList::reversed**() : [Set](../../../../Set.md)



---


### slice
Returns a subset of a given length starting at a specified offset.


**OptionList::slice**(int $offset, int $length = null) : [Set](../../../../Set.md)


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


**OptionList::sort**(callable $comparator = null) : [Map](../../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared.
                                 Should return the result of a &lt;=> b. |

---


### sorted
Returns a sorted copy of the set, based on an optional callable
comparator. Natural ordering will be used if a comparator is not given.


**OptionList::sorted**(callable $comparator = null) : [Set](../../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared.
                                 Should return the result of a &lt;=> b. |

---


### merge
Returns the result of adding all given values to the set.


**OptionList::merge**([iterable](../../../../iterable.md) $values) : [Set](../../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../../iterable.md) |$values |  |

---


### union
Creates a new set that contains the values of this set as well as the
values of another set.
Formally: A ∪ B = {x: x ∈ A ∨ x ∈ B}

**OptionList::union**([Set](../../../../Set.md) $set) : [Set](../../../../Set.md)


|Parameters: | | |
| --- | --- | --- |
|[Set](../../../../Set.md) |$set |  |

---


### make
Named constructor.


static **OptionList::make**([iterable](../../../../iterable.md) $input = []) : [Collection](../../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../../iterable.md) |$input |  |

---


### addFromString
Añade las opciones contenidas en una cadena de texto
ignorando las que no sean correctas


**OptionList::addFromString**(string $options) : [OptionList](../../../../OptionList.md)


|Parameters: | | |
| --- | --- | --- |
|string |$options |  |

---


### toAttributeFormat
Convierte la lista al formato de atributo


**OptionList::toAttributeFormat**(string $key) : string


|Parameters: | | |
| --- | --- | --- |
|string |$key |  |

---


### blend
Devuelve el resultado de mezclar este objeto con otro


**OptionList::blend**([OptionList](../../../../OptionList.md) $optionList) : [OptionList](../../../../OptionList.md)


|Parameters: | | |
| --- | --- | --- |
|[OptionList](../../../../OptionList.md) |$optionList |  |

---


### concat
Concatena los textos


**OptionList::concat**(string $delimiter = Text::BLANK_TEXT) : [Text](../../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$delimiter |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                