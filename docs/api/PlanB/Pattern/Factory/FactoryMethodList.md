
                                                                                                                                            
    
# FactoryMethodList


> Lista de métodos que componen un Factory
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


**FactoryMethodList::clear**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**FactoryMethodList::isEmpty**() : bool



---


### count
Returns the size of the collection.


**FactoryMethodList::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**FactoryMethodList::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**FactoryMethodList::copy**() : [Collection](../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**FactoryMethodList::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**FactoryMethodList::__debugInfo**() : mixed[]



---


### getIterator
Retrieve an external iterator


**FactoryMethodList::getIterator**() : [Traversable](../../../Traversable.md)



---


### bind



protected **FactoryMethodList::bind**([ResolverInterface](../../../ResolverInterface.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[ResolverInterface](../../../ResolverInterface.md) |$resolver |  |

---


### configure
Configura esta colección


**FactoryMethodList::configure**([ResolverInterface](../../../ResolverInterface.md) $resolver) : void


|Parameters: | | |
| --- | --- | --- |
|[ResolverInterface](../../../ResolverInterface.md) |$resolver |  |

---


### getInnerType
Devuelve el tipo de la colección


**FactoryMethodList::getInnerType**() : null|[DataType](../../../DataType.md)



---


### makeInternal
Crea la estructura de datos interna


abstract protected **FactoryMethodList::makeInternal**() : [Collection](../../../Collection.md)



---


### offsetExists
Whether a offset exists


**FactoryMethodList::offsetExists**(mixed $offset) : bool


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | An offset to check for. |

---


### offsetGet
Offset to retrieve


**FactoryMethodList::offsetGet**(mixed $offset) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to retrieve. |

---


### offsetSet
Offset to set


**FactoryMethodList::offsetSet**(mixed $offset, mixed $value) : void


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


**FactoryMethodList::offsetUnset**(mixed $offset) : void


|Parameters: | | |
| --- | --- | --- |
|mixed |$offset | The offset to unset. |

---


### __construct
AbstractQueue constructor.


**FactoryMethodList::__construct**([iterable](../../../iterable.md) $input, [ResolverInterface](../../../ResolverInterface.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |
|[ResolverInterface](../../../ResolverInterface.md) |$resolver |  |

---


### pop
Returns and removes the value at the front of the Queue.


**FactoryMethodList::pop**() : mixed



---


### peek
Returns the value at the front of the queue without removing it.


**FactoryMethodList::peek**() : mixed



---


### push
Pushes one value onto the top of the queue.


**FactoryMethodList::push**(mixed $value) : [Queue](../../../Queue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### pushAll
Pushes zero or more values onto the top of the queue.


**FactoryMethodList::pushAll**([iterable](../../../iterable.md) $input) : [Stack](../../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### make
FactoryMethodList named constructor.


static **FactoryMethodList::make**() : [FactoryMethodList](../../../FactoryMethodList.md)



---


### next
Devuelve el siguiente elemento en la iteracción


**FactoryMethodList::next**(mixed $response) : callable|null


|Parameters: | | |
| --- | --- | --- |
|mixed |$response |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                