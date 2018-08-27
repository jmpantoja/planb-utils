
                                                                                                                                            
    
# MessageExceptionBuilder


> Factoria para crear mensajes
>
> 








## Methods

### __construct
MessageExceptionBuilder constructor.


protected **MessageExceptionBuilder::__construct**([Throwable](../../Throwable.md) $exception) : 


|Parameters: | | |
| --- | --- | --- |
|[Throwable](../../Throwable.md) |$exception |  |

---


### fromException
MessageExceptionBuilder named constructor.


static **MessageExceptionBuilder::fromException**([Throwable](../../Throwable.md) $exception) : [Message](../../Message.md)


|Parameters: | | |
| --- | --- | --- |
|[Throwable](../../Throwable.md) |$exception |  |

---


### withTrace
Indica que es necesario mostrar la traza de la excepción


**MessageExceptionBuilder::withTrace**() : [MessageExceptionBuilder](../../MessageExceptionBuilder.md)



---


### build
Devuelve el mensaje


**MessageExceptionBuilder::build**() : [Message](../../Message.md)



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                