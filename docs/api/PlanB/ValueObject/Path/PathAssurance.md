
                                                                                                                                            
    
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


### end
Devuelve la ruta


**PathAssurance::end**() : [Path](../../../Path.md)



---


### stringify



**PathAssurance::stringify**() : string



---


### __toString



**PathAssurance::__toString**() : string



---


### isDirectory
Verifica que la ruta es un directorio, o lanza una excepción si no lo es


**PathAssurance::isDirectory**() : [PathAssurance](../../../PathAssurance.md)



---


### isFile
* Verifica que la ruta es un archivo, o lanza una excepción si no lo es


**PathAssurance::isFile**() : [$this](../../../$this.md)



---


### isLink
* Verifica que la ruta es un enlace simbólico, o lanza una excepción si no lo es


**PathAssurance::isLink**() : [$this](../../../$this.md)



---


### isReadable
* Verifica si la ruta tiene permisos de lectura, o lanza una excepción en caso contrario


**PathAssurance::isReadable**() : [$this](../../../$this.md)



---


### isReadableFile
Verifica si la ruta es un archivo con permisos de lectura, o lanza una excepción en caso contrario


**PathAssurance::isReadableFile**() : [PathAssurance](../../../PathAssurance.md)



---


### isReadableFileWithExtension
Verifica si la ruta es un archivo con permisos de lectura y con una (o varias) determinada extensión,
o lanza una excepción en caso contrario


**PathAssurance::isReadableFileWithExtension**(string ...$expected) : [PathAssurance](../../../PathAssurance.md)


|Parameters: | | |
| --- | --- | --- |
|string |...$expected |  |

---


### isWritable
* Verifica si la ruta tiene permisos de escritura, o lanza una excepción en caso contrario


**PathAssurance::isWritable**() : [$this](../../../$this.md)



---


### hasExtension
Verifica que una ruta tiene extensión, o si tiene una de entre las pasadas como argumento


**PathAssurance::hasExtension**(string ...$expected) : [PathAssurance](../../../PathAssurance.md)


|Parameters: | | |
| --- | --- | --- |
|string |...$expected | Las extensiones que se consideran válidas |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                