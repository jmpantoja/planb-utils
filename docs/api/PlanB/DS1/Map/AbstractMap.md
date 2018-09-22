
                                                                                                                                            
    
# AbstractMap


> A Map is a sequential collection of key-value pairs, almost identical to an
array used in a similar context. Keys can be any type, but must be unique.
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


**AbstractMap::clear**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**AbstractMap::isEmpty**() : bool



---


### count
Returns the size of the collection.


**AbstractMap::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**AbstractMap::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**AbstractMap::copy**() : [Collection](../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**AbstractMap::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**AbstractMap::__debugInfo**() : mixed[]



---


### getIterator
Retrieve an external iterator


**AbstractMap::getIterator**() : [Traversable](../../../Traversable.md)



---


### __construct



protected **AbstractMap::__construct**([Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### configure
Configura esta colección


**AbstractMap::configure**([Resolver](../../../Resolver.md) $resolver) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**AbstractMap::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal



protected **AbstractMap::makeInternal**() : 



---


### duplicate
Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver


protected **AbstractMap::duplicate**([iterable](../../../iterable.md) $input = []) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### hook
Resuelve los valores antes de ser añadidos desde algun método


protected **AbstractMap::hook**(callable $callback, mixed ...$values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|mixed |...$values |  |

---


### offsetExists
Whether a offset exists


**AbstractMap::offsetExists**(mixed $offset) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | An offset to check for. |

---


### offsetGet
Offset to retrieve


**AbstractMap::offsetGet**(mixed $offset) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to retrieve. |

---


### offsetSet
Offset to set


**AbstractMap::offsetSet**(mixed $offset, mixed $value) : void


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


**AbstractMap::offsetUnset**(mixed $offset) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to unset. |

---


### each
Updates all values by applying a callback function to each value.


**AbstractMap::each**(callable $callback) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts two arguments: key and value, should
                          return what the updated value will be. |

---


### first
Return the first Pair from the Map


**AbstractMap::first**() : [Pair](../../../Pair.md)



---


### last
Return the last Pair from the Map


**AbstractMap::last**() : [Pair](../../../Pair.md)



---


### skip
Return the pair at a specified position in the Map


**AbstractMap::skip**(int $position) : [Pair](../../../Pair.md)


|Parameters: | | |
| --- | --- | --- |
|int |$position |  |

---


### merge
Returns the result of associating all keys of a given traversable object
or array with their corresponding values, as well as those of this map.


**AbstractMap::merge**(mixed[]|[Traversable](../../../Traversable.md) $values) : [Map](../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|mixed[]|[Traversable](../../../Traversable.md) |$values |  |

---


### intersect
Creates a new map containing the pairs of the current instance whose keys
are also present in the given map. In other words, returns a copy of the
current map with all keys removed that are not also in the other map.


**AbstractMap::intersect**([Map](../../../Map.md) $map) : [Map](../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|[Map](../../../Map.md) |$map | The other map. |

---


### diff
Returns the result of removing all keys from the current instance that
are present in a given map.


**AbstractMap::diff**([Map](../../../Map.md) $map) : [Map](../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|[Map](../../../Map.md) |$map | The map containing the keys to exclude. |

---


### hasKey
Returns whether an association a given key exists.


**AbstractMap::hasKey**(mixed $key) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |

---


### hasValue
Returns whether an association for a given value exists.


**AbstractMap::hasValue**(mixed $value) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### filter
Returns a new map containing only the values for which a predicate
returns true. A boolean test will be used if a predicate is not provided.


**AbstractMap::filter**(callable $callback = null) : [Map](../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts a key and a value, and returns:
                               true : include the value,
                               false: skip the value. |

---


### get
Returns the value associated with a key, or an optional default if the
key is not associated with a value.


**AbstractMap::get**(mixed $key, mixed $default = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$default |  |

---


### keys
Returns a set of all the keys in the map.


**AbstractMap::keys**() : [Set](../../../Set.md)



---


### map
Returns a new map using the results of applying a callback to each value.
The keys will be equal in both maps.

**AbstractMap::map**(callable $callback) : [Map](../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts two arguments: key and value, should
                          return what the updated value will be. |

---


### pairs
Returns a sequence of pairs representing all associations.


**AbstractMap::pairs**() : [Sequence](../../../Sequence.md)



---


### put
Associates a key with a value, replacing a previous association if there
was one.


**AbstractMap::put**(mixed $key, mixed $value) : [Map](../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$value |  |

---


### putAll
Creates associations for all keys and corresponding values of either an
array or iterable object.


**AbstractMap::putAll**([iterable](../../../iterable.md) $values) : [Map](../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$values |  |

---


### reduce
Iteratively reduces the map to a single value using a callback.


**AbstractMap::reduce**(callable $callback, mixed|null $initial = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts the carry, key, and value, and
                            returns an updated carry value. |
|mixed|null |$initial | Optional initial carry value. |

---


### remove
Removes a key's association from the map and returns the associated value
or a provided default if provided.


**AbstractMap::remove**(mixed $key, mixed $default = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$key |  |
|mixed |$default |  |

---


### reverse
Returns a reversed copy of the map.


**AbstractMap::reverse**() : [Map](../../../Map.md)



---


### reversed
Returns a reversed copy of the map.


**AbstractMap::reversed**() : [Map](../../../Map.md)



---


### slice
Returns a sub-sequence of a given length starting at a specified offset.


**AbstractMap::slice**(int $offset, int $length = null) : [Map](../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|int |$offset | If the offset is non-negative, the map will
                        start at that offset in the map. If offset
                        is negative, the map will start that far
                        from the end. |
|int |$length | If a length is given and is positive, the
                        resulting set will have up to that many pairs in
                        it. If the requested length results in an
                        overflow, only pairs up to the end of the map
                        will be included.</p>

<pre><code>                    If a length is given and is negative, the map
                    will stop that many pairs from the end.

                    If a length is not provided, the resulting map
                    will contains all pairs between the offset and
                    the end of the map.
</code></pre>
 |

---


### sort
Sorts the map in-place, based on an optional callable comparator.
The map will be sorted by value.

**AbstractMap::sort**(callable $comparator = null) : [Map](../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared. |

---


### sorted
Returns a sorted copy of the map, based on an optional callable
comparator. The map will be sorted by value.


**AbstractMap::sorted**(callable $comparator = null) : [Map](../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared. |

---


### ksort
Sorts the map in-place, based on an optional callable comparator.
The map will be sorted by key.

**AbstractMap::ksort**(callable $comparator = null) : [Map](../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two keys to be compared. |

---


### ksorted
Returns a sorted copy of the map, based on an optional callable
comparator. The map will be sorted by key.


**AbstractMap::ksorted**(callable $comparator = null) : [Map](../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two keys to be compared. |

---


### values
Returns a sequence of all the associated values in the Map.


**AbstractMap::values**() : [Sequence](../../../Sequence.md)



---


### union
Creates a new map that contains the pairs of the current instance as well
as the pairs of another map.


**AbstractMap::union**([Map](../../../Map.md) $map) : [Map](../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|[Map](../../../Map.md) |$map | The other map, to combine with the current instance. |

---


### xor
Creates a new map using keys of either the current instance or of another
map, but not of both.


**AbstractMap::xor**([Map](../../../Map.md) $map) : [Map](../../../Map.md)


|Parameters: | | |
| --- | --- | --- |
|[Map](../../../Map.md) |$map |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                