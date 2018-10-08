
                                                                                                                                            
    
# BuilderInterface


> Interfaz para resolver
>
> 








## Methods

### values
Asigna una colección de valores para incializar la colección


**BuilderInterface::values**([iterable](../../iterable.md) $input) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../iterable.md) |$input |  |

---


### rule
Añade una regla


**BuilderInterface::rule**(callable $rule, string ...$types) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$rule |  |
|string |...$types |  |

---


### loader
Añade un loader


**BuilderInterface::loader**(callable $loader, string ...$types) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$loader |  |
|string |...$types |  |

---


### filter
Añade un filtro a la cola


**BuilderInterface::filter**(callable $filter, string ...$types) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$filter |  |
|string |...$types |  |

---


### converter
Añade un converter


**BuilderInterface::converter**(callable $converter, string ...$types) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$converter |  |
|string |...$types |  |

---


### validator
Añade un validator


**BuilderInterface::validator**(callable $validator, string ...$types) : [BuilderInterface](../../BuilderInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|string |...$types |  |

---


### vector
Crea un vector


**BuilderInterface::vector**() : mixed



---


### deque
Crea un deque


**BuilderInterface::deque**() : mixed



---


### stack
Crea un stack


**BuilderInterface::stack**() : mixed



---


### queue
Crea un queue


**BuilderInterface::queue**() : mixed



---


### priorityQueue
Crea un prioriy queue


**BuilderInterface::priorityQueue**() : mixed



---


### map
Crea un map


**BuilderInterface::map**() : mixed



---


### set
Crea un set


**BuilderInterface::set**() : mixed



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                