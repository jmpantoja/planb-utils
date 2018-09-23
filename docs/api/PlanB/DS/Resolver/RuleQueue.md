
                                                                                                                                            
    
# RuleQueue


> Cola con prioridad que almacena un conjunto de reglas del mismo tipo que tiene que cumplir un input en cada fase
>
> 








## Methods

### __construct
Resolver constructor.


protected **RuleQueue::__construct**() : 



---


### make
Resolver named constructor.


static **RuleQueue::make**() : [RuleQueue](../../../RuleQueue.md)



---


### setInnerType
Informa a la cola de cual es el tipo del resolver padre


**RuleQueue::setInnerType**([DataType](../../../DataType.md) $type) : [RuleQueue](../../../RuleQueue.md)


|Parameters: | | |
| --- | --- | --- |
|[DataType](../../../DataType.md) |$type |  |

---


### push
Añade una nueva regla a la cola


**RuleQueue::push**([Rule](../../../Rule.md) $rule, int $priority) : [RuleQueue](../../../RuleQueue.md)


|Parameters: | | |
| --- | --- | --- |
|[Rule](../../../Rule.md) |$rule |  |
|int |$priority |  |

---


### resolve
Resuelve un valor


**RuleQueue::resolve**([InputInterface](../../../InputInterface.md) $input) : [InputInterface](../../../InputInterface.md)


|Parameters: | | |
| --- | --- | --- |
|[InputInterface](../../../InputInterface.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                