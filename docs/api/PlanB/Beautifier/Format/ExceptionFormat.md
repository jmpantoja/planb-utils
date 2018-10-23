
                                                                                                                                            
    
# ExceptionFormat


> Formato para un objeto de tipo Exception
>
> 








## Methods

### make
ExceptionFormat named constructor.


static **ExceptionFormat::make**([Throwable](../../../Throwable.md) $exception) : [ExceptionFormat](../../../ExceptionFormat.md)


|Parameters: | | |
| --- | --- | --- |
|[Throwable](../../../Throwable.md) |$exception |  |

---


### __construct
DataFormat constructor.


protected **ExceptionFormat::__construct**([Throwable](../../../Throwable.md) $exception) : 


|Parameters: | | |
| --- | --- | --- |
|[Throwable](../../../Throwable.md) |$exception |  |

---


### setVerbose
Indica si se debe mostrar las trazas, o no


**ExceptionFormat::setVerbose**(bool $verbose) : [ExceptionFormat](../../../ExceptionFormat.md)


|Parameters: | | |
| --- | --- | --- |
|bool |$verbose |  |

---


### isVerbose
Indica si se ha activado el modo verbose


**ExceptionFormat::isVerbose**() : bool



---


### getTemplate
Devuelve el template


**ExceptionFormat::getTemplate**() : string



---


### getReplacements
Devuelve los replacements


**ExceptionFormat::getReplacements**() : mixed[]



---


### getValue
Devuelve el nombre de clase de la excepción


**ExceptionFormat::getValue**() : string



---


### getClassName
Devuelve la clase de la excepción


**ExceptionFormat::getClassName**() : string



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                