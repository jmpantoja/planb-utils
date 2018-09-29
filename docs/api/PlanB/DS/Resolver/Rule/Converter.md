
                                                                                                                                            
    
# Converter


> Regla que permite transformar Inputs
>
> 








## Methods

### make
Rule named constructor.


static **Converter::make**(callable $callback, string ...$types) : [RuleInterface](../../../../RuleInterface.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### __construct
Rule constructor.


protected **Converter::__construct**(callable $callback, string ...$types) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### execute
Manipula un input


**Converter::execute**([Input](../../../../Input.md) $input) : [Input](../../../../Input.md)


|Parameters: | | |
| --- | --- | --- |
|[Input](../../../../Input.md) |$input |  |

---


### call
Ejecuta el callback


protected **Converter::call**(mixed ...$arguments) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |...$arguments |  |

---


### resolve



protected **Converter::resolve**([Input](../../../../Input.md) $input) : [Input](../../../../Input.md)


|Parameters: | | |
| --- | --- | --- |
|[Input](../../../../Input.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                