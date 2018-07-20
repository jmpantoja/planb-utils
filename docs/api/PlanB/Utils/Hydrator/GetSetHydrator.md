
                                                                                                                                            
    
# GetSetHydrator


> Convierte un array en un objeto o viceversa
>
> 








## Methods

### __construct
GetSetHydrator constructor.


**GetSetHydrator::__construct**() : 



---


### configure
Configura el objeto normalizer


**GetSetHydrator::configure**([GetSetMethodNormalizer](../../../GetSetMethodNormalizer.md) $normalizer) : 


|Parameters: | | |
| --- | --- | --- |
|[GetSetMethodNormalizer](../../../GetSetMethodNormalizer.md) |$normalizer |  |

---


### create
Crea una nueva instancia


static **GetSetHydrator::create**() : [GetSetHydrator](../../../GetSetHydrator.md)



---


### hydrate
Crea un objeto a partir de un array


**GetSetHydrator::hydrate**(string $className, [iterable](../../../iterable.md) $values) : object


|Parameters: | | |
| --- | --- | --- |
|string |$className |  |
|[iterable](../../../iterable.md) |$values |  |

---


### extract
Crea un array a partir de un objeto


**GetSetHydrator::extract**([object](../../../object.md) $object, string $snakeCaseSeparator = null) : mixed[]


|Parameters: | | |
| --- | --- | --- |
|[object](../../../object.md) |$object |  |
|string |$snakeCaseSeparator |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                