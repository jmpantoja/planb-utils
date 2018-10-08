
                                                                                                                                            
    
# Rule


> Manipula un valor antes de ser añadido a la colección
>
> 








## Methods

### make
Rule named constructor.


static **Rule::make**(callable $callback, string ...$types) : [Rule](../../../../Rule.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### __construct
Rule constructor.


protected **Rule::__construct**(callable $callback, string ...$types) : 


|Parameters: | | |
| --- | --- | --- |
|callable |$callback |  |
|string |...$types |  |

---


### execute
Manipula un input


**Rule::execute**([Input](../../../../Input.md) $input) : [Input](../../../../Input.md)


|Parameters: | | |
| --- | --- | --- |
|[Input](../../../../Input.md) |$input |  |

---


### call
Ejecuta el callback


protected **Rule::call**(mixed ...$arguments) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |...$arguments |  |

---


### resolve
Resuelve un input


protected **Rule::resolve**([Input](../../../../Input.md) $input) : [Input](../../../../Input.md)


|Parameters: | | |
| --- | --- | --- |
|[Input](../../../../Input.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                