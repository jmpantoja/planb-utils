
                                                                                                                                            
    
# Path


> Clase de Utilidades para la manipulacion de rutas
>
> 


## Traits
- PlanB\Utils\Traits\Stringify






## Methods

### stringify



**Path::stringify**() : string



---


### __toString
Devuelve la cadena de texto


**Path::__toString**() : string



---


### __construct
Path private constructor.


protected **Path::__construct**(string $path) : 


|Parameters: | | |
| --- | --- | --- |
|string |$path |  |

---


### make
Crea una nueva ruta


static **Path::make**(string ...$parts) : [Path](../../../Path.md)


|Parameters: | | |
| --- | --- | --- |
|string |...$parts |  |

---


### normalize
Devuelve una ruta normalizada a partir de varios segmentos


static **Path::normalize**(string ...$parts) : string


|Parameters: | | |
| --- | --- | --- |
|string |...$parts |  |

---


### append
Modifica la ruta, añadiendo uno o varios segmentos al final


**Path::append**(string ...$parts) : [Path](../../../Path.md)


|Parameters: | | |
| --- | --- | --- |
|string |...$parts |  |

---


### prepend
Modifica la ruta, añadiendo uno o varios segmentos al principio


**Path::prepend**(string ...$parts) : [Path](../../../Path.md)


|Parameters: | | |
| --- | --- | --- |
|string |...$parts |  |

---


### isAbsolute
Indica si es una ruta absoluta


**Path::isAbsolute**() : bool



---


### isRelative
Indica si es una ruta relativa


**Path::isRelative**() : bool



---


### exists
Indica si la ruta existe


**Path::exists**() : bool



---


### isFile
Indica si la ruta es de un fichero


**Path::isFile**() : bool



---


### isDirectory
Indica si la ruta es de un directorio


**Path::isDirectory**() : bool



---


### isLink
Indica si la ruta es de un enlace simbolico


**Path::isLink**() : bool



---


### isReadable
Indica si tenemos permisos de lectura sobre la ruta


**Path::isReadable**() : bool



---


### isReadableFile
Indica si tenemos un fichero con permisos de lectura


**Path::isReadableFile**() : bool



---


### isReadableFileWithExtension
Indica si tenemos un fichero con una determinada extensión con permisos de lectura


**Path::isReadableFileWithExtension**(string ...$expected) : bool


|Parameters: | | |
| --- | --- | --- |
|string |...$expected |  |

---


### isWritable
Indica si tenemos permisos de escritura sobre la ruta


**Path::isWritable**() : bool



---


### getParent
Devuelve el directorio padre del nivel indicado
0: devuelve la ruta actual
1: devuelve el directorio padre
2: devuelve el directorio "abuelo"
etc.

**Path::getParent**(int $level = 1) : [Path](../../../Path.md)


|Parameters: | | |
| --- | --- | --- |
|int |$level |  |

---


### getBasename
Devuelve basename


**Path::getBasename**() : string



---


### getDirname
Devuelve dirname


**Path::getDirname**() : string



---


### getFilename
Devuelve filename


**Path::getFilename**() : string



---


### getExtension
Devuelve extension


**Path::getExtension**() : string



---


### hasExtension
Indica si la ruta tiene extensión, o si tiene una de entre las pasadas como argumento
´´´
/path/to/file | hasExtension() => false
/path/to/file.txt | hasExtension() => true
/path/to/file.txt | hasExtension('php') => false
/path/to/file.txt | hasExtension('php', 'txt') => true
´´´

**Path::hasExtension**(string ...$expected) : bool


|Parameters: | | |
| --- | --- | --- |
|string |...$expected | Las extensiones que se consideran válidas |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                