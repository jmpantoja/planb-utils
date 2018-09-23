
                                                                                                                                            
    
# Options


> Clase base para configurar un OptionResolver
>
> 




## Constants
- DEFAULT_PROFILE




## Methods

### make
Crea una instancia para un perfil determinado


static **Options::make**(string $profile = self::DEFAULT_PROFILE) : [Options](../../../Options.md)


|Parameters: | | |
| --- | --- | --- |
|string |$profile |  |

---


### __construct
Options constructor.


protected **Options::__construct**(string $profile = self::DEFAULT_PROFILE) : 


|Parameters: | | |
| --- | --- | --- |
|string |$profile |  |

---


### getCurrentProfile
Devuelve el perfil actual


**Options::getCurrentProfile**() : string



---


### customize
Este método se usa para añadir perfiles, si fuera necesario
´´´
$this->>addProfile('profileA', function(OptionResolver $resolver){
});

$this->>addProfile('profileB', [$this, 'configureProfileB']);

´´´

**Options::customize**() : 



---


### addProfile
Añade un profile al stack


**Options::addProfile**(string $name, callable $callback) : [Options](../../../Options.md)


|Parameters: | | |
| --- | --- | --- |
|string |$name |  |
|callable |$callback |  |

---


### resolve
Devuelve el dataset validado y normalizado


**Options::resolve**(array $options) : mixed[]


|Parameters: | | |
| --- | --- | --- |
|array |$options |  |

---


### configure
Añade criterios de validación al perfil por defecto


abstract **Options::configure**([OptionsResolver](../../../OptionsResolver.md) $resolver) : 


|Parameters: | | |
| --- | --- | --- |
|[OptionsResolver](../../../OptionsResolver.md) |$resolver |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                