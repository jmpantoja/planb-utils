
                                                                                                                                            
    
# TextStack


> Stack de objetos Text
>
> 


## Traits
- PlanB\Type\Text\TraitTextList
- PlanB\DS\Traits\TraitCollection
- PlanB\DS\Traits\TraitResolver
- PlanB\DS\Traits\TraitArray




## Properties
- items


## Methods

### clear
Removes all values from the collection.


**TextStack::clear**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**TextStack::isEmpty**() : bool



---


### count
Returns the size of the collection.


**TextStack::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**TextStack::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**TextStack::copy**() : [Collection](../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**TextStack::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**TextStack::__debugInfo**() : mixed[]



---


### getIterator
Retrieve an external iterator


**TextStack::getIterator**() : [Traversable](../../../Traversable.md)



---


### __construct



protected **TextStack::__construct**([Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### configure
Configura esta colección


**TextStack::configure**([Resolver](../../../Resolver.md) $resolver) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**TextStack::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal
Crea la estructura de datos interna


abstract protected **TextStack::makeInternal**() : [Collection](../../../Collection.md)



---


### duplicate
Crea un objeto del mismo tipo que el actual, y le aplica el mismo resolver


protected **TextStack::duplicate**([iterable](../../../iterable.md) $input = []) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### hook
Resuelve los valores antes de ser añadidos desde algun método


protected **TextStack::hook**(callable $callback, mixed ...$values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|mixed |...$values |  |

---


### offsetExists
Whether a offset exists


**TextStack::offsetExists**(mixed $offset) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | An offset to check for. |

---


### offsetGet
Offset to retrieve


**TextStack::offsetGet**(mixed $offset) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to retrieve. |

---


### offsetSet
Offset to set


**TextStack::offsetSet**(mixed $offset, mixed $value) : void


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


**TextStack::offsetUnset**(mixed $offset) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to unset. |

---


### peek
Returns the value at the top of the stack without removing it.


**TextStack::peek**() : mixed



---


### pop
Returns and removes the value at the top of the stack.


**TextStack::pop**() : mixed



---


### push
Pushes one value onto the top of the stack.


**TextStack::push**(mixed $input) : [Stack](../../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$input |  |

---


### pushAll
Pushes zero or more values onto the top of the stack.


**TextStack::pushAll**([iterable](../../../iterable.md) $input) : [Stack](../../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### concat
Concatena los textos


**TextStack::concat**(string $delimiter = Text::BLANK_TEXT) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$delimiter |  |

---


### toArrayOfStrings
Convierte la lista en un array de strings


**TextStack::toArrayOfStrings**() : string[]



---


### make



static **TextStack::make**([iterable](../../../iterable.md) $input = [], [Resolver](../../../Resolver.md) $resolver = null) : [Stack](../../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                