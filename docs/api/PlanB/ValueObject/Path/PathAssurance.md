
                                                                                                                                            
    
# PathAssurance


> Garantiza que una ruta cumple una serie de condiciones
>
> 








## Methods

### __construct
PathAssurance constructor.


**PathAssurance::__construct**([Path](../../../Path.md) $path) : 


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


### fromString
Crea una nueva instancia a partir de una (o varias) cadena de texto


static **PathAssurance::fromString**(string ...$segments) : [PathAssurance](../../../PathAssurance.md)


|Parameters: | | |
| --- | --- | --- |
|string |...$segments |  |

---


### getPath
Devuelve la ruta


**PathAssurance::getPath**() : [Path](../../../Path.md)



---


### ensureThatIsADirectory
Verifica que la ruta es un directorio, o lanza una excepción si no lo es


**PathAssurance::ensureThatIsADirectory**() : [PathAssurance](../../../PathAssurance.md)



---


### ensureThatIsAFile
* Verifica que la ruta es un archivo, o lanza una excepción si no lo es


**PathAssurance::ensureThatIsAFile**() : [$this](../../../$this.md)



---


### ensureThatIsALink
* Verifica que la ruta es un enlace simbólico, o lanza una excepción si no lo es


**PathAssurance::ensureThatIsALink**() : [$this](../../../$this.md)



---


### ensureThatHaveExtension
Verifica que una ruta tiene extensión, o si tiene una de entre las pasadas como argumento


**PathAssurance::ensureThatHaveExtension**(string ...$expected) : [PathAssurance](../../../PathAssurance.md)


|Parameters: | | |
| --- | --- | --- |
|string |...$expected | Las extensiones que se consideran válidas |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                