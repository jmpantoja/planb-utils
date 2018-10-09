
                                                                                                                                            
    
# ResolverInterface


> Interfaz para Resolver
>
> 








## Methods

### isEmpty
Indica si aun no se han añadido reglas


**ResolverInterface::isEmpty**() : bool



---


### type
Asigna un tipo a este resolver


**ResolverInterface::type**(string $type) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### getType
Devuelve el tipo de este resolver


**ResolverInterface::getType**() : null|[DataType](../../../DataType.md)



---


### loader
Añade un nuevo loader


**ResolverInterface::loader**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### rule
Añade una nueva regla


**ResolverInterface::rule**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### converter
Añade un nuevo converter


**ResolverInterface::converter**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### validator
Añade un nuevo converter


**ResolverInterface::validator**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### filter
Añade un nuevo filter


**ResolverInterface::filter**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### value
Resuelve un valor


**ResolverInterface::value**(callable $callback, mixed $value, mixed $key = null) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|mixed |$value |  |
|mixed |$key |  |

---


### values
Resuelve un conjunto de valores


**ResolverInterface::values**(callable $callback, [iterable](../../../iterable.md) $values) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|[iterable](../../../iterable.md) |$values |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                