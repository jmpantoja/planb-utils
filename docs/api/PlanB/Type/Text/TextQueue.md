
                                                                                                                                            
    
# TextQueue


> Queue de objetos Text
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


**TextQueue::clear**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**TextQueue::isEmpty**() : bool



---


### count
Returns the size of the collection.


**TextQueue::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**TextQueue::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**TextQueue::copy**() : [Collection](../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**TextQueue::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**TextQueue::__debugInfo**() : mixed[]



---


### getIterator
Retrieve an external iterator


**TextQueue::getIterator**() : [Traversable](../../../Traversable.md)



---


### __construct



protected **TextQueue::__construct**([Resolver](../../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### configure
Configura esta colección


**TextQueue::configure**([Resolver](../../../Resolver.md) $resolver) : [Collection](../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**TextQueue::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal
Crea la estructura de datos interna


abstract protected **TextQueue::makeInternal**() : [Collection](../../../Collection.md)



---


### make
Named Constructor


static **TextQueue::make**([iterable](../../../iterable.md) $input = [], [Resolver](../../../Resolver.md) $resolver = null) : mixed


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |
|[Resolver](../../../Resolver.md) |$resolver |  |

---


### hook



abstract protected **TextQueue::hook**(callable $callback, ...$values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
| |...$values |  |

---


### offsetExists
Whether a offset exists


**TextQueue::offsetExists**(mixed $offset) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | An offset to check for. |

---


### offsetGet
Offset to retrieve


**TextQueue::offsetGet**(mixed $offset) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to retrieve. |

---


### offsetSet
Offset to set


**TextQueue::offsetSet**(mixed $offset, mixed $value) : void


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


**TextQueue::offsetUnset**(mixed $offset) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to unset. |

---


### pop
Returns and removes the value at the front of the Queue.


**TextQueue::pop**() : mixed



---


### peek
Returns the value at the front of the queue without removing it.


**TextQueue::peek**() : mixed



---


### push
Pushes one value onto the top of the queue.


**TextQueue::push**(mixed $input) : [Queue](../../../Queue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$input |  |

---


### pushAll
Pushes zero or more values onto the top of the queue.


**TextQueue::pushAll**([iterable](../../../iterable.md) $input) : [Stack](../../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### concat
Concatena los textos


**TextQueue::concat**(string $delimiter = Text::BLANK_TEXT) : [Text](../../../Text.md)


|Parameters: | | |
| --- | --- | --- |
|string |$delimiter |  |

---


### toArrayOfStrings
Convierte la lista en un array de strings


**TextQueue::toArrayOfStrings**() : string[]



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                