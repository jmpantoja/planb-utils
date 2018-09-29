
                                                                                                                                            
    
# Validator


> Regla que permite validar Inputs
>
> 








## Methods

### make
Rule named constructor.


static **Validator::make**(callable $callback, string ...$types) : [Rule](../../../../Rule.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### __construct
Rule constructor.


protected **Validator::__construct**(callable $callback, string ...$types) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### execute
Manipula un input


**Validator::execute**([Input](../../../../Input.md) $input) : [Input](../../../../Input.md)


|Parameters: | | |
| --- | --- | --- |
|[Input](../../../../Input.md) |$input |  |

---


### call
Ejecuta el callback


protected **Validator::call**(mixed ...$arguments) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |...$arguments |  |

---


### resolve



protected **Validator::resolve**([Input](../../../../Input.md) $input) : [Input](../../../../Input.md)


|Parameters: | | |
| --- | --- | --- |
|[Input](../../../../Input.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                