
                                                                                                                                            
    
# Filter


> Regla que permite ignorar Inputs
>
> 








## Methods

### make
Rule named constructor.


static **Filter::make**(callable $callback, string ...$types) : [Rule](../../../../Rule.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### __construct
Rule constructor.


protected **Filter::__construct**(callable $callback, string ...$types) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### execute
Manipula un input


**Filter::execute**([Input](../../../../Input.md) $input) : [Input](../../../../Input.md)


|Parameters: | | |
| --- | --- | --- |
|[Input](../../../../Input.md) |$input |  |

---


### call
Ejecuta el callback


protected **Filter::call**(mixed ...$arguments) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |...$arguments |  |

---


### resolve



protected **Filter::resolve**([Input](../../../../Input.md) $input) : [Input](../../../../Input.md)


|Parameters: | | |
| --- | --- | --- |
|[Input](../../../../Input.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                