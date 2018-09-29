
                                                                                                                                            
    
# SimpleResolver


> Procesa un valor antes de ser añadido a una colección
>
> 




## Constants
- NORMAL_PRIORITY




## Methods

### make



static **SimpleResolver::make**() : 



---


### typed
Resolver named constructor.


static **SimpleResolver::typed**(string $type) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### __construct
Resolver constructor.


protected **SimpleResolver::__construct**() : 



---


### setType
Asigna un tipo


**SimpleResolver::setType**(string $type) : [Resolver](../../../Resolver.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### getType
Devuelve el tipo del resolver


**SimpleResolver::getType**() : null|[DataType](../../../DataType.md)



---


### apply
Añade una regla


**SimpleResolver::apply**(callable $callback) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |

---


### count
Devuelve el número de reglas


**SimpleResolver::count**() : int



---


### single
Resuelve un valor simple


**SimpleResolver::single**(mixed $value) : [InputValueInterface](../../../InputValueInterface.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### resolve
Resuelve un input


protected **SimpleResolver::resolve**($value) : [InputValueInterface](../../../InputValueInterface.md)


|Parameters: | | |
| --- | --- | --- |
| |$value |  |

---


### getRules
Obtiene una copia de la lista de reglas


protected **SimpleResolver::getRules**() : [PriorityQueue](../../../PriorityQueue.md)



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                