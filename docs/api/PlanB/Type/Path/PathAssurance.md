
                                                                                                                                            
    
# PathAssurance


> Garantiza que una ruta cumple una serie de condiciones
>
> 


## Traits
- PlanB\Utils\Traits\Stringify






## Methods

### getEvaluatedObject
Devuelve el objeto sujeto a evaluación


protected **PathAssurance::getEvaluatedObject**() : mixed



---


### end
Devuelve el objeto sujeto a evaluación
getWrappedObject alias

**PathAssurance::end**() : object



---


### __call
Captura las llamadas a métodos


**PathAssurance::__call**(string $name, array $arguments = []) : [Assurance](../../../Assurance.md)


|Parameters: | | |
| --- | --- | --- |
|string |$name |  |
|array |$arguments |  |

---


### stringify



**PathAssurance::stringify**() : string



---


### __toString
Devuelve la cadena de texto


**PathAssurance::__toString**() : string



---


### __construct
PathAssurance constructor.


protected **PathAssurance::__construct**([Path](../../../Path.md) $path) : 


|Parameters: | | |
| --- | --- | --- |
|[Path](../../../Path.md) |$path |  |

---


### fromPath
Crea una nueva instancia a partir de un Path


static **PathAssurance::fromPath**([Path](../../../Path.md) $path) : [PathAssurance](../../../PathAssurance.md)


|Parameters: | | |
| --- | --- | --- |
|[Path](../../../Path.md) |$path |  |

---


### create
Crea una nueva instancia a partir de una (o varias) cadena de texto


static **PathAssurance::create**(string ...$segments) : [PathAssurance](../../../PathAssurance.md)


|Parameters: | | |
| --- | --- | --- |
|string |...$segments |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                