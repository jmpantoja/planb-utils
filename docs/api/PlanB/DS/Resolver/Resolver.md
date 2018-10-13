
                                                                                                                                            
    
# Resolver


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


protected **Resolver::__construct**() : 



---


### configure



**Resolver::configure**() : void



---


### isEmpty
Indica si aun no se han añadido reglas


**Resolver::isEmpty**() : bool



---


### type
Asigna un tipo a este resolver


**Resolver::type**(string $type) : [ResolverInterface](../../../ResolverInterface.md)


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


**Resolver::loader**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### rule
Añade una nueva regla


**Resolver::rule**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### converter
Añade un nuevo converter


**Resolver::converter**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### validator
Añade un nuevo converter


**Resolver::validator**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### filter
Añade un nuevo filter


**Resolver::filter**(callable $callback, string ...$types) : [ResolverInterface](../../../ResolverInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

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


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                