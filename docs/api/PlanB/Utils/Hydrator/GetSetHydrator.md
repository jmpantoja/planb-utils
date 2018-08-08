
                                                                                                                                            
    
# GetSetHydrator


> Convierte un array en un objeto o viceversa
>
> 








## Methods

### __construct
GetSetHydrator constructor.


**GetSetHydrator::__construct**() : 



---


### create
Crea una nueva instancia


static **GetSetHydrator::create**() : [GetSetHydrator](../../../GetSetHydrator.md)



---


### hydrate
Crea un objeto a partir de un array


**GetSetHydrator::hydrate**(string|object $classNameOrObject, [iterable](../../../iterable.md) $values) : object


|Parameters: | | |
| --- | --- | --- |
|string|object |$classNameOrObject |  |
|[iterable](../../../iterable.md) |$values |  |

---


### extract
Crea un array a partir de un objeto


**GetSetHydrator::extract**([object](../../../object.md) $object, string $snakeCaseSeparator = &#039;_&#039;) : mixed[]


|Parameters: | | |
| --- | --- | --- |
|[object](../../../object.md) |$object |  |
|string |$snakeCaseSeparator |  |

---


### isAllowedAttribute



protected **GetSetHydrator::isAllowedAttribute**($classOrObject, $attribute, $format = null, array $context = array()) : 


|Parameters: | | |
| --- | --- | --- |
| |$classOrObject |  |
| |$attribute |  |
| |$format |  |
|array |$context |  |

---


### denormalize



**GetSetHydrator::denormalize**($data, $class, $format = null, array $context = array()) : 


|Parameters: | | |
| --- | --- | --- |
| |$data |  |
| |$class |  |
| |$format |  |
|array |$context |  |

---


### instantiateObject



protected **GetSetHydrator::instantiateObject**(array $data, $class, array $context, [ReflectionClass](../../../ReflectionClass.md) $reflectionClass, $allowedAttributes, string $format = null) : 


|Parameters: | | |
| --- | --- | --- |
|array |$data |  |
| |$class |  |
|array |$context |  |
|[ReflectionClass](../../../ReflectionClass.md) |$reflectionClass |  |
| |$allowedAttributes |  |
|string |$format |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                