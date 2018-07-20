
                                                                                                                                            
    
# Hook


> Operación, personalizada
>
> 








## Methods

### __construct
Operation constructor.


**Hook::__construct**(callable $callable) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |

---


### blank
Crea una operación personalizada que no hace nada


static **Hook::blank**() : [Hook](../../../Hook.md)



---


### fromCallable
Crea una operación personalizada, a partir de un callable


static **Hook::fromCallable**(callable $callable) : [Hook](../../../Hook.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callable |  |

---


### fromArray
Crea una operación personalizada, a partir de un array


static **Hook::fromArray**(array $callable) : [Hook](../../../Hook.md)


|Parameters: | | |
| --- | --- | --- |
|array |$callable |  |

---


### execute
Ejecuta la operación


**Hook::execute**([KeyValue](../../../KeyValue.md) $pair, mixed|null $default = null) : mixed|null


|Parameters: | | |
| --- | --- | --- |
|[KeyValue](../../../KeyValue.md) |$pair |  |
|mixed|null |$default |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                