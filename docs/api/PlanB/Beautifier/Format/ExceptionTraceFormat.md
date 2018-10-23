
                                                                                                                                            
    
# ExceptionTraceFormat


> Formato para la traza de una Exception
>
> 








## Methods

### make
ExceptionTraceFormat constructor.


static **ExceptionTraceFormat::make**([Throwable](../../../Throwable.md) $exception) : [ExceptionTraceFormat](../../../ExceptionTraceFormat.md)


|Parameters: | | |
| --- | --- | --- |
|[Throwable](../../../Throwable.md) |$exception |  |

---


### __construct
ExceptionTraceFormat constructor.


protected **ExceptionTraceFormat::__construct**([Throwable](../../../Throwable.md) $exception) : 


|Parameters: | | |
| --- | --- | --- |
|[Throwable](../../../Throwable.md) |$exception |  |

---


### initTrace
Inicializa los elementos deducidos de una linea de traza


protected **ExceptionTraceFormat::initTrace**(int $index, string $trace) : 


|Parameters: | | |
| --- | --- | --- |
|int |$index |  |
|string |$trace |  |

---


### getTemplate
Devuelve el template


**ExceptionTraceFormat::getTemplate**() : string



---


### getReplacements
Devuelve los replacements


**ExceptionTraceFormat::getReplacements**() : mixed[]



---


### getValue
Devuelve el valor que se está formateando


**ExceptionTraceFormat::getValue**() : string



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                