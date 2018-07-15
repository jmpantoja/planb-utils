
                                                                                                                                            
    
# Dictionary


> Representa un conjunto de parejas clave/valor, que no tienen por qué ser del mismo tipo,
y donde cada una de ellas tiene que cumplir sus propios criterios para ser considerado válido
>
> 




## Constants
- DEFAULT_PROFILE




## Methods

### create
Crea una instancia para un perfil determinado


static **Dictionary::create**(string $profile = self::DEFAULT_PROFILE) : [Dictionary](../../../Dictionary.md)


|Parameters: | | |
| --- | --- | --- |
|string |$profile |  |

---


### __construct
Options constructor.


protected **Dictionary::__construct**(string $profile) : 


|Parameters: | | |
| --- | --- | --- |
|string |$profile |  |

---


### getCurrentProfile
Devuelve el perfil actual


**Dictionary::getCurrentProfile**() : string



---


### setCurrentProfile
Asigna el perfil


**Dictionary::setCurrentProfile**(string $name) : [Dictionary](../../../Dictionary.md)


|Parameters: | | |
| --- | --- | --- |
|string |$name |  |

---


### customize
Este método se usa para añadir perfiles, si fuera necesario
´´´
$this->>addProfile('profileA', function(OptionResolver $resolver){
});

$this->>addProfile('profileB', [$this, 'configureProfileB']);

´´´

**Dictionary::customize**() : 



---


### addProfile
Añade un profile al stack


**Dictionary::addProfile**(string $name, callable $callback) : [Dictionary](../../../Dictionary.md)


|Parameters: | | |
| --- | --- | --- |
|string |$name |  |
|callable |$callback |  |

---


### resolve
Devuelve el dataset validado y normalizado


**Dictionary::resolve**(array $options) : mixed[]


|Parameters: | | |
| --- | --- | --- |
|array |$options |  |

---


### configure
Añade criterios de validación al perfil por defecto


abstract **Dictionary::configure**([OptionsResolver](../../../OptionsResolver.md) $resolver) : 


|Parameters: | | |
| --- | --- | --- |
|[OptionsResolver](../../../OptionsResolver.md) |$resolver |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                