
                                                                                                                                            
    
# Factory


> Clase Base para crear factorias
>
> 








## Methods

### evaluate
Evalua una condición y devuelve el valor apropiado


static **Factory::evaluate**(mixed ...$arguments) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |...$arguments |  |

---


### __construct
Factory constructor.


protected **Factory::__construct**() : 



---


### configure
Registra métodos en este factory


abstract protected **Factory::configure**() : void



---


### register
Registra un método


**Factory::register**(string|mixed[] $method) : 


|Parameters: | | |
| --- | --- | --- |
|string|mixed[] |$method |  |

---


### create
Crea un valor para ser devuelto


protected **Factory::create**(mixed ...$arguments) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |...$arguments |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                