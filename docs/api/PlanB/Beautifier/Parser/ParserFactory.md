
                                                                                                                                            
    
# ParserFactory


> Factory para crear objetos parser
>
> 








## Methods

### evaluate
Evalua una condición y devuelve el valor apropiado


static **ParserFactory::evaluate**(mixed ...$arguments) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |...$arguments |  |

---


### __construct
Factory constructor.


protected **ParserFactory::__construct**() : 



---


### configure



protected **ParserFactory::configure**() : void



---


### register
Registra un método


**ParserFactory::register**(string|array $method) : 


|Parameters: | | |
| --- | --- | --- |
|string|array |$method |  |

---


### create
Crea un valor para ser devuelto


protected **ParserFactory::create**(mixed ...$arguments) : mixed


|Parameters: | | |
| --- | --- | --- |
|mixed |...$arguments |  |

---


### factory
Devuelve el parser asociado a un nombre


static **ParserFactory::factory**([Enviroment](../../../Enviroment.md) $environment = null) : [Parser](../../../Parser.md)


|Parameters: | | |
| --- | --- | --- |
|[Enviroment](../../../Enviroment.md) |$environment |  |

---


### makeHtml
Crea un objeto Html Parser


**ParserFactory::makeHtml**([Enviroment](../../../Enviroment.md) $enviroment) : null


|Parameters: | | |
| --- | --- | --- |
|[Enviroment](../../../Enviroment.md) |$enviroment |  |

---


### makeConsole
Crea un objeto Console Parser


**ParserFactory::makeConsole**([Enviroment](../../../Enviroment.md) $enviroment) : null|[Parser](../../../Parser.md)


|Parameters: | | |
| --- | --- | --- |
|[Enviroment](../../../Enviroment.md) |$enviroment |  |

---


### makePlain
Crea un objeto Console Parser


**ParserFactory::makePlain**() : null|[Parser](../../../Parser.md)



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                