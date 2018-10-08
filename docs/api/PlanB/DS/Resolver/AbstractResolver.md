
                                                                                                                                            
    
# AbstractResolver


> Resuelve un valor antes de ser añadido a una colección
>
> 




## Constants
- HIGHT_PRIORITY
- NORMAL_PRIORITY
- LOW_PRIORITY




## Methods

### __construct
Resolver constructor.


protected **AbstractResolver::__construct**() : 



---


### isEmpty
Indica si aun no se han añadido reglas


**AbstractResolver::isEmpty**() : bool



---


### type
Asigna un tipo a este resolver


**AbstractResolver::type**(string $type) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### getType
Devuelve el tipo de este resolver


**AbstractResolver::getType**() : null|[DataType](../../../DataType.md)



---


### loader
Añade un nuevo loader


**AbstractResolver::loader**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### rule
Añade una nueva regla


**AbstractResolver::rule**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### converter
Añade un nuevo converter


**AbstractResolver::converter**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### validator
Añade un nuevo converter


**AbstractResolver::validator**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### filter
Añade un nuevo filter


**AbstractResolver::filter**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### value
Resuelve un valor


**AbstractResolver::value**(callable $callback, mixed $value, mixed $key = null) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|mixed |$value |  |
|mixed |$key |  |

---


### values
Resuelve un conjunto de valores


**AbstractResolver::values**(callable $callback, [iterable](../../../iterable.md) $values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|[iterable](../../../iterable.md) |$values |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                