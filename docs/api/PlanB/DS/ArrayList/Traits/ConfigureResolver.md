
                                                                                                                                            
    
# ConfigureResolver


> Configuración del ItemResolver
>
> 






## Properties
- itemResolver


## Methods

### getResolverFor
Devuelve el objeto ItemResolver, configurado para una pareja clave/valor
Este resolver se construye bajo demanda, para poder ignorarlo en la serialización
y que se "autoconstruya" desde el nuevo objeto en la unserialización

Si, como parece lógico de primeras, se instanciara en el constructor de la clase, no se puede recuperar desde unserialize
y o bien perderiamos esa información, o bien tenemos que serializar datos + resolver

protected **ConfigureResolver::getResolverFor**([KeyValue](../../../../KeyValue.md) $first) : [ItemResolver](../../../../ItemResolver.md)


|Parameters: | | |
| --- | --- | --- |
|[KeyValue](../../../../KeyValue.md) |$first |  |

---


### configureResolver



protected **ConfigureResolver::configureResolver**([ItemResolver](../../../../ItemResolver.md) $resolver) : 


|Parameters: | | |
| --- | --- | --- |
|[ItemResolver](../../../../ItemResolver.md) |$resolver |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                