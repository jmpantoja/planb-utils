
                                                                                                                                            
    
# Resolver


> Resuelve un valor antes de ser añadido a una colección
>
> 




## Constants
- VERY_HIGHT_PRIORITY
- HIGHT_PRIORITY
- NORMAL_PRIORITY
- LOW_PRIORITY
- VERY_LOW_PRIORITY




## Methods

### make
Resolver named constructor.


static **Resolver::make**() : [Resolver](../../../Resolver.md)



---


### typed
Resolver named constructor.


static **Resolver::typed**(string $type) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### __construct
Resolver constructor.


protected **Resolver::__construct**(string $type = null) : 


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### isEmpty
Indica si aun no se han añadido reglas


**Resolver::isEmpty**() : bool



---


### type
Asigna un tipo a este resolver


**Resolver::type**(string $type) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### getType
Devuelve el tipo de este resolver


**Resolver::getType**() : null|[DataType](../../../DataType.md)



---


### loader
Añade un nuevo loader


**Resolver::loader**(callable $callback, string ...$types) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### loaders
Asigna varios loaders


**Resolver::loaders**(array $loaders) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|array |$loaders |  |

---


### rule
Añade una nueva regla


**Resolver::rule**(callable $callback, string ...$types) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### rules
Asigna varias reglas


**Resolver::rules**(array $rules) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|array |$rules |  |

---


### converter
Añade un nuevo converter


**Resolver::converter**(callable $callback, string ...$types) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### converters
Asigna varios converters


**Resolver::converters**(array $converters) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|array |$converters |  |

---


### validator
Añade un nuevo converter


**Resolver::validator**(callable $callback, string ...$types) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### validators
Asigna varios validators


**Resolver::validators**(array $validators) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|array |$validators |  |

---


### filter
Añade un nuevo filter


**Resolver::filter**(callable $callback, string ...$types) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### filters
Asigna varios filters


**Resolver::filters**(array $filters) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|array |$filters |  |

---


### value
Resuelve un valor


**Resolver::value**(callable $callback, mixed $value, mixed $key = null) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|mixed |$value |  |
|mixed |$key |  |

---


### values
Resuelve un conjunto de valores


**Resolver::values**(callable $callback, [iterable](../../../iterable.md) $values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|[iterable](../../../iterable.md) |$values |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                