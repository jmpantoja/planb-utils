
                                                                                                                                            
    
# AbstractBuilder


> Clase Base para Builders
>
> 








## Methods

### make
AbstractBuilder named constructor.


abstract static **AbstractBuilder::make**() : mixed



---


### __construct
AbstractBuilder constructor.


protected **AbstractBuilder::__construct**([Resolver](../../Resolver.md) $resolver = null) : 


|Parameters: | | |
| --- | --- | --- |
|[Resolver](../../Resolver.md) |$resolver |  |

---


### getInput
Devuelve el input


protected **AbstractBuilder::getInput**() : mixed[]|[Traversable](../../Traversable.md)



---


### getResolver
Devuelve el resolver


protected **AbstractBuilder::getResolver**() : [Resolver](../../Resolver.md)



---


### values
Asigna una colección de valores para incializar la colección


**AbstractBuilder::values**([iterable](../../iterable.md) $input) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../iterable.md) |$input |  |

---


### filter
Añade un filtro a la cola


**AbstractBuilder::filter**(callable $filter, string ...$types) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$filter |  |
|string |...$types |  |

---


### converter
Añade un converter


**AbstractBuilder::converter**(callable $converter, string ...$types) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$converter |  |
|string |...$types |  |

---


### validator
Añade un validator


**AbstractBuilder::validator**(callable $validator, string ...$types) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$validator |  |
|string |...$types |  |

---


### rule
Añade una regla


**AbstractBuilder::rule**(callable $rule, string ...$types) : [AbstractBuilder](../../AbstractBuilder.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$rule |  |
|string |...$types |  |

---


### build
Crea el objeto


abstract **AbstractBuilder::build**() : mixed



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                