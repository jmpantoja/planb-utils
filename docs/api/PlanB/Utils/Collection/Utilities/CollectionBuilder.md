
                                                                                                                                            
    
# CollectionBuilder


> <ul>
<li>Nos ayuda a crear colecciones en distintos escenarios</li>
</ul>

>
> 








## Methods

### fromType
Crea una colección, a partir de su tipo
```php
$collectionOfStrings = Creator::fromType("string");
$collectionOfExceptions = Creator::fromType(\Exception::class);

```

static **CollectionBuilder::fromType**(string $type) : [Collection](../../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|string |$type |  |

---


### fromValueType
Crea una colección, del mismo tipo de un valor dado


static **CollectionBuilder::fromValueType**(mixed $value) : [Collection](../../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### fromArray
Crea una colección a partir de un conjunto de valores
Se espera que el array de entrada no esté vacio, y que no contenga valores de varios tipos

static **CollectionBuilder::fromArray**([iterable](../../../../iterable.md) $input) : [Collection](../../../../Collection.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../../iterable.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                