
                                                                                                                                            
    
# AbstractRule


> Clase base para reglas
>
> 








## Methods

### make
Rule named constructor.


static **AbstractRule::make**(callable $callback, string ...$types) : [RuleInterface](../../../../RuleInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### __construct
Rule constructor.


protected **AbstractRule::__construct**(callable $callback, string ...$types) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### execute
Manipula un input


**AbstractRule::execute**([Input](../../../../Input.md) $input) : [Input](../../../../Input.md)


|Parameters: | | |
| --- | --- | --- |
|[Input](../../../../Input.md) |$input |  |

---


### call
Ejecuta el callback


protected **AbstractRule::call**(mixed ...$arguments) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |...$arguments |  |

---


### resolve
Resuelve un input


abstract protected **AbstractRule::resolve**([Input](../../../../Input.md) $input) : [Input](../../../../Input.md)


|Parameters: | | |
| --- | --- | --- |
|[Input](../../../../Input.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                