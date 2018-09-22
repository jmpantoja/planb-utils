
                                                                                                                                            
    
# Paragraph


> 
>
> 


## Traits
- PlanB\Type\Text\TraitTextList
- PlanB\DS1\Traits\TraitCollection
- PlanB\DS1\Traits\TraitResolver
- PlanB\DS1\Traits\TraitSequence
- PlanB\DS1\Traits\TraitArray




## Properties
- items


## Methods

### clear
Removes all values from the collection.


**Paragraph::clear**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**Paragraph::isEmpty**() : bool



---


### count
Returns the size of the collection.


**Paragraph::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**Paragraph::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**Paragraph::copy**() : [Collection](../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**Paragraph::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**Paragraph::__debugInfo**() : mixed[]



---


### getIterator
Retrieve an external iterator


**Paragraph::getIterator**() : [Traversable](../../../Traversable.md)



---


### __construct



**Paragraph::__construct**() : 



---


### configure



**Paragraph::configure**([Resolver](../../../Resolver.md) $resolver) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**Paragraph::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal
Crea la estructura de datos interna


abstract protected **Paragraph::makeInternal**() : [Collection](../../../Collection.md)



---


### duplicate
Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver


protected **Paragraph::duplicate**([iterable](../../../iterable.md) $input = []) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### hook
Resuelve los valores antes de ser añadidos desde algun método


protected **Paragraph::hook**(callable $callback, mixed ...$values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|mixed |...$values |  |

---


### each
Updates every value in the sequence by applying a callback, using the
return value as the new value.


**Paragraph::each**(callable $callback) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts the value, returns the new value. |

---


### contains
Determines whether the sequence contains all of zero or more values.


**Paragraph::contains**(mixed ...$values) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |...$values |  |

---


### filter
Returns a new sequence containing only the values for which a callback
returns true. A boolean test will be used if a callback is not provided.


**Paragraph::filter**(callable $callback = null) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts a value, returns a boolean result:
                               true : include the value,
                               false: skip the value. |

---


### find
Returns the index of a given value, or null if it could not be found.


**Paragraph::find**(mixed $value) : int|null


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### findAll
Returns the all the index of a given value, or null if it could not be found.


**Paragraph::findAll**(mixed $value) : mixed[]|null


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### first
Returns the first value in the sequence.


**Paragraph::first**() : mixed



---


### get
Returns the value at a given index (position) in the sequence.


**Paragraph::get**(int $index) : mixed


|Parameters: | | |
| --- | --- | --- |
|int |$index |  |

---


### insert
Inserts zero or more values at a given index.
Each value after the index will be moved one position to the right.
Values may be inserted at an index equal to the size of the sequence.

**Paragraph::insert**(int $index, mixed ...$values) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|int |$index |  |
|mixed |...$values |  |

---


### last
Returns the last value in the sequence.


**Paragraph::last**() : mixed



---


### map
Returns a new sequence using the results of applying a callback to each
value.


**Paragraph::map**(callable $callback) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### merge
Returns the result of adding all given values to the sequence.


**Paragraph::merge**([iterable](../../../iterable.md) $values) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$values |  |

---


### pop
Removes the last value in the sequence, and returns it.


**Paragraph::pop**() : mixed



---


### pushAll
Pushes all values of either an array or traversable object.


**Paragraph::pushAll**([iterable](../../../iterable.md) $values) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$values |  |

---


### push
Adds zero or more values to the end of the sequence.


**Paragraph::push**(mixed ...$values) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |...$values |  |

---


### reduce
Iteratively reduces the sequence to a single value using a callback.


**Paragraph::reduce**(callable $callback, mixed|null $initial = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$callback | Accepts the carry and current value, and
                            returns an updated carry value. |
|mixed|null |$initial | Optional initial carry value. |

---


### remove
Removes and returns the value at a given index in the sequence.


**Paragraph::remove**(int $index) : mixed


|Parameters: | | |
| --- | --- | --- |
|int |$index | this index to remove. |

---


### reverse
Reverses the sequence in-place.


**Paragraph::reverse**() : [Sequence](../../../Sequence.md)



---


### reversed
Returns a reversed copy of the sequence.


**Paragraph::reversed**() : [Sequence](../../../Sequence.md)



---


### rotate
Rotates the sequence by a given number of rotations, which is equivalent
to successive calls to 'shift' and 'push' if the number of rotations is
positive, or 'pop' and 'unshift' if negative.


**Paragraph::rotate**(int $rotations) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|int |$rotations | The number of rotations (can be negative). |

---


### set
Replaces the value at a given index in the sequence with a new value.


**Paragraph::set**(int $index, mixed $value) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|int |$index |  |
|mixed |$value |  |

---


### shift
Removes and returns the first value in the sequence.


**Paragraph::shift**() : mixed



---


### slice
Returns a sub-sequence of a given length starting at a specified index.


**Paragraph::slice**(int $index, int $length = null) : [Sequence](../../../Sequence.md)


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


**Paragraph::sort**(callable $comparator = null) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared.
                                 Should return the result of a &lt;=> b. |

---


### sorted
Returns a sorted copy of the sequence, based on an optional callable
comparator. Natural ordering will be used if a comparator is not given.


**Paragraph::sorted**(callable $comparator = null) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator | Accepts two values to be compared.
                                 Should return the result of a &lt;=> b. |

---


### unshift
Adds zero or more values to the front of the sequence.


**Paragraph::unshift**(mixed ...$values) : [Sequence](../../../Sequence.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |...$values |  |

---


### max
Return the maximum value


**Paragraph::max**(callable $comparator = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator |  |

---


### min
Return the minimun value


**Paragraph::min**(callable $comparator = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|callable |$comparator |  |

---


### offsetExists
Whether a offset exists


**Paragraph::offsetExists**(mixed $offset) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | An offset to check for. |

---


### offsetGet
Offset to retrieve


**Paragraph::offsetGet**(mixed $offset) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to retrieve. |

---


### offsetSet
Offset to set


**Paragraph::offsetSet**(mixed $offset, mixed $value) : void


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


**Paragraph::offsetUnset**(mixed $offset) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to unset. |

---


### concat
Concatena los textos


**Paragraph::concat**(string $delimiter = Text::BLANK_TEXT) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$delimiter |  |

---


### toArrayOfStrings
Convierte la lista en un array de strings


**Paragraph::toArrayOfStrings**() : string[]



---


### make



static **Paragraph::make**([iterable](../../../iterable.md) $input = [], [Resolver](../../../Resolver.md) $resolver = null) : [Vector](../../../Vector.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getLines
Devuelve una lista con todas las lineas que componen el párrafo


**Paragraph::getLines**() : [Sequence](../../../Sequence.md)



---


### render
Devuelve el texto con el estilo aplicado


**Paragraph::render**() : [Text](../../../Text.md)



---


### blink
Añade la opción blink al texto


**Paragraph::blink**() : [Paragraph](../../../Paragraph.md)



---


### bold
Añade la opción bold al texto


**Paragraph::bold**() : [Paragraph](../../../Paragraph.md)



---


### underscore
Añade la opción underscore al texto


**Paragraph::underscore**() : [Paragraph](../../../Paragraph.md)



---


### inverse
Añade la opción reverse al texto


**Paragraph::inverse**() : [Paragraph](../../../Paragraph.md)



---


### fgColor
Añade color al texto


**Paragraph::fgColor**(string|[Color](../../../Color.md) $color) : [Paragraph](../../../Paragraph.md)


|Parameters: | | |
| --- | --- | --- |
|string|[Color](../../../Color.md) |$color |  |

---


### bgColor
Añade color de fondo  al texto


**Paragraph::bgColor**([Color](../../../Color.md)|string $color) : [Paragraph](../../../Paragraph.md)


|Parameters: | | |
| --- | --- | --- |
|[Color](../../../Color.md)|string |$color |  |

---


### padding
Asigna el padding


**Paragraph::padding**(int $left = 0, int $right = null) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|int |$left |  |
|int |$right |  |

---


### margin
Asigna el margin


**Paragraph::margin**(int $left = 0, int $right = null) : [Style](../../../Style.md)


|Parameters: | | |
| --- | --- | --- |
|int |$left |  |
|int |$right |  |

---


### left
Alinea el texto a la izquierda


**Paragraph::left**() : [$this](../../../$this.md)



---


### right
Alinea el texto a la derecha


**Paragraph::right**() : [$this](../../../$this.md)



---


### center
Alinea el texto al centro


**Paragraph::center**() : [$this](../../../$this.md)



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                