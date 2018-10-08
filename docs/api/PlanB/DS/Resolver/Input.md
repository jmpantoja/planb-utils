
                                                                                                                                            
    
# Input


> Representa a un valor que se está evaluando antes de ser añadido
>
> 








## Methods

### make
Input named constructor.


static **Input::make**(mixed $value) : [Input](../../../Input.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### __construct
Input constructor.


protected **Input::__construct**(mixed $value) : 


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### value
Devuelve el valor en su estado actual


**Input::value**() : mixed



---


### isValid
Indica si el input sigue siendo válido


**Input::isValid**() : bool



---


### isEvaluableForTypes
Indica si este input se debe evaluar para alguno de los tipos dados


**Input::isEvaluableForTypes**(string ...$types) : bool


|Parameters: | | |
| --- | --- | --- |
|string |...$types |  |

---


### next
Aplica un nuevo valor al input, para que sea recogido por la siguiente regla


**Input::next**(mixed $value) : [Input](../../../Input.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### ignore
Ignora este input


**Input::ignore**() : [Input](../../../Input.md)



---


### reject
Rechaza este input


**Input::reject**(string $format = &#039;&#039;, mixed ...$arguments) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|string |$format |  |
|mixed |...$arguments |  |

---


### throws
Rechaza este input


**Input::throws**([Throwable](../../../Throwable.md) $exception) : [Input](../../../Input.md)


|Parameters: | | |
| --- | --- | --- |
|[Throwable](../../../Throwable.md) |$exception |  |

---


### resolve
Resuelve este input, aplicando la respuesta de un callback


**Input::resolve**(mixed $response = null) : [Input](../../../Input.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$response |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                