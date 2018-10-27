
                                                                                                                                            
    
# Loop


> Simplificación de un bucle
>
> 








## Methods

### make
Loop named constructor.


static **Loop::make**([iterable](../../../iterable.md) $input) : [Loop](../../../Loop.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### __construct
Loop constructor.


protected **Loop::__construct**([iterable](../../../iterable.md) $input) : 


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


### current



**Loop::current**() : 



---


### next



**Loop::next**() : 



---


### key



**Loop::key**() : 



---


### valid



**Loop::valid**() : 



---


### rewind



**Loop::rewind**() : 



---


### each
Se ejecuta una vez por cada elemento


**Loop::each**(callable $each) : [Loop](../../../Loop.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$each |  |

---


### run
Lanza la ejecución


**Loop::run**() : 



---


### before
Evalua la condición de salida antes de ejecutar el método each


**Loop::before**(callable $before) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$before |  |

---


### after
Evalua la condición de salida despues de ejecutar el método each


**Loop::after**(callable $after) : [$this](../../../$this.md)


|Parameters: | | |
| --- | --- | --- |
|callable |$after |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                