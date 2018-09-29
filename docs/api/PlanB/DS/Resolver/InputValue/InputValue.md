
                                                                                                                                            
    
# InputValue


> Encapsula un valor que se evalua antes de ser añadido a una colección
>
> 




## Constants
- VALID
- IGNORED
- ERROR




## Methods

### make
InputValue named constructor.


static **InputValue::make**(mixed $value) : [InputValue](../../../../InputValue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### __construct
InputValue constructor.


protected **InputValue::__construct**(mixed $value) : 


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |

---


### setValue



**InputValue::setValue**($value) : 


|Parameters: | | |
| --- | --- | --- |
| |$value |  |

---


### value



**InputValue::value**() : mixed



---


### triggerErrorIf



**InputValue::triggerErrorIf**(bool $condition, string $format = null, ...$arguments) : 


|Parameters: | | |
| --- | --- | --- |
|bool |$condition |  |
|string |$format |  |
| |...$arguments |  |

---


### triggerCustomErrorIf



**InputValue::triggerCustomErrorIf**(bool $condition, [Throwable](../../../../Throwable.md) $error) : 


|Parameters: | | |
| --- | --- | --- |
|bool |$condition |  |
|[Throwable](../../../../Throwable.md) |$error |  |

---


### ignoreValueIf



**InputValue::ignoreValueIf**(bool $condition) : 


|Parameters: | | |
| --- | --- | --- |
|bool |$condition |  |

---


### isValid



**InputValue::isValid**() : 



---


### isIgnored



**InputValue::isIgnored**() : 



---


### isError



**InputValue::isError**() : 



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                